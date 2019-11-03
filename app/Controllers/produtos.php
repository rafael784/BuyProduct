<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ProdutosModel;

class produtos extends Controller{
    public function index(){
        $model = new ProdutosModel();

        $data = [
            'produtos' => $model->getProdutos()
        ];
        echo view('templates/header');
        echo view('templates/menuBar');
        echo view('produtos/overview',$data);
        echo view('templates/footer');
    }

    public function delete($id = null){
        $model = new ProdutosModel();
        $model->delete($id);

        echo view('templates/header');
        echo view('templates/menuBar');
        echo view('produtos/delete_success');
        echo view('templates/footer');
    }

    public function edit($id = null)
    {
        $model = new ProdutosModel();
        $data['produtos'] = $model->getProdutos($id);
        if(empty($data['produtos'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Não pude encontrar essa notificação');
        }

        $data = [
            'id' => $data['produtos']['id'],
            'name' => $data['produtos']['name'],
            'cod' => $data['produtos']['cod'],
            'qtd' => $data['produtos']['qtd'],
        ];

        echo view('templates/header');
        echo view('templates/menuBar');
        echo view('produtos/form', $data);
        echo view('templates/footer');
    }
    public function create(){
        helper('form');
        echo view('templates/header');
        echo view('templates/menuBar');
        echo view('produtos/form');
        echo view('templates/footer');
    }

    public function store(){
        helper('form');

        $model = new ProdutosModel();
        $rules = [
            'nome' => 'required',
            'cod' => 'required',
            'qtd' => 'required'
        ];
        #implementar aqui a validação para o cód único
        
        if($model->errorValidation($this->request->getVar('cod'), $this->request->getVar('id'))){
            $message = "já existe codigo";
            echo "<script type='text/javascript'>alert('$message');</script>";
            throw new \CodeIgniter\Exceptions\PageNotFoundException($message);
        }
        
        if($this->validate($rules)){
            $model->save([
                'id' => $this->request->getVar('id'),
                'name' => $this->request->getVar('nome'),
                'qtd' => $this->request->getVar('qtd'),
                'cod' => $this->request->getVar('cod')
            ]);
            
            echo view('templates/header');
            echo view('templates/menuBar');
            echo view('produtos/success');
            echo view('templates/footer');
        }
        else{
            echo view('templates/header');
            echo view('templates/menuBar');
            echo view('produtos/form');
            echo view('templates/footer');
        }
    }
}