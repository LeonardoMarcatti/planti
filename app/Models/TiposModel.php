<?php
   namespace App\Models;

   use CodeIgniter\Model;

   class TiposModel extends Model {
      protected $table = 'tipo';
      protected $allowedFields = ['tipo', 'id_user'];
      protected $primaryKey = 'id';

      public function getTipos(int $id) : array
      {
         $todas = $this->select(['id', 'tipo'])->distinct()->join('users_tipos', 'users_tipos.id_tipo = tipo.id')->where('users_tipos.id_user', $id)->get()->getResultArray();
         return $todas;
      }



      public function checkTipo(string $tipo) : bool
      {
         $result = $this->select('id')->where('tipo', $tipo)->get()->getResultArray();
         if (count($result) > 0) {
            return true;
         }

         return false;
      }

      public function getIDByTipo(string $tipo) : string
      {
         return $this->select('id')->where('tipo', $tipo)->get()->getRow('id');
      }
   }