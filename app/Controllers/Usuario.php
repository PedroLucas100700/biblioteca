<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsuarioModel;
use CodeIgniter\Session\Session;

use Dompdf\Dompdf;
use Dompdf\Options;

class Usuario extends BaseController{
    private $usuarioModel;
    
    public function __construct(){
        $this->usuarioModel = new UsuarioModel();
    }
    
    public function index(){
        $pesquisa = $this->request->getPost();
        if(count($pesquisa) > 0){
            $dados = $this->usuarioModel->like('nome',$pesquisa['pesquisa'])
            ->orlike('email',$pesquisa['pesquisa'])
            ->orlike('telefone',$pesquisa['pesquisa']);
            $dados = $dados->paginate(10);
            //dd($dados);
            
        }else{
           $dados = $this->usuarioModel->findAll();
        }
        foreach($dados as $key => $array){
            if($array['acesso'] == 1){
                $dados["$key"]['acesso'] = 'Admin';
            } else{
                $dados["$key"]['acesso'] = 'bibliotecário';
            }
        }
        $pages = $this->usuarioModel->pager;
        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('usuario/index',['listaUsuarios' => $dados, 'pager' => $pages]);
        echo view('_partials/footer');
        
        
    }
    
    public function editar($id){
        $dados = $this->usuarioModel->find($id);
        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('usuario/edit',['usuario' => $dados]);
        echo view('_partials/footer');
    }
    
    public function cadastrar(){
        $usuario = $this->request->getPost();
        $cadastro = $this->usuarioModel->save($usuario);
        if($cadastro){
            session()->setFlashdata('sucesso', TRUE);
        }else{
            session()->setFlashdata('erro', TRUE);
        }
        return redirect()->to('Usuario/index');
    }

    public function excluir(){
        $usuario = $this->request->getPost();
        $this->usuarioModel->delete($usuario);
        return redirect()->to('Usuario/index');
    }
}
