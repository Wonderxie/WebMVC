<h2>Inscription</h2>
<?php
    if(isset($inscErrorText))
    echo '<span class="error">' . $inscErrorText . '</span>';
?>
<form method="post" action="index.php?action=validateInscription" method="post">
    <table>
        <tr>
            <th>Login* :</th>
            <td><input type="text" name="inscLogin"/></td>
        </tr>
        <tr>
            <th>Password* :</th>
            <td><input type="password" name="inscPassword"/></td>
        </tr>
        <tr>
            <th>Email :</th>
            <td><input type="text" name="mail"/></td>
        </tr>
        <tr>
            <th>First Name :</th>
            <td><input type="text" name="prenom"/></td>
        </tr>
        <tr>
            <th>Last Name :</th>
            <td><input type="text" name="nom"/></td>
        </tr>
        <tr>
            <th />
            <td><input type="submit" value="Create Acount" /></td>
        </tr>
    </table>
</form>