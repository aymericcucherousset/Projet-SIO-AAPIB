<form method="POST" action="index.php?url=administration">
    <fieldset>
        <legend>Attribuer un métier</legend>
        <input type="hidden" name="action" value="assign-job">
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
          <label class="form-label mt-4">Métier</label>
          <select class="form-select" name="job" required>
            <option value="">---- Métier ----</option>
              <?php foreach (getAllJob() as $job) { ?>
                  <option value="<?= $job['job_id'] ?>"><?= $job['job_label'] ?></option>
              <?php } ?>
          </select>
        </div>
        <button type="submit" class="btn btn-primary w-100">Attribuer</button>
    </fieldset>
</form>