<?php
//This is the Class file

    class Crud{
        private $db;

        function __construct($conn){
            $this->db = $conn;
        }

        //Function to insert/create
        public function insert($fname, $lname, $dob, $email, $phone, $expertise){
            try {
                $sql = "INSERT INTO attendee (firstname, lastname, dob, email, phone, expertise_id) VALUES (:fname, :lname, :dob, :email, :phone, :expertise)";
                $stmt = $this->db->prepare($sql);
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

        //function to read
        public function getAttendees(){
            $sql = "SELECT * FROM attendee x INNER JOIN expertise y ON x.expertise_id = y.expertise_id";
            $result = $this->db->query($sql);
            return $result;
        }

        public function getAttendeeDetails($id){
            $sql = "SELECT * FROM attendee x INNER JOIN expertise y ON x.expertise_id = y.expertise_id WHERE attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        }

        public function getExpertise(){
            $sql = "SELECT * FROM expertise";
            $result = $this->db->query($sql);
            return $result;
        }

      

    }



?>