<!DOCTYPE html>
<html>
<head>
	<title>Application</title>
</head>
<body >
    <h2>Login</h2>
    <form method="post" enctype="multipart/form-data" action="<?=site_url('control/connexion')?>">
        <label for="pseudo">Pseudo: </label>
        <input type="text" name="pseudo" placeholder="username" value="<?php echo set_value('pseudo');?>"/><br/><br/>
        <?php echo form_error('pseudo');?>
        <label for="mdp">Mot de pass: </label>
        <input type="password" name="mdp" placeholder="password" value="<?php echo set_value('mdp');?>"/>
        <?php echo form_error('mdp');?>
       
        <?php echo form_open_multipart('control/connexion');?>

        <input type="file" name="userfile" size="20" />

        <br /><br />

        <input type="submit" value="Envoyer"/>
    </form>

</body>
</html>