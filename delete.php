<?php 
require_once "includes/authcheck.php";

require_once "db/crud.php";
require_once 'db/conn.php';


//The can also be used here
if(!isset($_GET['id'])){
    include 'includes/error_msg.php';
    header("Location: viewrecords.php");

} else {
    $id = $_GET['id'];
    $result = $crud->deleteAttendee($id);

    if($result){
        header("Location: viewrecords.php");
    } else {
        include 'includes/error_msg.php';
    }
}



?>