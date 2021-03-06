<h2><?=$title?></h2>

<?=validation_errors('<div class="alert alert-danger"><strong>Opgelet!</strong> ', '</div>')?>

<?=form_open('products/create')?>
  <div class="form-group">
    <label for="name">Naam</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Voer hier de naam van het product in...">
  </div>
  <div class="form-group">
    <label for="body">Omschrijving</label>
    <textarea class="form-control" id="body" name="body" rows="3" placeholder="Schrijf hier een omschrijving van het product..."></textarea>
  </div>
  <div class="form-group">
    <label for="count">Aantal</label>
    <input type="number" class="form-control" id="count" name="count" placeholder="Voer hier in hoeveel stuks er zijn..." min="1">
  </div>
  <div class="form-group">
    <label for="category">Categorie</label>
    <select name="category_id" class="form-control">
			<?php foreach($categories as $category): ?>
				<option value="<?=$category['id']?>"><?=$category['category_name']?></option>
			<?php endforeach; ?>
		</select>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary" id="submit" name="submit">Voeg product toe</button>
  </div>
</form>
