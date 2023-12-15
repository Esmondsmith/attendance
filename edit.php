<?php 
$title = "Edit Record";

require_once "includes/header.php"; 
require_once "db/crud.php";
require_once 'db/conn.php';

//This is used to get the select dropdown details
$result = $crud->getExpertise();

//The getAttendeeDetails can also be used here
if(!isset($_GET['id'])){
    include 'includes/error_msg.php';
    header("Location: viewrecords.php");
} else {
    $id = $_GET['id'];
    $attendee = $crud->getAttendeeDetails($id);




?>



<h1 class="text-center text-success">Edit Information</h1>

    <div class="container d-flex justify-content-center"> 
        <form action="editprocess.php" method="post" class="w-50" >
            <!-- this input type of hidden is used to get the user id but without displaying it on the frontend -->
            <input type="hidden" name="hidden_id" value="<?php echo $attendee['attendee_id'] ?>" />
            <div class="form-group">
                <label for="email">First Name</label>
                <input type="text" class="form-control" id="fname" value="<?php echo $attendee['firstname'] ?>" name="firstname">
                <br>
            </div>
            <div class="form-group">
                <label for="email">Last Name</label>
                <input type="text" class="form-control" value="<?php echo $attendee['lastname'] ?>" id="lname" name="lastname">
                <br>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="text" class="form-control" value="<?php echo $attendee['dob'] ?>"  id="dob" name="dob">
                <br>
            </div>
            <div class="form-group">
                <label for="expertise">Area of Expertise</label>
                <select class="form-control" id="expertise" name="expertise">

                <?php while($r = $result->fetch(PDO::FETCH_ASSOC)){ ?>
                    <option value="<?php echo $r['expertise_id'] ?>" <?php if($r['expertise_id'] == $attendee['expertise_id']) echo 'selected' ?>>
                    <?php echo $r['expertise_name'] ?>
                    </option>
                <?php } ?>
                
                </select>
                <br>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" aria-describedby="smalltextemail" value="<?php echo $attendee['email'] ?>" name="email">
                <small class="form-text text-muted" id="smalltextemail">We will not share your email with others</small>   
            </div><br>
            <div class="form-group">
                <label for="email">Number</label>
                <input type="text" class="form-control" id="phone" aria-describedby="smalltextphone" value="<?php echo $attendee['phone'] ?>" name="phone">
                <small class="form-text text-muted" id="smalltextphone">We will not share your number with others</small>
                <br><br>
                <button type="submit" class="btn btn-success btn-lg" name="btn-sub">Save Edit</button>
            </div>
        </form>

<?php } ?>


<!-- This line <?php //if($r['expertise_id'] == $attendee['expertise_id']) echo 'selected' ?>  was used to retain the the selected value from the select dropdown so that is can be seen for editing-->