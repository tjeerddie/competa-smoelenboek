<?php require_once("resources/view/templates/header.php"); ?>
<section id='content'>
    <fieldset>
        <legend>Login</legend>
        <form method="post" autocomplete="off">
            <table>
                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" autocomplete="off" placeholder="Type your Username" name="username" value='<?= isset($username)?$username:"";?>' required="required">
                    </td>
                </tr>
                <tr >
                   <td>Password:</td>
                   <td>
                       <input type="password" autocomplete="off" name="password" placeholder="Type your password" required="required" >
                   </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="inloggen"><input type="reset" value="reset">
                    </td>
                </tr>
            </table>
        </form>
    </fieldset>
    <?php echo $message . "</br></br>"; ?>
</section>

<?php require_once("resources/view/templates/footer.php"); ?>
