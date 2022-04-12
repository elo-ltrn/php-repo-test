<?php 
    include_once('connexiondb.php');
    echo "okey";
    if(!empty($_POST)){
        extract($_POST);
        $valid = (boolean) true;
        
        if(isset($_POST['inscription'])){
            $firstName = (String) trim($firstName);
            $lastName = (String) trim($lastName);
            $email = (String) trim($email);
            $password = (String) trim($password);
            $number = (int) trim($number);
         
            if(empty($firstName)){
                $valid = false;
                $err_msg1 = "il y a un couac !";
            }
            if(empty($lastName)){
                $valid = false;
                $err_msg2 = "il y a un couac !";
            }
            if(empty($email)){
                $valid = false;
                $err_msg3 = "il y a un couac !";
            }
            if(empty($password)){
                $valid = false;
                $err_msg4 = "il y a un couac !";
            }
            if(empty($number)){
                $valid = false;
                $err_msg5 = "il y a un couac !";
            }
            if($valid){
                $req = $BDD->prepare("INSERT INTO registration (firstName,lastName,email,password,number) VALUES (?,?,?,?,?) ");
                $req->execute(array($firstName,$lastName,$email,$password,$number));
            }
        }
        
    }
?>

<!DOCTYPE html>
<html>
<body>
	<form action="index.php" method="post">
		<div class="form-group">
			<label for="firstName">First Name</label> <input type="text"
				class="form-control" id="firstName" name="firstName" />
				<?php 
    				if(isset($err_msg1)){
    				    echo $err_msg1;
    				}
				?>
		</div>
		<div class="form-group">
			<label for="lastName">Last Name</label> <input type="text"
				class="form-control" id="lastName" name="lastName" />
				<?php 
    				if(isset($err_msg2)){
    				    echo $err_msg2;
    				}
				?>
		</div>
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
		<div class="form-group">
			<label for="number">Phone Number</label> <input type="number"
				class="form-control" id="number" name="number" />
				<?php 
    				if(isset($err_msg5)){
    				    echo $err_msg5;
    				}
				?>
		</div>
		<input type="submit" name="inscription" class="btn btn-primary" />
	</form>

</body>
</html>