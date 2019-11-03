<?php

namespace App\Models;
use CodeIgniter\Model;

class PessoasModel extends Model {
    protected $table = 'client';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name','cpf','adress','email'];
    
    public function getPessoas($id = null){
        if($id === null){
            return $this->findAll();
        }
        return $this->asArray()->where(['id' => $id])->first();
    }

    public function errorValidation($cpf, $id = null){
       
        $data['pessoas'] = $this->asArray()->where(['cpf' => $cpf])->first();
        if($data['pessoas'] === null)
        {
            return false;
        }
        else
        {
           return !($data['pessoas']['id'] === $id);
        }

    }
}