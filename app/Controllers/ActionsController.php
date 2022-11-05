<?php

namespace App\Controllers;

use App\Models\PlantasModel;
use app\Models\AcoesModel;

class ActionsController extends BaseController
{
  public function cadastrar()
  {
    $this->model = model(PlantasModel::class);
    $this->data['tab'] = 'Planti - Sucesso';
    $this->data['title'] = 'Sucesso!';

    if (!is_file(APPPATH . 'Views/success.php')) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Success');
    };

    if ($this->request->getMethod() == 'post' && $this->validate(['planta' => 'required'])) {
      $this->model->save(['nome' => $this->request->getPost('planta')]);
      return view('Views/templates/header.php', $this->data) . view('Views/success') . view('Views/templates/footer.php');
    };

    return redirect()->to('/');
  }

  public function updatePlanta()
  {
    $this->model = model(PlantasModel::class);

    if ($this->request->getMethod() == 'post' && $this->validate(['id' => 'required', 'nome' => 'required'])) {
      $this->model->updatePlanta($this->request->getPost('id'), $this->request->getPost('nome'));
    };

    return redirect()->to('/');
  }

  public function confirmaDeletar()
  {
    if ($this->request->getMethod() == 'post' && $this->validate(['id' => 'required'])) {
      $this->model = \model(AcoesModel::class);
      $this->model->deletaAcoesPlanta($this->request->getPost('id'));
      $this->model = \model(PlantasModel::class);
      $this->model->deletaPlanta($this->request->getPost('id'));
    };

    return redirect()->to('/');
  }

  public function cadastrarCuidado()
  {
    if ($this->request->getMethod() == 'post' && $this->validate(['id' => 'required', 'acao' => 'required'])) {
      $id = $this->request->getPost('id');
      $this->model = model(AcoesModel::class);
      $this->model->adicionarAcao($this->request->getPost('id'), $this->request->getPost('acao'));
    };

    return redirect()->to('planta?id=' . $id);
  }

  public function updateCuidado()
  {
    $this->model = \model(AcoesModel::class);

    if ($this->request->getMethod() == 'post' && $this->validate(['id' => 'required', 'acao' => 'required'])) {
      $this->model->updateCuidado($this->request->getPost('id'), $this->request->getPost('acao'));
    };

    return redirect()->to('/detalhes?id=' . $this->request->getPost('idplanta'));
  }

  public function cuidadosTodas()
  {
    $this->model = \model(PlantasModel::class);
    if ($this->request->getMethod() == 'post' && $this->validate(['acao' => 'required'])) {
      $todasPlantas = $this->model->getTodasID();
      $this->model = model(AcoesModel::class);
      foreach ($todasPlantas as $key => $value) {
        $this->model->adicionarAcao($value['id'], $this->request->getPost('acao'));
      };
      return redirect()->to('/');
    };

    
  }
}