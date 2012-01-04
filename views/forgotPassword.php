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
<form action="index.php?controller=user&view=retrievePassword" method="POST">
<h1>Login</h1>
<p>Email: <input type="text" id="email" name="email"></p>
<p><input type="submit" value=" Reset Password "></p>
</form>
</body>

</html>