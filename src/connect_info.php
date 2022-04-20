<?php
include_once ('connexiondb.php');
$valid = (boolean) true;

if (! empty($_POST)) {
    extract($_POST);
    

    if (isset($_POST['connexion'])) {

        $email = (string) trim($email);
        $password = (string) trim($password);
        
        
        if (empty($email)) {
            $valid = false;
            $err_msg3 = "il y a un couac !";
        }
        if (empty($password)) {
            $valid = false;
            $err_msg4 = "il y a un couac !";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<body>
	<form action="" method="post" type="hidden">

		<div class="form-group">
			<label for="email">Email</label><input type="text"
				class="form-control" id="email" name="email" />
				<?php
    if (isset($err_msg3)) {
        echo $err_msg3;
    }
    ?>
		</div>
		<div class="form-group">
			<label for="password">Password</label> <input type="password"
				class="form-control" id="password" name="password" />
				<?php
    if (isset($err_msg4)) {
        echo $err_msg4;
    }
    ?>
		</div>

		<input type="submit" name="connexion" class="btn btn-primary" />
	</form>

	<form action="index.php">
		<button type="submit">retour</button>
	</form>
	
<?php 

if ($valid) {
    
    
    
    
    // connect to the database and select the publisher
    
    
    $sql = 'SELECT *
		FROM registration
        WHERE email = ? AND password = ?';
    
    $statement = $BDD->prepare($sql);
    $statement->bindParam(1, $email, PDO::PARAM_STR);
    $statement->bindParam(2, $password, PDO::PARAM_STR);
    $statement->execute();
    
    $data_retrieve = $statement->fetch(PDO::FETCH_ASSOC);
    
    if ($data_retrieve) {
        
        echo '<h2> INFORMATIONS PERSONELLES DU COMPTE</h2><br>';
        echo 'Prenom: ' . $data_retrieve['firstName'] . '<br>Nom: ' . $data_retrieve['lastName'] . '<br>Email: ' . $data_retrieve['email'] . '<br>Mot de passe: ';
        for ($i = 0; $i < strlen($data_retrieve['password']); $i++) {
            echo '•';
        }
        echo '<br>Numéro de téléphone: ' . $data_retrieve['number'];
    } else {
        if($email)
        echo "le compte de $email n'a pas été trouvé !";
    }
    
} else {
    $valid = false;
    die();
}
?>
  
</body>
</html>