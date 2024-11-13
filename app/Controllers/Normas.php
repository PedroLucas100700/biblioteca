<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\AlunoModel;
use App\Models\EmprestimoModel;
use App\Models\ObraModel;
use App\Models\EditoraModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class Normas extends BaseController
{
    private $alunoModel;

    public function __construct(){
        $this->alunoModel = new AlunoModel();
        $this->emprestimoModel = new EmprestimoModel();
        $this->obraModel = new ObraModel();
        $this->editoraModel = new EditoraModel();
    }
    
    public function index()
    {
        //
        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('normas/normas.php');
        echo view('_partials/footer');
    }

    public function gerar_pdf($id){
        // Inclua o autoload do Composer
        require 'dompdf/vendor/autoload.php'; // Ou o caminho para o autoload.php do Composer

        // Configurações básicas do DOMPDF
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true); // Permite o uso de HTML5
        $options->set('isPhpEnabled', true); // Habilita PHP no HTML (opcional)
        $dompdf = new Dompdf($options);

        $obras = $this->obraModel->select('titulo,isbn,categoria,ano_publicacao,quantidade,nome')->join('editora','obra.id_editora = editora.id')->findAll();

        $emprestimo = $this->emprestimoModel->select('titulo,cpf,nome,telefone,turma,data_inicio,data_fim,data_prazo')->join('aluno','emprestimo.id_aluno = aluno.id')
        ->join('livro','emprestimo.id_livro = livro.id')->join('obra','livro.id_obra = obra.id')->findAll();
        foreach($emprestimo as $key => $emp){
            $emprestimo[$key]['data_inicio_formatada'] = date("d/m/Y",strtotime($emp['data_inicio']));
            $emprestimo[$key]['data_fim_formatada'] = date("d/m/Y",strtotime($emp['data_fim']));
            
            $novoTimestamp = strtotime("+" . $emp['data_prazo'] . " day", strtotime($emp['data_inicio']));
            $emprestimo[$key]['data_prazo_formatada'] = date("d/m/Y", $novoTimestamp);
            unset($emprestimo[$key]['data_prazo']);
            unset($emprestimo[$key]['data_fim']);
            unset($emprestimo[$key]['data_inicio']);
        }
        // dd($emprestimo);

        if($id == 1)
            $html = view('normas/folhas/regulamento');
        else if($id == 2)
            $html = view('normas/folhas/taxa');
        else if($id == 3)
            $html = view('normas/folhas/folha_obras',['obras' => $obras]);
        else if($id == 4)
            $html = view('normas/folhas/folha_emprestimos',['emprestimo' => $emprestimo]);
        
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("regulamento_biblioteca.pdf", array("Attachment" => 0)); // Attachment=0 significa que o PDF será aberto no navegador
    }
}
