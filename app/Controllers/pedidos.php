<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ProdutosModel;
use App\Models\PedidosModel;
use App\Models\PessoasModel;


class pedidos extends Controller{
   
    public function index($id = null){

        $model = new ProdutosModel();
        $data = [
            'idPessoa'=> $id,
            'listProduct'=>$model->getProdutos() 
        ];
        
        echo view('templates/header');
        echo view('templates/menuBar');
        echo view('pedidos/form', $data);
        echo view('templates/footer');
    }

    public function create($idProduto = null, $idPessoa = null)
    {
        $modelProdutos = new ProdutosModel();
        $modelClientes = new PessoasModel();
        $modelPedidos = new PedidosModel();
        
        $data['produtos'] = $modelProdutos->getProdutos($idProduto);
        $data['clientes'] = $modelClientes->getPessoas($idPessoa);


        if(empty($data['produtos']) || empty($data['clientes'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Não pude encontrar essa notificação');
        }

        ##################endregion
            $modelPedidos->save([
                'description' => 'Compra de produto',
                'clientName' => $data['clientes']['name'],
                'productName' => $data['produtos']['name'],
                'idClientes' => $data['clientes']['id'],
                'idproduct' => $data['produtos']['id'],
            ]);

            $modelProdutos->save([
                    'id' => $data['produtos']['id'],
                    'name' => $data['produtos']['name'],
                    'qtd' => $data['produtos']['qtd'] - 1,
                    'cod' => $data['produtos']['cod']
            ]);
            echo view('templates/header');
            echo view('templates/menuBar');
            echo view('produtos/success', $data);
            echo view('templates/footer');

    }

    public function wachOrders($id = null)
    {
        $model = new PedidosModel();

        $data = [
            'pedidos' => $model->getPedidos()
        ];

        echo view('templates/header');
        echo view('templates/menuBar');
        echo view('pedidos/overview', $data);
        echo view('templates/footer');
    }
}