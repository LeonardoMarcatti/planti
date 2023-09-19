<main>
  <section>
    <h2>Consulte sua Planta</h2>
    <div class="col-4 offset-4">
      <form action="planta" method="get" id="form_consulta">
        <?= session()->getFlashdata('error') ?>
        <?= service('validation')->listErrors() ?>
        <div class="mb-3">
          <label for="planta" class="form-label">Planta:</label>
          <select name="id" id="planta" class="form-control">
            <option value="0" selected>Selecione</option>
            <?php
              if (!empty($plantas)) {
                foreach ($plantas as $key => $planta) {?>
                  <option value="<?=esc($planta['id'])?>"><?=esc($planta['nome'])?></option>
              <?php
                };
              } else{ ?>
                <option value="">Não há plantas cadastradas</option>
            <?php  };
            ?>
          </select>
        </div>
        <div class="mb-3">
          <button type="submit" class="btn btn-success float-end" id="btn_consulta">Consultar</button>
        </div>
      </form>
    </div>
  </section>
</main>