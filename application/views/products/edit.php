<h2><?=$title?></h2>

<?=validation_errors('<div class="alert alert-danger"><strong>Opgelet!</strong> ', '</div>')?>

<?=form_open('products/update')?>
	<input type="hidden" name="id" value="<?php echo $product['product_id']; ?>">
	<div class="form-group">
	    <label for="name">Naam</label>
	    <input type="text" class="form-control" id="name" name="name" placeholder="Voer hier de naam van het product in..." value="<?php echo $product['name']; ?>">
	</div>
	<div class="form-group">
	    <label for="body">Omschrijving</label>
	    <textarea class="form-control" id="body" name="body" rows="3" placeholder="Schrijf hier een omschrijving van het product..."><?php echo $product['body']; ?></textarea>
	</div>
	<div class="form-group">
	    <label for="count">Aantal</label>
	    <input type="number" class="form-control" id="count" name="count" placeholder="Voer hier in hoeveel stuks er zijn..." value="<?php echo $product['count']; ?>" min="1">
	</div>
	<div class="form-group">
	    <label for="category">Categorie</label>
	    <select name="category_id" class="form-control">
		    <option value="<?=$product['category_id']?>">Huidige categorie</option>
	        <?php foreach($categories as $category): ?>
	            <option value="<?=$category['id']?>"><?=$category['category_name']?></option>
	        <?php endforeach; ?>
	    </select>
	</div>
	<div class="form-group">
	    <button type="submit" class="btn btn-primary" id="submit" name="submit">Bewerk product</button>
	</div>
</form>
