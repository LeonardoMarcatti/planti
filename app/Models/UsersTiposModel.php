<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersTiposModel extends Model
{
   protected $table = 'users_tipos';
   protected $allowedFields = ['id_user', 'id_tipo'];

   public function checkUsersTipos(int|string $user, int|string $tipo): bool
   {
      $result = $this->select()->where(['id_user' => $user, 'id_tipo' => $tipo])->get()->getRow();
      return $result ? true : false;
   }
}
