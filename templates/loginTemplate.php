<h2>Login</h2>
<?php
    if(isset($logErrorText))
    echo '<span class="error">' . $logErrorText . '</span>';
?>
<form action="index.php?action=validateLogin" method="post">
    <table>
        <tr>
            <th>Login* :</th>
            <td><input type="text" name="logLogin"/></td>
        </tr>
        <tr>
            <th>Password* :</th>
            <td><input type="password" name="logPassword"/></td>
        </tr>
        <tr>
            <th />
            <td><input type="submit" value="Log In" /></td>
        </tr>
    </table>
</form>