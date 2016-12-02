<?php include("header.php"); ?>
<?php  session_start(); 
	if (isset($_POST["email"]) || isset($_POST["PW"])) {
		$e = $_POST["email"];
		$p = $_POST["PW"];
	}
	$error1 = null;
	$error2 = null;
	if (isset($e) && $e != "a@a.a")
		$error1 = "vaild email";
	if (isset($p) && $p != "aaa")
		$error2 = "valid password";
	if( (isset($error1) && !isset($error2)) ||
	(!isset($error1) && isset($error2)) ) {
		$_SESSION['error'] = "You must enter a " . $error1.$error2;
		header ("Location: index.php");
	}
	if(isset($error1) && isset($error2)) {
		$_SESSION['error'] = "You must enter a " . $error1. " and a ". $error2;
		header ("Location: index.php");
	}
	if(isset($_POST['leave'])) {
		header ("Location: index.php");
		die();
		// session_destroy();
	}
	?>
	<div class="container">
	<p class="bigText textCentered">Math Game</p>
	<form action="game.php" method="post">
		<input class="btn btn-default centered" type="submit" name="leave" value="Log out">
		<br> 
		<?php 
				if (isset($_POST['guess'] )) {
					if(is_numeric($_POST['guess'])) {
						$_SESSION['playerAns'] = $_POST['guess'];
						if ($_SESSION['playerAns'] == $_SESSION['prevAns']) 
							echo "<p class='textCentered'>Congratulations. Now do another one.</p>";
						if  ($_SESSION['playerAns'] != $_SESSION['prevAns'])
							echo "<p class='textCentered'>(T.T) the answer was ".$_SESSION['prevAns']."</p>";
					} else {
						echo "<p class='textCentered warn'>Invalid input. Only enter an integer!</p>";

				}
			}
		?>
		<?php
			$num1 = Rand(0,20);
			$num2 = Rand(0,20);
			$sign = Rand(0,1);
			$ans = null;
			if ($sign == 0) {
				$sign = "-";
				$ans = $num1 - $num2;
			}
			if ($sign == 1) {
				$sign = "+";
				$ans = $num1 + $num2;
			}
			$_SESSION['prevAns'] = $ans;
			echo "<p class='bold textCentered'> $num1 $sign $num2 </p>";
			// echo  "<p class='textCentered'> $ans </p>"; 
		?>
		<input class="form-control shorten centered" type="text" name="guess">
		<br>
		<br>
		<input class="btn btn-primary centered" type="submit" name="reload" value="submit">
	</form>
	<hr>
	<p class="textCentered">Score: 0/0</p>
</div>
<?php include("footer.php"); ?>