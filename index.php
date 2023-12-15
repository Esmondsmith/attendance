
<?php 
$title = "Index";

require_once "includes/header.php"; 
require_once 'db/conn.php';


//To get the expertise
$result = $crud->getExpertise();
?>
    
        <h1 class="text-center text-success">Registration for IT Conference</h1>
        <h3 class="text-center text-danger">Fill all fields</h3><br>

    <div class="container d-flex justify-content-center"> 
        <form action="success.php" method="post" class="w-50" >
            <div class="form-group">
                <label for="email">First Name</label>
                <input type="text" required class="form-control" id="fname" name="firstname">
                <br>
            </div>
            <div class="form-group">
                <label for="email">Last Name</label>
                <input type="text" required class="form-control" id="lname" name="lastname">
                <br>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="text" class="form-control"  id="dob" name="dob">
                <br>
            </div>
            <div class="form-group">
                <label for="expertise">Area of Expertise</label>
                <select class="form-control" id="expertise" name="expertise">

                <?php while($r = $result->fetch(PDO::FETCH_ASSOC)){ ?>
                    <option value="<?php echo $r['expertise_id'] ?>"><?php echo $r['expertise_name'] ?></option>
                <?php } ?>
                
                </select>
                <br>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" required id="email" aria-describedby="smalltextemail" name="email">
                <small class="form-text text-muted" id="smalltextemail">We will not share your email with others</small>   
            </div><br>
            <div class="form-group">
                <label for="email">Number</label>
                <input type="text" class="form-control" id="phone" aria-describedby="smalltextphone" name="phone">
                <small class="form-text text-muted" id="smalltextphone">We will not share your number with others</small>
                <br><br>
                <button type="submit" class="btn btn-success btn-lg" name="btn-sub">Register</button>
            </div>
        </form>
    </div>
    <br><br><br><br>
<?php require_once "includes/footer.php"; ?>