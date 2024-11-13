<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ObraModel;
use App\Models\LivroModel;

class Livro extends BaseController
{
    private $obraModel;
    private $livroModel;

    public function __construct(){
        $this->obraModel = new ObraModel();
        $this->livroModel = new LivroModel();
    }

    public function index(){

            $livro = $this->livroModel->select('*, livro.id')
            ->join('obra', 'livro.id_obra = obra.id')->findAll();


        $statusdisponivel = LivroModel::STATUSLOCADO;
        $status = LivroModel::STATUSLIVRO;
        // dd($livro);
        
        foreach($livro as $key => $li){
            $teste = [];
           array_push($teste, $key);
           
           if($li['status'] == 1){
                $livro[$key]["class_status"] = 'bg bg-success';
           }
            else if($li['status'] == 2){
                $livro[$key]["class_status"] = 'bg bg-danger';
           }
               
           if($li['disponivel'] == 0){
               $livro[$key]["class_disponivel"] = 'bg bg-danger';
               
           }else if($li['disponivel'] == 1){
               $livro[$key]["class_disponivel"] = 'bg bg-success';;
            }
               $livro[$key]["disponivel"] = $statusdisponivel[$li['disponivel']];
               $livro[$key]["status"] = $status[$li['status']];

            //  dd($livro);
           }
        
        $obra = $this->obraModel->findAll();
        $pager = $this->livroModel->pager;
        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('livro/index.php',['listaObra'=>$obra,'listaLivro'=>$livro, 'statusdisponivel'=>$statusdisponivel, 'status'=>$status, 'pager'=> $pager]);
        echo view('_partials/footer');
    }

    public function editar($id){
        // dd($id);
        $statusdisponivel = LivroModel::STATUSLOCADO;
        $status = LivroModel::STATUSLIVRO;
        $livro = $this->livroModel->find($id);
        $obra = $this->obraModel->findAll();
        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('livro/edit',['listaObra' => $obra, 'livro' => $livro, 'statusdisponivel'=>$statusdisponivel, 'status'=>$status]);
        echo view('_partials/footer');
    }


    public function cadastrar(){
        $livro = $this->request->getPost();
        $this->livroModel->save($livro);
        return redirect()->to('Livro/index');
    }

    public function salvar(){
        $livro = $this->request->getPost();
        $this->livroModel->save($livro);
        return redirect()->to('Livro/index');
    }

    public function excluir(){
        $livro = $this->request->getPost();
        $this->livroModel->delete($livro);
        return redirect()->to('Livro/index');
    }
}
