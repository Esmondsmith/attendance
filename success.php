<?php 
//This is the action page

$title = "Success";

require_once "includes/header.php"; 
require_once "db/crud.php";
require_once "db/conn.php";


if(isset($_POST['btn-sub'])){

    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $expertise = $_POST['expertise'];

    //["photo"]["name"] photo is the file name while tmp_name is a php function for temporary file name.
    $original_file = $_FILES["photo"]["tmp_name"];
    $ext = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
    $photo_dir = "uploads/"; 
    $destination = $photo_dir . $phone . ".".$ext;
    move_uploaded_file($original_file,$destination);

    $isSuccess = $crud->insert($fname, $lname, $dob, $email, $phone, $expertise, $destination);

    if($isSuccess){
    } else {
      include 'includes/error_msg.php';
    }
}

?>

<h1 class="text-center text-info">YOU HAVE BEEN REGISTERED SUCCESSFULLY</h1>

<!-- This was $_GET method
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php //echo $_GET['firstname'] . ' ' . $_GET['lastname'] ?></h5>
    <h6 class="card-subtitle mb-2 text-body-secondary"><?php //echo $_GET['dob'] ?></h6>
    <p class="card-text"><b>Expertise:</b> <?php //echo $_GET['expertise'] ?></p>
    <p class="card-text"><b>Email:</b> <?php //echo $_GET['email'] ?></p>
    <p class="card-text"><b>Phone:</b> <?php //echo $_GET['phone'] ?></p>
    <a href="#" class="card-link">Read More</a>
    <a href="#" class="card-link">Visit Site</a>
  </div>
</div> -->
<img src="<?php echo $destination ?>" alt="" width="300" height="300">
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $_POST['firstname'] . ' ' . $_POST['lastname'] ?></h5>
    <h6 class="card-subtitle mb-2 text-body-secondary"><?php echo $_POST['dob'] ?></h6>
    <p class="card-text"><b>Expertise:</b> <?php echo $_POST['expertise'] ?></p>
    <p class="card-text"><b>Email:</b> <?php echo $_POST['email'] ?></p>
    <p class="card-text"><b>Phone:</b> <?php echo $_POST['phone'] ?></p>
    <a href="viewrecords.php" class="card-link">View List</a>
  </div>
</div>

<br><br><br><br>
<?php require_once "includes/footer.php"; ?>

