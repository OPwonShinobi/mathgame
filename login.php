<?php include("header.php");
	session_start();
?>
<div class="container form-group">
	<p class="bigText">Please log on to our simple Math game.</p>
		
	<?php if(isset($_SESSION['error'])): ?>
		 <p class='warn'><?= $_SESSION['error']?></p>
	<?php endif;?>
	<form action="index.php" method="post">
		<div class="row">
			<p class="col-sm-3">Email:</p>
			<input class="col-sm-3 shorten form-control" type="email" name="email">
		</div>
		<div class="row">
			<p class="col-sm-3">Password:</p>
			<input class="col-sm-3 shorten form-control" type="passWord" name="PW">
		</div>
		<br>
		<input class="btn btn-primary" type="submit" name="submit" value="Login">
	</form>
</div>
<?php	session_destroy();
?>
<?php include("footer.php"); ?>