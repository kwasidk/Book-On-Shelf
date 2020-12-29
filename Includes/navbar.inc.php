<nav class="navbar navbar-expand-lg bg-dark">
    <a class="navbar-brand" href="#">Book-on-Shelf</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <?php
            if (isset($_SESSION['ingelogd'])) {
                if ($_SESSION['ingelogd'] == 'Beheerder') {
                    $menuItems = array(
                        array('Geleendeboeken', 'Geleende Boeken'),
                        array('Boekenoverzicht', 'Boeken Overzicht'),
                        array('Boektoevoegen', 'Boek Toevoegen')

                    );
                } elseif ($_SESSION['ingelogd'] == 'Klant') {
                    $menuItems = array(
                        array('Geleendeboeken', 'Geleende Boeken'),
                        array('Boekenoverzicht', 'Boeken Overzicht')
                    );
                }
            } else {
                $menuItems = array(
                    array('Home', 'Inloggen'),
                    array('Registreren', 'Registreren')

                );
            }

            foreach ($menuItems as $menuItem) {

                echo '<li class="nav-item"><a class="nav-link" href="index.php?page=' . $menuItem[0] . '" >' . $menuItem[1] . '</a>';

            }

            if (isset($_SESSION['ingelogd'])) {
                echo '<li class="nav-item"><a class="nav-link" href="PHP/Logout.php" >Uitloggen</a>';
            }
            ?>
        </ul>
    </div>
</nav>