<?php

namespace App\Models;
use CodeIgniter\Model;

class PedidosModel extends Model {
    protected $table = 'orders';
    protected $primaryKey = 'id';

    protected $allowedFields = ['description','clientName','productName', 'idClientes', 'idproduct'];
    
    public function getPedidos($id = null){
        
        if($id === null){
            return $this->findAll();
        }
        return $this->asArray()->where(['id' => $id])->first();
    }

}