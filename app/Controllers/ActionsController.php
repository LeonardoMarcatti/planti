<?php

namespace App\Controllers;

use App\Models\PlantasModel;
use app\Models\AcoesModel;
use app\Models\TiposModel;

class ActionsController extends BaseController
{
  private object $model;
  private ?array $data;

  public function cadastrar()
  {
    $this->model = model(PlantasModel::class);
    $this->data['tab'] = 'Planti - Sucesso';
    $this->data['title'] = 'Sucesso!';

    if (!is_file(APPPATH . 'Views/success.php')) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Success');
    };

    if ($this->request->getMethod() == 'post' && $this->validate(['planta' => 'required', 'tipo' => 'required'])) {
      $this->model->addPlanta($this->request->getPost('planta'), $this->request->getPost('tipo'));
      return redirect()->to('/success');
    };

    return redirect()->to('/');
  }

  public function cadastrarTipo()
  {
    $this->model = model(TiposModel::class);
    $this->data['tab'] = 'Planti - Sucesso';
    $this->data['title'] = 'Sucesso!';

    if (!is_file(APPPATH . 'Views/success.php')) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Success');
    };

    if ($this->request->getMethod() == 'post' && $this->validate(['tipo' => 'required'])) {
      $this->model->save(['tipo' => $this->request->getPost('tipo')]);
      return redirect()->to('/success');
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

    return redirect()->to("/successAction?id=" . $id);
  }

  public function cuidadosTipo()
  {
    if ($this->request->getMethod() == 'post' && $this->validate(['tipo' => 'required', 'acao' => 'required'])) {
      $this->model = model(PlantasModel::class);
      $tipo = $this->request->getPost('tipo');
      $list = $this->model->getPlantasByTipo($tipo);

      $acao = $this->request->getPost('acao');
      $this->model = model(AcoesModel::class);

      foreach ($list as $key => $value) {
        $this->model->addCuidadoTipo($value['id'], $acao);
      };

      return redirect()->to('/successTipo');
    };
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