<?php
  namespace App\Models;

  use CodeIgniter\Model;

  class TiposModel extends Model {
    protected $table = 'tipo';
    protected $allowedFields = ['tipo'];
    protected $primaryKey = 'id';

    public function getTipos()
    {
      $todas = $this->select(['id', 'tipo'])->get()->getResultArray();
      return $todas;
    }

    
  }