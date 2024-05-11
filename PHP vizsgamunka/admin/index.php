<!DOCTYPE html>
<html>
<head>
	<title>Admin belépés</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
     <form action="login.php" method="post">
     	<h2>Admin bejelentkezés</h2>
     	<?php 
        if (isset($_GET['error'])) { 
        ?>
     	<p class="error"><?php print $_GET['error']; ?></p>
     	<?php 
        } 
        ?>
     	<label>Felhasználónév</label>
     	<input type="text" name="uname" placeholder="Felhasználónév"><br>

     	<label>Jelszó</label>
     	<input type="password" name="password" placeholder="Jelszó"><br>

     	<button type="submit">Bejelentkezés</button>
     </form>
	
	 <div><button><a href="../index.php">Vissza a főoldalra</a></button></div>

</body>
</html>