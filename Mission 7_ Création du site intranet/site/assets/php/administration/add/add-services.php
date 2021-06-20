<form method="POST" action="index.php?url=administration">
<fieldset>
    <legend>Ajouter un service</legend>
    <input type="hidden" name="action" value="add-service">
    <div class="form-group mb-3">
      <label class="form-label mt-4">Nom du service</label>
      <input type="text" class="form-control" name="service_name" placeholder="Nom du service" required>
    </div>
    <button type="submit" class="btn btn-primary w-100">Ajouter</button>
  </fieldset>
</form>