<?php
include_once ('connexiondb.php');


if (! empty($_POST)) {
    extract($_POST);
    $valid = (boolean) true;

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
	<form action="" method="post">

		<div class="form-group">
			<label for="email">Email</label> <input type="text"
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
    
    //echo $email . $password;
    //avec objet PDO: https://www.chiny.me/objet-pdo-pour-la-connexion-a-une-base-de-donnees-en-php-8-12.php
    $ins = $DB->prepare("SELECT * FROM registration");
    $ins->setFetchMode(PDO::FETCH_ASSOC);
    //$ins->execute(array($email,$password));
    $ins->execute();
    
    $tab = $ins->fetchAll();
    echo $tab;
    
    //$result = mysql_query("SELECT * FROM registration WHERE email='%s' AND password='%s' ", mysql_real_escape_string($email), mysql_real_escape_string($password));
    //echo $result;
    // $nblignes = mysql_num_rows($result);
    // $req = mysqli_query($BDD, "SELECT * FROM registration WHERE email=? AND password=?");
    // $result = ->execute(array($email,$password));
    // $req = $req->fetch();
    
    //while ($ligne = mysql_fetch_array($result)) {
    //    $infos .= "<div>" . $ligne['firstName'] . "</div><div>" . $ligne['lastName'] . "</div><div>" . $ligne['email'] . "</div><div>" . $ligne['password'] . "</div><div>" . $ligne['number'];
    //}
    
} else {
    $valid = false;
    $err_compte = "ce compte n'existe pas!";
    echo $err_compte;
}
?>
  
</body>
</html>