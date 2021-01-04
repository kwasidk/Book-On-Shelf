<?php
require 'Private/connection.php';
$boekID = $_POST['id'];

$getBook = $conn->prepare('SELECT * FROM tblBooks WHERE ID = :bookID ');
$getBook->execute(array(
        ':bookID'=>$boekID
));

$results = $getBook->fetch(PDO::FETCH_ASSOC);
?>

<div class="container">
    <div class="page-header">
        <h1>Boek Wijzigen</h1>
    </div>
    <form action="PHP/Update.php" method="post">
        <input type="hidden" name="id" value="<?= $_POST['id'] ?>">
        <table class='table table-hover table-responsive table-bordered'>
            <tr>
                <td>Boek</td>
                <td><input type='text' name='BoekNaam' class='form-control' value="<?= $results['BoekNaam']?>" /></td>
            </tr>
            <tr>
                <td>Schrijver</td>
                <td><input name='Schrijver' class='form-control' value="<?= $results['Schrijver']?>" /></td>
            </tr>
            <tr>
                <td>Genre</td>
                <td><input type='text' name='Genre' class='form-control' value="<?=$results['Genre']?>" /></td>
            </tr>
            <tr>
                <td>ISBN</td>
                <td><input type='text' name='ISBN' class='form-control' value="<?= $results['ISBN']?>" /></td>
            </tr>
            <tr>
                <td>Taal</td>
                <td><input type='text' name='Taal' class='form-control' value="<?= $results['Taal']?>" /></td>
            </tr>
            <tr>
                <td>Pagina's</td>
                <td><input type='text' name='Pagina' class='form-control' value="<?= $results['Pagina']?>" /></td>
            </tr>
            <tr>
                <td>Voorraad</td>
                <td><input type='text' name='Voorraad' class='form-control' value="<?= $results['Voorraad']?>" /></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type='submit' value='Save' class='btn btn-primary' />
                    <a href='index.php?page=Boekenoverzicht' class='btn btn-danger'>Naar Boekenoverzicht</a>
                </td>
            </tr>
        </table>
    </form>

</div>
