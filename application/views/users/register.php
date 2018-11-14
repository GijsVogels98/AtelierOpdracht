
<?php echo validation_errors(); ?>

<?php echo form_open('users/register'); ?>
<div class="row">
    <div class="col-md-4 mx-auto d-block">
        <h1 class="text-center"><?= $title; ?></h1>
        <div class="form-group">
            <label>Naam</label>
            <input type="text" class="form-control" name="username" placeholder="Naam">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label>Herhaal Email</label>
            <input type="email" class="form-control" name="email2" placeholder="Herhaal Email">
        </div>
        <div class="form-group">
            <label>Wachtwoord</label>
            <input type="password" class="form-control" name="password" placeholder="Wachtwoord">
        </div>
        <div class="form-group">
            <label>Herhaal Wachtwoord</label>
            <input type="password" class="form-control" name="password2" placeholder="Herhaal Wachtwoord">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Verder</button>
    </div>
</div>

<?php echo form_close(); ?>
