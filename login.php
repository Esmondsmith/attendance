<?php 
$title = "User Login";

require_once "includes/header.php"; 
require_once "db/crud.php";
require_once 'db/conn.php';


//Generic way to check if the form was submitted by post request
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = strtolower(trim($_POST['username']));
    $password = $_POST['password'];
    $new_password = md5($password.$username);

    $result = $user->getUser($username, $new_password);

    if(!$result){
        // save the error message in a session and then call it where you want to use it;
        $_SESSION['login_error'] = "Username or Password is Incorrect";
        header("location: login.php");
        exit();
    } else {
        $_SESSION['username'] = $username;
        $_SESSION['userid'] = $result['id'];
        header("Location: viewrecords.php");
    }
}


?>


<section class="login-block">
    <div class="container">
	<div class="row">
	<div class="col-md-4 login-sec">
		    <h2 class="text-center">Welcome Back!</h2>
            <h4 class="text-center mb-4" style="color: orange; font-style:italic;">Please Login to continue.</h4>
        <!-- Line to display error message -->
        <?php if(isset($_SESSION['login_error'])){ ?>
            <p class='text-danger text-center'><?php echo $_SESSION['login_error']; ?></p>
            <?php unset($_SESSION['login_error']); ?>
        <?php } ?>

    <!-- Setting action as $_SERVER['PHP_SELF'] means that this same page is used also as action page -->
	<form class="login-form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
    <div class="form-group">
        <label for="username" class="text-uppercase">Username</label>
        <input type="text" class="form-control" name="username" id="username" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username']; ?>">

    </div>
    <div class="form-group">
        <label for="password" class="text-uppercase">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="">
    </div>
        <button type="submit" name="btn-login" class="btn btn-login float-left btn-primary">Submit</button>
    </form>
    <div class="copy-text float-right"><a href="#">Forgot Password</a></div>
    </div>
    
	<div class="col-md-8 banner-sec">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                 <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                <img class="d-block img-fluid" src="images/sw4.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                <img class="d-block img-fluid" src="images/sw2.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                <img class="d-block img-fluid" src="images/sw3.jpg" alt="First slide">
                </div>
            </div>	   
		    
		</div>
	</div>
</div>
</section>




<br><br><br><br>
<?php require_once "includes/footer.php"; ?>