<!DOCTYPE html>
<html>
<head>
<title>Lava Serpent</title>
</head>

<style>
	body{
		font-family: sans-serif;
	}
	h1 {
		font-size:16px;
		text-align:center;
	}
	.center{
		text-align:center;
	}
	.logo {
		text-align:center;
		margin-left:auto;
		margin-right:auto;
	}
	
</style>
<body>
<div class="logo">
	<a href="index.php"><img src="images/lava_serpent.jpg" border="0"></a>
</div>
<!-- With more time I would include javascript validation for the email address and have the user confirm their password -->

<form action="index.php?controller=user&view=register" method="POST">
<h1>Register</h1>
<p>First Name: <input type="text" id="fname" name="fname"></p>
<p>Last Name: <input type="text" id="lname" name="lname"></p>
<p>Email: <input type="text" id="email" name="email"></p>
<p>Password: <input type="password" id="password" name="password"></p>
<p><input type="submit" value=" Register "></p>
</form>
</body>

</html>