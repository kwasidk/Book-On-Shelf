<?php include "navbar.php"; ?>

<div class="signup-form center-div">
    <form action="" method="post">
        <h2>Book-on-Shelf Registreren</h2>
        <p>Registreer je om een account aan te maken!</p>
        <hr>

        <div class="form-group">
            <input type="Email" class="form-control" name="Email" placeholder="Email" required="required">
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col"><input type="text" class="form-control" name="first_name" placeholder="Voornaam"
                                        required="required"></div>
                <div class="col"><input type="text" class="form-control" name="last_name" placeholder="Achternaam"
                                        required="required"></div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="text" class="form-control" name="Straat" placeholder="Straat" required="required">
            </div>

            <div class="form-group col-md-6">
                <input type="text" class="form-control" name="Huisnummer" placeholder="Huisnummer" required="required">
            </div>

            <div class="form-group col-md-6">
                <input type="text" class="form-control" name="Postcode" placeholder="Postcode" required="required">
            </div>

            <div class="form-group col-md-6">
                <input type="text" class="form-control" name="Woonplaats" placeholder="Woonplaats" required="required">
            </div>
        </div>


        <div class="form-group">
            <input type="password" class="form-control" name="wachtwoord" placeholder="Wachtwoord"
                   required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="confirm_password" placeholder="Wachtwoord Verifieren"
                   required="required">
        </div>

        <div class="form-group">
            <input type="password" class="form-control" name="confirm_password" placeholder="Wachtwoord Verifieren"
                   required="required">
        </div>

        <div class="form-group">
            <label>Geboortedatum</label>
            <input class="form-control" type="date" placeholder="Geboortedatum" id="example-date-input"
                   required="required">
        </div>

        <hr>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">Registreer</button>
        </div>
    </form>
</div>

