<h2><?=$title?></h2>

<?=validation_errors('<div class="alert alert-danger"><strong>Opgelet!</strong> ', '</div>')?>

<?=form_open('borrowed/create')?>
  <div class="form-group">
    <label for="customer_name">Naam</label>
    <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Voer hier de naam van de lener in...">
  </div>
  <div class="form-group">
    <label for="customer_email">E-mailadres</label>
    <input type="email" class="form-control" id="customer_email" name="customer_email" placeholder="Voer hier het e-mailadres van de lener in...">
  </div>
  <div class="form-group">
    <label for="borrowed_till">Inleverdatum</label>
    <input type="date" class="form-control" id="borrowed_till" name="borrowed_till">
  </div>
  <div class="form-group">
    <label for="product_id">Product</label>
    <select name="product_id" class="form-control">
			<?php foreach($products as $product): ?>
				<option value="<?=$product['product_id']?>"><?=$product['name']?></option>
			<?php endforeach; ?>
		</select>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary" id="submit" name="submit">Voeg product toe</button>
  </div>
</form>
