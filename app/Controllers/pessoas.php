<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\PessoasModel;

class pessoas extends Controller{
    public function index(){
        $model = new PessoasModel();

        $data = [
            'pessoas' => $model->getPessoas()
        ];
        echo view('templates/header');
        echo view('templates/menuBar');
        echo view('pessoas/overview', $data);
        echo view('templates/footer');
    }

    public function view ($id = null){
        $model = new PessoasModel();
        $data['pessoas'] = $model->getPessoas($id);

        if(empty($data['pessoas'])){
            throw new CodeIgniter\Exceptions\PageNotFoundException('Não foi encontrado registro');
        }

        echo view('templates/header');
        echo view('templates/menuBar');
        echo view('pessoas/view', $data);
        echo view('templates/footer');
    }

    public function create(){
        
        helper('form');
        echo view('templates/header');
        echo view('templates/menuBar');
        echo view('pessoas/form');
        echo view('templates/footer');
    }

    public function store(){
        helper('form');

        $model = new PessoasModel();
        $rules = [
            'nome' => 'required',
            'cpf' => 'required',
            'endereco' =>'required',
            'email' => 'required'
        ];

        #implementar aqui a validação para o cpf único
        
        if($model->errorValidation($this->request->getVar('cpf'),$this->request->getVar('id'))){
            $message = "cpf já existe";
            echo "<script type='text/javascript'>alert('$message');</script>";
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cpf já existe');
        }
        
        if($this->validate($rules)){
            $model->save([
                'id' => $this->request->getVar('id'),
                'adress' => $this->request->getVar('endereco'),
                'cpf' => $this->request->getVar('cpf'),
                'email' => $this->request->getVar('email'),
                'name'  => $this->request->getVar('nome'),
            ]);
            
            echo view('templates/header');
            echo view('templates/menuBar');
            echo view('pessoas/success');
            echo view('templates/footer');
        }
        else{
            echo view('templates/header');
            echo view('templates/menuBar');
            echo view('pessoas/form');
            echo view('templates/footer');
        }
    }

    public function edit($id = null)
    {
        $model = new PessoasModel();
        $data['pessoas'] = $model->getPessoas($id);
        if(empty($data['pessoas'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Não pude encontrar essa notificação');
        }

        $data = [
            'id' => $data['pessoas']['id'],
            'nome' => $data['pessoas']['name'],
            'cpf' => $data['pessoas']['cpf'],
            'endereco' => $data['pessoas']['adress'],
            'email' => $data['pessoas']['email']
        ];

        echo view('templates/header');
        echo view('templates/menuBar');
        echo view('pessoas/form', $data);
        echo view('templates/footer');
    }
    public function delete($id = null){
        $model = new PessoasModel();
        $model->delete($id);

        echo view('templates/header');
        echo view('templates/menuBar');
        echo view('produtos/delete_success');
        echo view('templates/footer');
        
    }

}