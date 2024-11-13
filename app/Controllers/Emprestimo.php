<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\EmprestimoModel;
use App\Models\LivroModel;
use App\Models\AlunoModel;
use App\Models\UsuarioModel;
use App\Models\ObraModel;
use CodeIgniter\Session\Session;

class Emprestimo extends BaseController
{
    private $EmprestimoModel;
    private $livroModel;
    private $alunoModel;
    private $usuarioModel;
    private $obraModel;
    private $session;

    public function __construct(){
        $this->EmprestimoModel = new EmprestimoModel();
        $this->livroModel = new LivroModel();
        $this->alunoModel = new AlunoModel();
        $this->usuarioModel = new UsuarioModel();
        $this->obraModel = new ObraModel();
        $this->session = \Config\Services::session();
    }
    
    public function index(){
        $livro = $this->livroModel->findAll();
        $obra = $this->obraModel->findAll();
        $aluno = $this->alunoModel->findAll();
        $usuario = $this->usuarioModel->findAll();
        $pager = $this->EmprestimoModel->pager;

        $emprestimo = $this->EmprestimoModel->select('emprestimo.id, emprestimo.data_inicio, emprestimo.data_fim, emprestimo.data_prazo, obra.titulo, aluno.nome as aluno, usuario.nome as usuario')->join('livro','emprestimo.id_livro = livro.id')
        ->join('aluno','emprestimo.id_aluno = aluno.id')
        ->join('usuario','emprestimo.id_usuario = usuario.id')
        ->join('obra','livro.id_obra = obra.id')
        ->findAll(); // pega todos as datas iniciais
        // dd($emprestimo);
        
        foreach($emprestimo as &$data){
            $time = explode('-',$data['data_inicio']); //separa dia, mes, ano e atribui a um array
            $time = mktime(0,0,0,$time[1],$time[2],$time[0]); //configura em números
            $prazo = $data['data_prazo']*24*60*60;
            $prazo_final = $time + $prazo;
            $data['data_inicio_formatada'] = date('d/m/Y',$time);
            $data['data_prazo_formatada'] = date('d/m/Y',$prazo_final);
            
            if(isset($data['data_fim'])){
                $fim = explode('-',$data['data_fim']); //separa dia, mes, ano e atribui a um array
                $fim = mktime(0,0,0,$fim[1],$fim[2],$fim[0]); //configura em números
                $data['data_fim_formatada'] = date('d/m/Y',$fim);

                    if($fim - $prazo_final <= 0){
                        $data['devolucao'] = "Devolução no prazo";
                    }else{
                        $data['devolucao'] = "Devolução fora do prazo";
                    }
            }else{
                $data['data_fim_formatada'] = null;
            }

            if(isset($data['data_fim_formatada'])){
                $data['mensagem_data_fim'] = $data['data_fim_formatada'];
             } else{
                $data['mensagem_data_fim'] = 'Indefinido';
             }

             if(isset($data['data_fim'])){
                $data['mensagem_devolucao'] = $data['devolucao'];
             } else{
                $data['mensagem_devolucao'] = anchor("Emprestimo/devolucao/".$data['id'],"Devolução",['class' => 'btn  btn-primary']);
             }
        }

        

        // dd($emprestimo);
        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('emprestimo/index.php',['listaEmprestimo'=>$emprestimo,'listaLivro'=>$livro,'listaAluno'=> $aluno,'listaUsuario'=>$usuario,'listaObra' => $obra,'pager' => $pager]);
        echo view('_partials/footer');
    }

    public function cadastrar()
    {
        $dados = $this->request->getPost();
        $this->EmprestimoModel->save($dados);
        $this->livroModel->update($dados['id_livro'], ['disponivel' => 0]);
        return redirect()->to('emprestimo/index');
    }
    public function editar($id)
    {
        $dados = $this->EmprestimoModel->find($id);
        $dadosaluno = $this->alunoModel->findAll();
        $obra = $this->obraModel->findAll();
        $dadosusuario = $this->usuarioModel->findAll();
        $dadoslivro = $this->livroModel->findAll();


        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('emprestimo/edit',['emprestimo' => $dados,'listaAluno' => $dadosaluno,'listaLivro' => $dadoslivro,'listaUsuario' => $dadosusuario,'listaObra' => $obra]);
        echo view('_partials/footer');
    }
    public function salvar(){
        $dados = $this->request->getPost();
        $this->EmprestimoModel->save($dados);
        if($cadastro){
            session()->setFlashdata('sucesso', TRUE);
        }else{
            session()->setFlashdata('erro', TRUE);
        }
        $this->livroModel->update($dados['id_livro_antigo'],['disponivel' => 1]);
        $this->livroModel->update($dados['id_livro'], ['disponivel' => 0]);
        return redirect()->to('emprestimo/index');
    }
    public function salvardev(){
        $dados = $this->request->getPost();
        $this->EmprestimoModel->save($dados);
        $this->livroModel->update($dados['id_livro'], ['disponivel' => 1]);
        return redirect()->to('emprestimo/index');
    }
    public function excluir(){
        $dados = $this->request->getPost();
        $this->livroModel->update($dados['id_livro'], ['disponivel' => 1]);
        $this->EmprestimoModel->delete($dados);
        return redirect()->to('emprestimo/index');
    }

    public function devolucao($id){
        $emprestimo = $this->EmprestimoModel->find($id);
        $obra = $this->obraModel->findAll();
        $livro = $this->livroModel->findAll();
        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('devolução/index.php',['emprestimo'=>$emprestimo,'listaLivro'=>$livro,'listaObra' => $obra]);
        echo view('_partials/footer');
    }
}
