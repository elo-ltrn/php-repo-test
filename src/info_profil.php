<?php 
include_once ('connexiondb.php');
?>

<!DOCTYPE html>
<html>
<body>

<?php
    if (isset($infos)) {
        echo $infos;
    }
?>
	<form action="index.php">
		<button type="submit">retour</button>
	</form>


</body>
</html>