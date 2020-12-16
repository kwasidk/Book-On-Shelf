<div class="text-center center-div">
    <div class="signup-form">
        <form action="PHP/Login.php" method="post">
            <h2>Book-On-Shelf login</h2>
            <!--        <p>Please fill in this form to create an account!</p>-->
            <hr>

            <?php
            if (isset($_SESSION['Melding'])) {
                echo '<p>' . $_SESSION['Melding'] . '</p>';
                unset($_SESSION['Melding']);
                }
            ?>
            <div class="form-group">
                <input type="email" class="form-control" name="username" placeholder="Email" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg">Sign In!</button>
            </div>
            <div class="form-group">
                <div class="footer-copyright text-center py-3">© 2020 Copyright:<a href="https://github.com/kwasidk">
                        Kwasi
                        Kattah</a>
                </div>
            </div>
        </form>

    </div>
</div>

