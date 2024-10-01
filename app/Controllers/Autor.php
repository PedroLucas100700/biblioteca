<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\AutorModel;
use CodeIgniter\Session\Session;

class Autor extends BaseController
{
    private $autorModel;
    
    public function __construct(){
        $this->autorModel = new AutorModel();
    }

    public function index(){
        $pesquisa = $this->request->getPost();
        if(count($pesquisa) > 0){
            $dados = $this->autorModel->like('nome',$pesquisa['pesquisa']);
            $dados = $dados->paginate(10);
        }else{
            $dados = $this->autorModel->paginate(10);
        };
        $pager = $this->autorModel->pager;
        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('autor/index.php',['listaAutor' => $dados, 'pager' => $pager]);
        echo view('_partials/footer');
    }

    public function cadastrar(){
        $autor = $this->request->getPost();
        $autor['senha']= md5("senhaforte");
        $this->autorModel->save($autor);
        return redirect()->to('Autor/index');
    }
    
    public function editar($id){
        $dados = $this->autorModel->find($id);
        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('autor/edit',['autor' => $dados]);
        echo view('_partials/footer');
    }

    public function salvar(){
        $autor = $this->request->getPost();
        $this->autorModel->save($autor);
        return redirect()->to('Autor/index');
    }

    public function excluir(){
        $autor = $this->request->getPost();
        $this->autorModel->delete($autor);
        return redirect()->to('Autor/index');
    }

}
