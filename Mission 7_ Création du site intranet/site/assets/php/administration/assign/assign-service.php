<form method="POST" action="index.php?url=administration">
    <fieldset>
        <legend>Attribuer un service</legend>
        <input type="hidden" name="action" value="assign-service">
        <div class="form-group">
          <label class="form-label mt-4">Personnel</label>
          <select class="form-select" name="personnel" required>
              <option value="">---- Personnel ----</option>
              <?php foreach (getAllPersonnel() as $personnel) { ?>
                  <option value="<?= $personnel['id'] ?>"><?= $personnel['last_name'].' ' . $personnel['first_name']?></option>
              <?php } ?>
          </select>
        </div>
        <div class="form-group mb-3">
          <label class="form-label mt-4">Service</label>
          <select class="form-select" name="service" required>
            <option value="">---- Service ----</option>
              <?php foreach (getAllServices() as $service) { ?>
                  <option value="<?= $service['id_service'] ?>"><?= $service['name_service'] ?></option>
              <?php } ?>
          </select>
        </div>
        <button type="submit" class="btn btn-primary w-100">Attribuer</button>
    </fieldset>
</form>