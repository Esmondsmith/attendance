<?php
//This is the Class file

    class Crud{
        private $db;

        function __construct($conn){
            $this->db = $conn;
        }

        //Function to insert/create
        public function insert($fname, $lname, $dob, $email, $phone, $expertise, $photo){
            try {
                $sql = "INSERT INTO attendee (firstname, lastname, dob, email, phone, expertise_id, photo) VALUES (:fname, :lname, :dob, :email, :phone, :expertise, :photo)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':phone',$phone);
                $stmt->bindparam(':expertise',$expertise);
                $stmt->bindparam(':photo',$photo);

                $stmt->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        } 

        //function to read
        public function getAllAttendees(){
            try {
                $sql = "SELECT * FROM attendee x INNER JOIN expertise y ON x.expertise_id = y.expertise_id";
                $result = $this->db->query($sql);
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }


        //Because expertise is from another table, we do an INNER JOIN
        public function getAttendeeDetails($id){
            try {
                $sql = "SELECT * FROM attendee x INNER JOIN expertise y ON x.expertise_id = y.expertise_id WHERE attendee_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }


        public function getExpertise(){
            try {
                $sql = "SELECT * FROM expertise";
                $result = $this->db->query($sql);
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        //function to edit
        public function editAttendee($id, $fname, $lname, $dob, $email, $phone, $expertise){
            try {

                $sql = "UPDATE `attendee` SET `firstname`= :fname,`lastname`= :lname,`dob`= :dob,`email`=:email,`phone`=:phone,`expertise_id`=:expertise WHERE attendee_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':phone',$phone);
                $stmt->bindparam(':expertise',$expertise);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }


        //function to delete
        public function deleteAttendee($id){
            try {
                $sql = "DELETE FROM attendee WHERE attendee_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }

    }



?>