<form method="POST" action="index.php?url=administration">
<fieldset>
    <legend>Ajouter un métier</legend>
    <input type="hidden" name="action" value="add-job">
    <div class="form-group mb-3">
      <label class="form-label mt-4">Nom du métier</label>
      <input type="text" class="form-control" name="job_name" placeholder="Nom du métier" required>
    </div>
    <button type="submit" class="btn btn-primary w-100">Ajouter</button>
  </fieldset>
</form>