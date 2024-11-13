<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ObraModel;
use App\Models\EditoraModel;
use App\Models\AutorModel;
use App\Models\AutorObraModel;
use App\Models\LivroModel;
use App\Models\EmprestimoModel;
use CodeIgniter\Session\Session;

use Dompdf\Dompdf;
use Dompdf\Options;


class Obra extends BaseController
{
    private $obraModel;
    private $editoraModel;
    private $autorModel;
    private $autorObraModel;
    private $livroModel;
    
    public function __construct(){
        $this->editoraModel = new EditoraModel();
        $this->obraModel = new ObraModel();
        $this->autorModel = new AutorModel();
        $this->autorObraModel = new AutorObraModel();
        $this->livroModel = new LivroModel();
        $this->emprestimoModel = new EmprestimoModel();
    }
    
    public function index(){
        $obra = $this->obraModel->select('obra.*,editora.nome,editora.email,editora.telefone')->join('editora', 'obra.id_editora = editora.id')->findAll();
        $editora = $this->editoraModel->findAll();

        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('obra/index.php',['listaObra'=>$obra,'listaEditora' => $editora]);
        echo view('_partials/footer');
    }

    public function cadastrar(){
        $obra = $this->request->getPost();
        
        $this->obraModel->save($obra);
        $id_obra = $this->obraModel->getInsertID();

        foreach($obra['tombo'] as $tombo){
            $livro = [
                'id_obra' => $id_obra,
                'tombo' => $tombo,
                'disponivel' => 1,
                'status' => 1
            ];
            $this->livroModel->save($livro);
        }


        return redirect()->to('Obra/index');
    }
    
    public function editar($id){
        $obra = $this->obraModel->find($id);
        $autor = $this->autorModel->findAll();
        $editora = $this->editoraModel->findAll();
        $dadosAutorObra = $this->autorObraModel->findAll();

        $autorObra = $this->autorObraModel->select('obra.id,nome')->join('autor','autor_obra.id_autor = autor.id')->
        join('obra','autor_obra.id_obra = obra.id')->where('id_obra',$id)->findAll();

        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('obra/edit',['obra' => $obra,'listaAutor' => $autor,'listaEditora' => $editora,'listaAutorObra' => $autorObra]);
        echo view('_partials/footer');
    }

    public function adicionarAutor(){
        $autor = $this->request->getPost();
        $this->autorObraModel->save($autor);
        return redirect()->to(
            'Obra/editar/'.$this->request->getPost('id_obra')
        );
    }
    
    public function excluirAutor(){
        $autor = $this->request->getPost();
        $this->autorObraModel->delete($autor['informacao']);
        return redirect()->to(
            'Obra/editar/'.$this->request->getPost('id_obra')
        );
    }

    public function salvar(){
        $obra = $this->request->getPost();
        $cadastro = $this->obraModel->save($obra);
        if($cadastro){
            session()->setFlashdata('sucesso', TRUE);
        }else{
            session()->setFlashdata('erro', TRUE);
        }
        return redirect()->to('Usuario/index');
        return redirect()->to('Obra/index');
    }

    public function excluir(){
        $obra = $this->request->getPost();
        $this->obraModel->delete($obra);
        return redirect()->to('Obra/index');
    }

    public function gerar_pdf($id){
        $obra = $this->obraModel->find($id);

        $emprestimo = $this->emprestimoModel->select('data_inicio,data_fim,data_prazo,status,tombo,titulo')->join('aluno','emprestimo.id_aluno = aluno.id')
        ->join('livro','emprestimo.id_livro = livro.id')->join('obra','id_obra = obra.id')->findAll();
        
        
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
                    $data['devolucao'] = 'Dentro do prazo';
                }else{
                    $data['devolucao'] = 'Fora do prazo';
                }
            }else{
                $data['devolucao'] = 'Emprestado';
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
        $html = '
        <html>
            <body>
            
            
            </body>
        </html>';


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