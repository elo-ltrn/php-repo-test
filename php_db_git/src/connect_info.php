<?php 
    include_once('connexiondb.php');
    
    $user_connected = false;
    if(!empty($_POST)){
        extract($_POST);
        $valid = (boolean) true;
        
        if(isset($_POST['connexion'])){
           
            $email = (String) trim($email);
            $password = (String) trim($password);
         
            if(empty($email)){
                $valid = false;
                $err_msg3 = "il y a un couac !";
            }
            if(empty($password)){
                $valid = false;
                $err_msg4 = "il y a un couac !";
            }
            if($valid){
                echo "RAVAGE";
                
                $req = mysqli_query($BDD, "SELECT * FROM registration WHERE email=? AND password=?");
                $result = ->execute(array($email,$password));
                //$req = $req->fetch();
                
                if(isset($req)){
                    $user_connected = true;
                    
                    
                }else{
                    $valid = false;
                    $err_compte = "ce compte n'existe pas!";
                }
            }
        }
        
    }
?>

<!DOCTYPE html>
<html>
<body>
	<form action="connect_info.php" method="post">
		
		<div class="form-group">
			<label for="email">Email</label> <input type="text"
				class="form-control" id="email" name="email" />
				<?php 
    				if(isset($err_msg3)){
    				    echo $err_msg3;
    				}
				?>
		</div>
		<div class="form-group">
			<label for="password">Password</label> <input type="password"
				class="form-control" id="password" name="password" />
				<?php 
    				if(isset($err_msg4)){
    				    echo $err_msg4;
    				}
				?>
		</div>
		
		<input type="submit" name="connexion" class="btn btn-primary" />
	</form>
	
	<form action="index.php">
      <button type="submit">retour</button>
  </form>
  
  
</body>
</html>