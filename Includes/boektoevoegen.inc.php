<div class="container">
    <div class="page-header">
        <h1>Boek Toevoegen</h1>
    </div>
    <form action="PHP/Boektoevoegen.php" method="post">
        <table class='table table-hover table-responsive table-bordered'>
            <tr>
                <td>Boek</td>
                <td><input type='text' name='BoekNaam' class='form-control' /></td>
            </tr>
            <tr>
                <td>Schrijver</td>
                <td><textarea name='Schrijver' class='form-control'></textarea></td>
            </tr>
            <tr>
                <td>Genre</td>
                <td><input type='text' name='Genre' class='form-control' /></td>
            </tr>
            <tr>
                <td>ISBN</td>
                <td><input type='text' name='ISBN' class='form-control' /></td>
            </tr>
            <tr>
                <td>Taal</td>
                <td><input type='text' name='Taal' class='form-control' /></td>
            </tr>
            <tr>
                <td>Pagina's</td>
                <td><input type='text' name='Pagina' class='form-control' /></td>
            </tr>
            <tr>
                <td>Voorraad</td>
                <td><input type='text' name='Voorraad' class='form-control' /></td>
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
