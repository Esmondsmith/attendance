<?php 
$title = "View Record";

require_once "includes/header.php"; 
require_once "db/crud.php";
require_once 'db/conn.php';

// //To get attendee by id
// if(isset($_GET['id'])){
//     $id = $_GET['id'];
//     $result = $crud->getAttendeeDetails($id);
// } else {
//     echo "<h2 class='text-danger'>Error</h2>";
// }


//To check if the id is not set if(!isset){}.
if(!isset($_GET['my_id'])){
  include 'includes/error_msg.php';;
} else {
    $id = $_GET['my_id'];
    $result = $crud->getAttendeeDetails($id);

?>


<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!-- <link rel="stylesheet" href="css/fontawesome/css/fontawesome.css"> -->

      <div class="container">    
            <div class="row">
                <div class="panel panel-default">
                <div class="panel-heading">  <h4 >Attendee Profile</h4></div>
                  <div class="panel-body">
                <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                <!-- Using ternary operator if/else -->
                <img src="<?php echo empty($result['photo']) ? "images/img1.png" : $result['photo']; ?>" alt="" width="300" height="300">
            
                </div>
                <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8" >
                    <div class="container" >
                      <h3 class="card-title text-primary mb-2"><?php echo  $result['firstname'] . ' ' .  $result['lastname'] ?></h3>
                      <p class="card-subtitle mb-2 text-body-secondary"><b>Date of Birth: </b><?php echo  $result['dob'] ?></p>
                      <p class="card-text"><b>Expertise:</b> <?php echo  $result['expertise_name'] ?></p>
                      
                    </div>
                      <hr>
                    <ul class="container details" >
                      <li><p><span class="glyphicon glyphicon-phone one" style="width:50px;"></span><?php echo  $result['phone'] ?></p></li>
                      <li><p><span class="glyphicon glyphicon-envelope one" style="width:50px;"></span><?php echo  $result['email'] ?></p></li>
                    </ul>
                    <hr>
                    <div class="col-sm-5 col-xs-6 tital " >Date Of Registration: <?php echo  $result['date_registered'] ?></div>
                </div>
          </div>
      </div>
      </div>
                  <a href="viewrecords.php" class="btn btn-info">Back to List</a>
                  <a href="edit.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-warning">Edit</a>
                  <a onclick="return confirm('Do you really want to delete this record?');" href="delete.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-danger">Delete</a>

<?php } ?>




<br><br><br><br>
<?php require_once "includes/footer.php"; ?>