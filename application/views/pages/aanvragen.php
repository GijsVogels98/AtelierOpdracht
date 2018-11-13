<h2><?=$title?></h2>

<?=validation_errors('<div class="alert alert-danger"><strong>Opgelet!</strong> ', '</div>')?>

<?=form_open('pages/send')?>
  <div class="form-group">
    <label for="customer_name">Naam</label>
    <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Voer hier de naam van de lener in...">
  </div>
  <div class="form-group">
    <label for="student_number">Leerlingnummer</label>
    <input type="text" class="form-control" id="student_number" name="student_number" placeholder="Voer hier het leerlingnummer van de lener in...">
  </div>
  <div class="form-group">
    <label for="customer_email">E-mailadres</label>
    <input type="email" class="form-control" id="customer_email" name="customer_email" placeholder="Voer hier het e-mailadres van de lener in...">
  </div>
  <div class="row">
	  <div class="col-md-6">
		  <div class="form-group">
		    <label for="leen_periode_van">Begindatum</label>
		    <input type="date" class="form-control" id="leen_periode_van" name="leen_periode_van">
		  </div>
	  </div>
	  <div class="col-md-6">
		  <div class="form-group">
		    <label for="leen_periode_tot">Einddatum</label>
		    <input type="date" class="form-control" id="leen_periode_tot" name="leen_periode_tot">
		  </div>
	  </div>
  </div>
  <div class="form-group">
    <label for="note_before">Wat wil je lenen? en waarvoor?</label>
    <textarea  name="note_before" class="form-control"></textarea>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary" id="submit" name="submit">Aanvraag versturen</button>
  </div>
</form>
