<?php 
$title = "Attendees Records";

require_once "includes/header.php"; 

require_once "db/crud.php";
require_once 'db/conn.php';



//To get all attendees
$result = $crud->getAllAttendees();
?>

<h2 class="text-center my-4">All Registered Attendees</h2>
<table class="table">

    <tr>
        <th>S/N</th>
        <th>First Name</th>
        <th>Last Name</th>
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
                <td> <?php echo $r['expertise_name'] ?> </td>
                <!--Here, we create a query string to get the id. This id is what we will use to get it from the other page-->
                <td> 
                    <a href="view.php?my_id=<?php echo $r['attendee_id'] ?>" class="btn btn-primary">More details</a>
                    <a href="edit.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-warning">Edit</a>
                    <a onclick="return confirm('Do you really want to delete this record?');" href="delete.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>

        <?php } ?>

</table>




<br><br><br><br>
<?php require_once "includes/footer.php"; ?>