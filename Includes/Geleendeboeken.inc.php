<div class="container">

    <div class="page-header">
        <h1>Je geleende boeken!</h1>
    </div>

    <?php
    include 'Private/connection.php';

    $sql = 'SELECT tblBorrowedBooks.ID, BoekNaam, Schrijver, Genre, ISBN, Taal, Pagina, startdate FROM tblBorrowedBooks INNER JOIN tblBooks tB on tblBorrowedBooks.FK_BookID = tB.ID WHERE startdate IS NOT NULL AND enddate IS NULL';

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $num = $stmt->rowCount();

    ?>


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
                    <td>

                        <?php if ($_SESSION['ingelogd'] == 'Klant') ?>
                        <form action="PHP/Return.php" method="post">
                            <input type="hidden" name="id" value="<?= $row['ID'] ?>">
                            <button type="submit">Terug brengen</button>
                        </form>


                    </td>
                </tr>
            <?php } ?>


        </table>

    <?php } else { ?>
        <div class='alert alert-danger'>Geen records gevonden.</div>
    <?php } ?>


</div>

