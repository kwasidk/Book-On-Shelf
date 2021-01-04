<div class="container">

    <div class="page-header">
        <h1>Overzicht van de boeken!</h1>
    </div>

    <?php
    include 'Private/connection.php';

    $sql = 'SELECT * FROM tblBooks';
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $num = $stmt->rowCount();

    ?>

    <a href='index.php?page=Boektoevoegen' class='btn btn-primary m-b-m-1em'>Boek toevoegen</a>

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
            <td><?= $row['ID']?></td>
            <td><?= $row['BoekNaam']?></td>
            <td><?= $row['Schrijver']?></td>
            <td><?= $row['Genre']?></td>
            <td><?= $row['ISBN']?></td>
            <td><?= $row['Taal']?></td>
            <td><?= $row['Pagina']?></td>
            <td><?= $row['Voorraad']?></td>
            <td>

                <form action="index.php?page=boekwijzigen" method="post">
                    <input type="hidden" name="id" value="<?=$row['ID']?>">
                    <button type="submit">Wijzigen</button>
                </form>

                <form action="PHP/Delete.php" method="post">
                    <input type="hidden" name="id" value="<?=$row['ID']?>">
                    <button type="submit">Verwijderen</button>
                </form>

            </td>
        </tr>
            <?php } ?>


    </table>

   <?php } else { ?>
    <div class='alert alert-danger'>Geen records gevonden.</div>
   <?php } ?>



</div>

