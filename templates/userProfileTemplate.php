<div id="content">
    <h2>Welcome <?php echo $user->login(); ?>!</h2>
    <h3>Your Profile</h3>
    <table>
        <tr>
            <th>Login : </th>
            <td><?php echo $user->login() ?></td>
        </tr>
        <tr>
            <th>First Name :</th>
            <td><?php echo $user->prenom() ?></td>
        </tr>
        <tr>
            <th>Last Name :</th>
            <td><?php echo $user->nom() ?></td>
        </tr>
        <tr>
            <th>Email :</th>
            <td><?php echo $user->mail() ?></td>
        </tr>
    </table>
</div>