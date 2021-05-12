<?php 
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FirstScreen</title>
	<!-- Import Boostrap css, js, font awesome here -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">       
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js">
	</script>
    <link href="style2.css" rel="stylesheet">
	<style>
		.h1, h1 {
    		font-size: 1.8rem!important;
		}
		.carousel-inner {
			height: 450px;
		}
		.carousel-inner img{
			height: 450px;
			width: 100%;
		}

	</style>

</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
	<div class="container-fluid">
		<a class="navbar-branch" href="#">
			<h1 height="50" style="color: white"><i class="fas fa-home"></i>Home</h1>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="login.php">Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="signup.php">Singup</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
<!-- Carousel -->
<div id="slides" class="carousel slide" data-ride="carousel">
	<ul class="carousel-indicators">
		<li data-target="#slides" data-slide-to="0" class="active"></li>
		<li data-target="#slides" data-slide-to="1"></li>
		<li data-target="#slides" data-slide-to="2"></li>		
		<li data-target="#slides" data-slide-to="3"></li>
		<li data-target="#slides" data-slide-to="4"></li>
	</ul>

	<div class="carousel-inner">
		<div class="carousel-item active">
			<img src="./images/background.jpg">
			<div class="carousel-caption" >
				<h1 class="display-2" >Wellcome</h1>
				<h3>Build your Timeline with us</h3>
				<button type="button" class="btn btn-outline-light btn-lg" onclick="window.location.href='#examples'" style="color: rgb(108, 138, 126)">
					VIEW EXAMPLE
				</button>
				<button type="button" onclick="window.location.href='login.php'" class="btn btn-primary btn-lg" >Get started</button>
			</div>
		</div>
		<div class="carousel-item">
			<img src="./images/slide1.jpg">
		</div>
		<div class="carousel-item">
			<img src="./images/slide2.png">
		</div>
		<div class="carousel-item">
			<img src="./images/slide3.png">
		</div>
		<div class="carousel-item">
			<img src="./images/slide4.jpg">
		</div>
	</div>
</div>

<div id="snackbar">Success</div>
<?php
    if (isset($_SESSION['signuped'])) {
        ?>
        <script>
            var x = document.getElementById("snackbar");
            x.className = "show";
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        </script>
        <?php
        unset($_SESSION['signuped']);
    }
?>

<!-- jumbotron -->
<div class="container-fluid">
	<div class="jumbotron">
		<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
			<p>A timeline is a very important part of your life.
				It basically shows the chronological order of events that you plan to do in your project
				and provide to give the reader a broad overview of the project at a glance.
				We will help you with that.</p>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
			<a href="#">
				<button type="button" class="btn btn-outline-secondary" onclick="window.location.href='signup.php'">Register</button>
			</a>
		</div>
	</div>
</div>

<div class="container-fluid padding">
	<div class="row welcome text-center">
		<div class="col-12">
			<h1 class="display-4">Build your Timeline</h1>
		</div>
		<!-- Horizontal Rule -->
		<hr> 
		<div class="col-12">
			<p>Welcome to Timeline......bla.....</p>
		</div>
	</div>
</div>
<div class="container-fluid padding">
	<div class="row text-center padding">
		<div class="col-xs-12 col-sm-6 col-md-4 ">
			<i class="fab fa-earlybirds"></i>
			<h3>REACT</h3>
			<p>....</p>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-4">
			<i class="fab fa-earlybirds"></i>
			<h3>....</h3>
			<p>....</p>
		</div>
		<div class="col-sm-12 col-md-4">
			<i class="fab fa-earlybirds"></i>
			<h3>...</h3>
			<p>....</p>
		</div>
	</div>	
	<hr class="my-4">	
</div>

<div class="container-fluid padding">
	<div class="row padding">
		<div class="col-md-12 col-lg-6">
			<h2>If you build it...</h2>
			<p>....bla...</p>
			<p>...bla...</p>
			<br>
		</div>
		<div class="col-lg-6">
			<img src="./images/5.jpg" class="img-fluid">
		</div>
	</div>
</div>

<hr class="my-2">
<button class="fun" data-toggle="collapse" data-target="#emoji">
	Click for fun
</button>
<div id="emoji" class="collapse">
	<div class="container-fluid padding">
		<div class="row text-center">
			<div class="col-sm-6 col-md-3">
				<img class="gif" src="./images/gif/blinkEyes.gif" width="100" height="100">
			</div>
			<div class="col-sm-6 col-md-3">
				<img class="gif" src="./images/gif/blinkGirl.gif" width="100" height="100">
			</div>
			<div class="col-sm-6 col-md-3">
				<img class="gif" src="./images/gif/faceHaha.gif" width="100" height="100">
			</div>
			<div class="col-sm-6 col-md-3">
				<img class="gif" src="./images/gif/haha.gif" width="100" height="100">
			</div>
		</div>
	</div>
</div>

<div class="container-fluid padding">
	<div class="row welcome text-center">
		<div class="col-12">
			<h1 class="display-4">EXAMPLES</h1>
		</div>
	</div>
</div>

<div class="container-fluid padding" id="examples">
	<div class="row padding">
		<div class="col-md-4">
			<div class="card">
				<img class="card-img-top" src="./images/image.jpg">
				<div class="card-body">
					<h4 class="card-title">Tineline1</h4>
					<p class="card-text">..........................balabla............</p>
					<a href="#" class="btn btn-outline-secondary">See example</a>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
				<img class="card-img-top" src="./images/image.jpg">
				<div class="card-body">
					<h4 class="card-title">
						Timeline2
					</h4>
					<p class="card-text">.................lbalababla.........</p>
					<a href="#" class="btn btn-outline-secondary">See example</a>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
				<img class="card-img-top" src="./images/image.jpg">
				<div class="card-body">
					<h4 class="card-title">
						Timeline3
					</h4>
					<p class="card-text">.............blabla..................</p>
					<a href="#" class="btn btn-outline-secondary">See example</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid padding" style="margin-top: 20px;">
	<div class="row padding">
		<div class="col-md-12 col-lg-6">
			<h2>Our vision</h2>
			<p>All our work is for customer satisfaction with high quality products</p>
			<p>......</p>
			<br>
		</div>
		<div class="col-lg-6">
			<img src="./images/mission.jpg" class="img-fluid">
		</div>
	</div>
	<hr class="my-4">
</div>

<?php
	include 'footer.php';
?>
</body>
</html>












