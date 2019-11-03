<?php

namespace App\Models;
use CodeIgniter\Model;

class ProdutosModel extends Model {
    protected $table = 'product';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id','name','qtd','cod'];
    
    public function getProdutos($id = null){
        if($id === null){
            return $this->findAll();
        }
        return $this->asArray()->where(['id' => $id])->first();
    }

    public function errorValidation($cod, $id = null){
       
        $data['produtos'] = $this->asArray()->where(['cod' => $cod])->first();
        if($data['produtos'] === null)
        {
            return false;
        }
        else
        {
           return !($data['produtos']['id'] === $id);
        }

    }
}