<div class="container">

    <div class="page-header">
        <h1>Overzicht van de boeken!</h1>
    </div>

    <?php
    include 'Private/connection.php';

    $sql = 'SELECT tblBooks.ID, BoekNaam, Schrijver, Genre, ISBN, Taal, Pagina, Voorraad, COUNT(b.ID) AS uitgeleend 
FROM tblBooks 
    LEFT JOIN tblBorrowedBooks b 
        ON tblBooks.ID = b.FK_BookID 
               AND b.startdate IS NOT NULL 
               AND b.enddate IS NULL 
GROUP BY ID  ';


    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $num = $stmt->rowCount();

    ?>

    <?php if ($_SESSION['ingelogd'] == 'Beheerder') { ?>
        <a href='index.php?page=Boektoevoegen' class='btn btn-primary m-b-m-1em'>Boek toevoegen</a>
    <?php } ?>

    <?php if ($num > 0) { ?>
        <table class='table table-hover table-responsive table-bordered'>

            <tr>
                <th>ID</th>
                <th>BoekNaam</th>
                <th>Schrijver</th>
                <th>Genre</th>
                <th>ISBN</th>
                <th>Taal</th>
                <th>Pagina</th>
                <th>Voorraad</th>
                <th>Acties</th>

            </tr>
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?= $row['ID'] ?></td>
                    <td><?= $row['BoekNaam'] ?></td>
                    <td><?= $row['Schrijver'] ?></td>
                    <td><?= $row['Genre'] ?></td>
                    <td><?= $row['ISBN'] ?></td>
                    <td><?= $row['Taal'] ?></td>
                    <td><?= $row['Pagina'] ?></td>
                    <td><?= $row['Voorraad'] - $row['uitgeleend']?>/<?= $row['Voorraad'] ?></td>
                    <td>

                        <?php if ($_SESSION['ingelogd'] == 'Beheerder') { ?>
                            <form action="index.php?page=boekwijzigen" method="post">
                                <button type="submit" name="id" value="<?= $row['ID'] ?>" >Wijzigen</button>
                            </form>

                            <form action="PHP/Delete.php" method="post">
                                <button type="submit" name="id" value="<?= $row['ID'] ?>">Verwijderen</button>
                            </form>

                        <?php } else { ?>
                            <form action="PHP/BorrowBooks.php" method="post">
                                <input type="hidden" name="id" value="<?= $row['ID'] ?>">
                                <button type="submit"><?= $row['Voorraad'] - $row['uitgeleend'] > 0 ? 'Lenen' : 'Reserveren' ?></button>
                            </form>

                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>


        </table>

    <?php } else { ?>
        <div class='alert alert-danger'>Geen records gevonden.</div>
    <?php } ?>


</div>

