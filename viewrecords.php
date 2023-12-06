<?php 
$title = "Attendees Records";

require_once "includes/header.php"; 
require_once "db/crud.php";
require_once 'db/conn.php';

//To get all attendees
$result = $crud->getAttendees();
?>

<h2>Details of Attendees</h2>
<table class="table">

    <tr>
        <th>S/N</th>
        <th>First Name</th>
        <th>Last Name</th>
        <!-- <th>Date of Birth</th>
        <th>Email</th>
        <th>Phone</th> -->
        <th>Expertise</th>
        <th>Actions</th>
    </tr>
        <!-- <?php //$num = 1; ?> -->
        <?php while($r = $result->fetch(PDO::FETCH_ASSOC)){ ?>
            <tr>
            <!-- <td><?php //echo $num++; ?></td> -->

                <td> <?php echo $r['attendee_id'] ?> </td>
                <td> <?php echo $r['firstname'] ?> </td>
                <td> <?php echo $r['lastname'] ?> </td>
                <!-- <td> <?php //echo $r['dob'] ?> </td>
                <td> <?php //echo $r['email'] ?> </td>
                <td> <?php //echo $r['phone'] ?> </td> -->
                <td> <?php echo $r['expertise_name'] ?> </td>
                <td> <a href="view.php" class="btn btn-primary">View more details</a></td>
            </tr>

        <?php } ?>

</table>




<br><br><br><br>
<?php require_once "includes/footer.php"; ?>