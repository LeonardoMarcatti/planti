<main class="container-fluid">
  <section>
    <h2><?=esc($title)?></h2>
    <?= session()->getFlashdata('error') ?>
    <?= service('validation')->listErrors() ?>
    <div class="col-4 offset-4">
      <form action="cadastrarTipo" method="post">
        <?= csrf_field() ?>
        <div class="mb-3">
          <label for="tipo" class="form-label">Tipo:</label>
          <input type="text" name="tipo" id="tipo" class="form-control" required>
        </div>
        <div class="mb-3">
          <button type="submit" class="btn btn-success float-end">Cadastrar</button>
        </div>
      </form>
    </div>
  </section>
</main>