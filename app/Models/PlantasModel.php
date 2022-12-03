<?php
  namespace App\Models;

  use CodeIgniter\Model;

  class PlantasModel extends Model
  {
    protected $table = 'plantas';
    protected $allowedFields = ['nome', 'tipo'];
    protected $primaryKey = 'id';

    public function getPlantas(int $id = 0)
    {
      if ($id == 0) {
        return $this->orderBy('nome', 'ASC')->findAll();
      };

      return $this->where('id', $id)->first();
    }

    public function addPlanta(string $nome, int $id)
    {
      return $this->insert(['nome' => $nome, 'tipo' => $id]);
    }

    public function deletaPlanta(int $id)
    {
      $this->delete(['id' => $id]);
    }

    public function updatePlanta(int $id, string $nome)
    {
      $this->set('nome', $nome)->where('id', $id)->update();
    }

    public function getTodasID()
    {
      $todas = $this->select('id')->get()->getResultArray();
      return $todas;
    }
  }