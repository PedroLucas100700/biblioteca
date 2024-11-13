<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\AlunoModel;
use CodeIgniter\Session\Session;

use App\Models\EmprestimoModel;
use App\Models\ObraModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class Aluno extends BaseController{   
    private $alunoModel;
    
    public function __construct(){
        $this->alunoModel = new AlunoModel();
        $this->emprestimoModel = new EmprestimoModel();
        $this->obraModel = new ObraModel();
    }
    
    public function index(){
        $pesquisa = $this->request->getPost();
        if(count($pesquisa) > 0){
            $dados = $this->alunoModel->like('nome', $pesquisa['pesquisa'])
            ->orlike('cpf', $pesquisa['pesquisa'])
            ->orlike('email', $pesquisa['pesquisa'])
            ->orLike('telefone', $pesquisa['pesquisa'])
            ->orLike('turma',$pesquisa['pesquisa']);
            $dados = $dados->paginate(10);
            
        }else{
            $dados = $this->alunoModel->paginate(10);
        }; 
        $pager = $this->alunoModel->pager;
        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('aluno/index.php',['listaAlunos' => $dados,'pager' => $pager]);
        echo view('_partials/footer');
    }

    public function cadastrar(){
        $aluno = $this->request->getPost();
        $aluno['senha']= md5("senhaforte");
        $this->alunoModel->save($aluno);
        return redirect()->to('Aluno/index');
    }

    public function editar($id){
        $dados = $this->alunoModel->find($id);
        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('aluno/edit',['aluno' => $dados]);
        echo view('_partials/footer');

       
    }

    public function salvar(){
        $aluno = $this->request->getPost();
        $this->alunoModel->save($aluno);
        return redirect()->to('Aluno/index');
    }

    public function excluir(){
        $aluno = $this->request->getPost();
        $this->alunoModel->delete($aluno);
        return redirect()->to('Aluno/index');
    }

    public function gerar_pdf($id){
        $aluno = $this->alunoModel->find($id);

        $emprestimo = $this->emprestimoModel->select('data_inicio,data_fim,data_prazo,status,tombo,titulo')->join('aluno','emprestimo.id_aluno = aluno.id')
        ->join('livro','emprestimo.id_livro = livro.id')->join('obra','id_obra = obra.id')->like('nome',$aluno['nome'])->findAll();
        
        foreach($emprestimo as &$data) {
            $time = explode('-', $data['data_inicio']);
            $time = mktime(0, 0, 0, $time[1], $time[2], $time[0]);
            $prazo = $data['data_prazo'] * 24 * 60 * 60;
            $prazo_final = $time + $prazo;
            $data['data_inicio_formatada'] = date('d/m/Y', $time);
            $data['data_prazo_formatada'] = date('d/m/Y', $prazo_final);
        
            if (isset($data['data_fim'])) {
                $fim = explode('-', $data['data_fim']);
                $fim = mktime(0, 0, 0, $fim[1], $fim[2], $fim[0]);
                $data['data_fim_formatada'] = date('d/m/Y', $fim);

                if($fim - $prazo_final <= 0){
                    $data['devolucao'] = 'Dentro do prazo'; // Dentro do prazo
                }else{
                    $data['devolucao'] = 'Fora do prazo'; // Fora do prazo
                }
            }else{
                $data['devolucao'] = 'Emprestado'; // Emprestado
            }
            
        }
        
        // Agora, fora do loop, inspecione o array
        
            require 'dompdf/vendor/autoload.php';

        // Inicializa o DOMPDF
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true); // Habilita o suporte a HTML5
        $options->set('isPhpEnabled', true); // Habilita PHP (se necessário)
        $dompdf = new Dompdf($options);

        // Defina o conteúdo HTML
        // HTML para o "Nada Consta"
        if(isset($data['data_inicio_formatada'])){
        $html = '
        <html>
            <head>
                <title>Certificado Nada Consta</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        font-size: 12pt;
                        margin: 0;
                        padding: 0;
                        text-align: justify;
                    }
                    .container {
                        text-align: center;
                        margin-top: 50px;
                    }
                    .titulo {
                        font-size: 20pt;
                        font-weight: bold;
                        margin-bottom: 20px;
                    }
                    .conteudo {
                        font-size: 14pt;
                        text-align: left;
                        margin-top: 30px;
                    }
                    .assinatura {
                        text-align: center;
                        margin-top: 50px;
                    }
                    .data {
                        text-align: right;
                        margin-top: 10px;
                    }
                    .campo {
                        margin: 10px 0;
                    }
                </style>
            </head>
            <body>
        
                <div class="container">
                    <div class="titulo">
                        Certificado "Nada Consta"
                    </div>
        
                    <div class="conteudo">
                        <div class="campo">
                            <strong>Nome do Aluno:</strong> ' . $aluno['nome'] . '<br>
                            <strong>CPF:</strong> ' . $aluno['cpf'] . '<br>
                            <strong>Telefone:</strong> ' . $aluno['telefone'] . '<br>
                            <strong>E-mail:</strong> ' . $aluno['email'] . '<br>
                            <strong>Turma:</strong> ' . $aluno['turma'] . '<br>
                            <strong>Data de Emissão:</strong> ' . $data['data_inicio_formatada'] . '
                        </div>
                        <p>
                            Declaro, para os devidos fins, que o(a) aluno(a) acima mencionado(a) não possui pendências ou registros em aberto 
                            no sistema da instituição, estando regular perante os registros acadêmicos.
                        </p>
                    </div>
        
                    <div class="assinatura">
                        ___________________________________________<br>
                        Assinatura da Autoridade Responsável<br>
                        Nome do Responsável<br>
                        Cargo: Coordenador de Curso
                    </div>
        
                    <div class="data">
                        Data de emissão: ' . $data['data_inicio_formatada'] . '
                    </div>
        
                </div>
        
            </body>
        </html>';
        }else{
            $html = 'Este aluno não está pendente';
        }


        // Carrega o HTML no DOMPDF
        $dompdf->loadHtml($html);

        // (Opcional) Defina o tamanho do papel
        $dompdf->setPaper('A4', 'portrait'); // Pode ser 'A4' ou 'letter', e 'portrait' ou 'landscape'

        // Renderiza o PDF (gera o arquivo)
        $dompdf->render();

        // Exibe o PDF no navegador
        $dompdf->stream('relatorio.pdf', array('Attachment' => 0)); // 0 exibe no navegador, 1 faz o download


    }

}
