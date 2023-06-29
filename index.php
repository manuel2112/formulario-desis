<?php include('doctype.php'); ?>
<?php include('header.php'); ?>

<main class="container">

  <div class="row mt-3">
    <div class="col-12">

      <form id="formulario">

        <div class="form-group mb-2">
          <label for="nombreInput">Nombre y Apellido</label>
          <input type="text" class="form-control form-control-lg" id="nombreInput" placeholder="NOMBRE Y APELLIDO..." required>
          <div id="nombrelHelp" class="invalid-feedback"></div>
        </div>

        <div class="form-group mb-2">
          <label for="aliasInput">Alias</label>
          <input type="text" class="form-control form-control-lg" id="aliasInput" placeholder="ALIAS..." required>
          <div id="aliasHelp" class="invalid-feedback"></div>
        </div>

        <div class="form-group mb-2">
          <label for="rutInput">RUT</label>
          <input type="text" class="form-control form-control-lg" id="rutInput" placeholder="RUT..." required>
          <div id="rutHelp" class="invalid-feedback"></div>
        </div>

        <div class="form-group mb-2">
          <label for="emailInput">EMAIL</label>
          <input type="email" class="form-control form-control-lg" id="emailInput" placeholder="EMAIL..." required>
          <div id="emailHelp" class="invalid-feedback"></div>
        </div>

        <div class="form-group mb-2">
          <label for="regionSelect">Región</label>
          <select class="form-control form-control-lg" id="regionSelect">
            <option value="">SELECCIONAR REGIÓN</option>
            <?php
            foreach ($regiones as $region) {
              echo '<option value="' . $region['id'] . '">' . $region['name'] . '</option>';
            }
            ?>
          </select>
        </div>

        <div class="form-group mb-2">
          <label for="cmbComuna">Comuna</label>
          <select class="form-control form-control-lg" id="cmbComuna">
            <option value="">SELECCIONAR COMUNA</option>
          </select>
          <div id="comunaHelp" class="invalid-feedback"></div>
        </div>

        <div class="form-group mb-2">
          <label for="candidatoSelect">Candidato</label>
          <select class="form-control form-control-lg" id="candidatoSelect">
            <option value="">SELECCIONAR CANDIDATO</option>
            <?php
            foreach ($candidatos as $candidato) {
              echo '<option value="' . $candidato['id'] . '">' . $candidato['name'] . '</option>';
            }
            ?>
          </select>
          <div id="candidatoHelp" class="invalid-feedback">xxxx</div>
        </div>

        <div class="form-group mb-2">
          <label >Cómo se Enteró de Nosotros</label><br>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="WEB">
            <label class="form-check-label" for="inlineCheckbox1">WEB</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="TV">
            <label class="form-check-label" for="inlineCheckbox2">TV</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="REDES SOCIALES">
            <label class="form-check-label" for="inlineCheckbox3">REDES SOCIALES</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="AMIGO">
            <label class="form-check-label" for="inlineCheckbox4">AMIGO</label>
          </div>
          <div id="comoHelp" class="form-text text-danger"></div>
        </div>

        <div class="form-group mb-2">
          <button type="button" id="send" class="btn btn-primary btn-lg float-end">
            VOTAR
          </button>
        </div>


      </form>

    </div>
  </div>

</main>


<?php include('footer.php') ?>