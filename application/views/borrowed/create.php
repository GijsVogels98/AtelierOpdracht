<h2>Lening aanmaken</h2>

<?=validation_errors('<div class="alert alert-danger"><strong>Opgelet!</strong> ', '</div>')?>

<?=form_open('borrowed/create')?>
	<div class="form-group">
      <label for="student_number">Leerlingnummer</label>
      <input type="text" class="form-control" id="student_number" name="student_number" placeholder="Voer hier het leerlingnummer van de lener in...">
   </div>
   <div class="form-group">
   	<label for="customer_name">Naam</label>
      <input type="text" class="form-control" id="customer_name autocomplete" name="customer_name" placeholder="Voer hier de naam van de lener in...">
    </div>
    <div class="form-group">
      <label for="customer_email">E-mailadres</label>
      <input type="email" class="form-control" id="customer_email" name="customer_email" placeholder="Voer hier het e-mailadres van de lener in...">
    </div>
    <div class="form-group">
      <label for="customer_phone">Telefoonnummer (Optioneel)</label>
      <input type="text" class="form-control" id="customer_phone" name="customer_phone" placeholder="Voer hier het telefoonnummer van de lener in...">
    </div>
    <div class="form-group">
      <label for="borrowed_till">Inleverdatum</label>
      <input type="date" class="form-control" id="borrowed_till" name="borrowed_till">
    </div>
    <div class="form-group">
      <label for="product_id">Product</label>
      <select name="product_id" class="form-control">
              <?php foreach($products as $product):
                  if ($product['count'] == $product['product_lent']) { continue; }
              ?>
                  <option value="<?=$product['product_id']?>"><?=$product['name']?></option>
              <?php endforeach; ?>
          </select>
    </div>
    <div class="form-group">
      <label for="for_what">Waar wordt het product voor gebruikt?</label>
      <textarea  name="for_what" class="form-control"></textarea>
    </div>
    <div class="form-group">
      <label for="note_before">Opmerking voor het lenen</label>
      <textarea  name="note_before" class="form-control"></textarea>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary" id="submit" name="submit">Voeg lening toe</button>
    </div>
</form>
	