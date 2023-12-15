<?php 
//This is the action page for editing
require_once "db/crud.php";
require_once "db/conn.php";


if(isset($_POST['btn-sub'])){
//extracting values from the post array
    $id = $_POST['hidden_id'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $expertise = $_POST['expertise'];

    $edited = $crud->editAttendee($id, $fname, $lname, $dob, $email, $phone, $expertise);

    if($edited){
        header("Location: viewrecords.php");
    } else {
        include 'includes/error_msg.php';
        header("Location: viewrecords.php");
    }

} else {

}

?>