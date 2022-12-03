<main class="container-fluid">
  <section>
    <h2><?=esc($title)?></h2>
    <?= session()->getFlashdata('error') ?>
    <?= service('validation')->listErrors() ?>
    <div class="col-4 offset-4">
      <form action="cadastrar" method="post">
        <?= csrf_field() ?>
        <div class="mb-3">
          <label for="planta" class="form-label">Planta:</label>
          <input type="text" name="planta" id="planta" class="form-control" required>
        </div>
        <div class="mb-3 col-6">
          <label for="tipo" class="form-label">Tipo:</label>
          <select name="tipo" id="tipo" class="form-control" required>
            <?php
              if (isset($tipos)) {
                foreach ($tipos as $key => $value) { ?>
                  <option value="<?=$value['id']?>"><?=$value['tipo']?></option>
              <?php };
                };
            ?>
          </select>
        </div>
        <div class="mb-3">
          <button type="submit" class="btn btn-success float-end">Cadastrar</button>
        </div>
      </form>
    </div>
  </section>
</main>