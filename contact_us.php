<?php
	// Message Vars
	$msg = '';
	$msgClass = '';

	// Check For Submit
	if(filter_has_var(INPUT_POST, 'submit')){
		// Get Form Data
		$name = htmlspecialchars($_POST['name']);
		$email = htmlspecialchars($_POST['email']);
		$message = htmlspecialchars($_POST['message']);

		// Check Required Fields
		if(!empty($email) && !empty($name) && !empty($message)){
			// Passed
			// Check Email
			if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
				// Failed
				$msg = 'Please use a valid email';
				$msgClass = 'alert-danger';
			} else {
				// Passed
				$toEmail = 'support@traversymedia.com';
				$subject = 'Contact Request From '.$name;
				$body = '<h2>Contact Request</h2>
					<h4>Name</h4><p>'.$name.'</p>
					<h4>Email</h4><p>'.$email.'</p>
					<h4>Message</h4><p>'.$message.'</p>
				';

				// Email Headers
				$headers = "MIME-Version: 1.0" ."\r\n";
				$headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";

				// Additional Headers
				$headers .= "From: " .$name. "<".$email.">". "\r\n";

				if(mail($toEmail, $subject, $body, $headers)){
					// Email Sent
					$msg = 'Your email has been sent';
					$msgClass = 'alert-success';
				} else {
					// Failed
					$msg = 'Your email was not sent';
					$msgClass = 'alert-danger';
				}
			}
		} else {
			// Failed
			$msg = 'Please fill in all fields';
			$msgClass = 'alert-danger';
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sazinies ar mums</title>
	<link rel="stylesheet" href="https://bootswatch.com/4/cosmo/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="style.css" rel="stylesheet">
</head>
<body>

	<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
		<div class="container">
			<a href="#" class="navbar-brand"><img src="img/logo.png" alt=""></a>
			<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarResponsive">
					<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item ">
						<a href="index.html" class="nav-link">Sākums</a>
					</li>
					<li class="nav-item">
						<a href="service.html" class="nav-link">Pakalpojumi</a>
					</li>
					<li class="nav-item active">
						<a href="contact_us.php" class="nav-link">Atsauksmes</a>
					</li>
					<li class="nav-item">
						<a href="about.html" class="nav-link">Par mums</a>
					</li>
					<li class="nav-item">
						<a href="contact.html" class="nav-link">Kontakti</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<br>
	<div class="row text-center">
	  <div class="col-12">
			<h1>Sazinies ar mums</h1>
	  </div>
	</div>
    <div class="container">
    	<?php if($msg != ''): ?>
    		<div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
    	<?php endif; ?>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	      <div class="form-group">
		      <label>Vārds, Uzvārds</label>
		      <input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
	      </div>
	      <div class="form-group">
	      	<label>E-pasts</label>
	      	<input type="text" name="email" class="form-control" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
	      </div>
	      <div class="form-group">
	      	<label>Ziņojums</label>
	      	<textarea name="message" class="form-control"><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
	      </div>
	      <br>
	      <button type="submit" name="submit" class="btn btn-primary">Apstiprināt</button>
      </form>
    </div>

		<div class="container padding">
			<div class="row text-center padding">
				<div class="col-12 social">
					<a href="#"><i class="fab fa-facebook"></i></a>
					<a href="#"><i class="fab fa-twitter"></i></a>
					<a href="#"><i class="fab fa-google-plus-g"></i></a>
					<a href="#"><i class="fab fa-instagram"></i></a>
					<a href="#"><i class="fab fa-youtube"></i></a>
				</div>
			</div>
		</div>

		<footer>
			<div class="container-fluid padding">
				<div class="row text-center">
					<div class="col-md-4">
						<img src="img/contact.png">
						 <p>Kontakti</p>
						<hr class="light">
						<p>+371 29292929</p>
						<p>+371 29202020</p>
						<p>info@serviss.lv</p>
					</div>
					<div class="col-md-4">
						<img src="img/time.png">
						<h5>Darba laiks</h5>
						<hr class="light">
						<p>Pirmdienas: 9:00 - 17:00</p>
						<p>Sestdienas: 10:00 - 16:00</p>
						<p>Svētdienas: Slēgts</p>
					</div>
					<div class="col-md-4">
						<img src="img/location.png">
						<h5>Atrašanās vieta</h5>
						<hr class="light">
						<p>Tērbatas iela 10</p>
						<p>Valmiera, LV - 4201, Latvija</p>
					</div>
					<div class="col-12">
						<hr class="light-100">
						<h5>&copy; Alvis Šķēps</h5>
					</div>
				</div>
			</div>
		</footer>

</body>
</html>
