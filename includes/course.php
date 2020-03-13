
<?php
require_once "database.php";

class Course{


    public function find_by_sql($sql=""){

        global $database;

        $result_set = $database->query($sql);

        return $result_set;

    }


    public function find_all(){

        $result_set = $this->find_by_sql("SELECT * FROM `course`");

        return $result_set;

    }


    public function course_register($Course_Id ,$Course_Name,$Course_description,$Course_duration ,$Course_type ,$Course_fees, $location)
    {
         global $database;

        $stmt = $database->connection->prepare("INSERT INTO `course` (`Course_Id`,`Course_Name`, `Course_description`, `Course_duration`, `Course_type`,`Course_fees`, `location`) VALUES (?,?,?,?,?,?,?)");

        $stmt->bind_param('sssssss', $Course_Id ,$Course_Name,$Course_description,$Course_duration ,$Course_type ,$Course_fees, $location);

        if($stmt->execute()){

            $stmt->close(); 

            return true;
            
        }

    }

    public function course_reg($course_name, $full_name, $email,$password)
    {
         global $database;

        $stmt = $database->connection->prepare("INSERT INTO `courseRegistration` (`course_name`, `full_name`, `email`,`password`) VALUES (?,?,?,?,?,?,?)");

        $stmt->bind_param('ssss',$course_name, $full_name, $email,$password);

        if($stmt->execute()){

            $stmt->close(); 

            return true;
            
        }

    }

    public function check_course($Course_Id)
    {
        global $database;

        $stmt = $database->connection->prepare("SELECT * FROM `course` WHERE `Course_Id` = ?");

        $stmt->bind_param('s',$Course_Id);

        if($stmt->execute()){

            $result = $stmt->get_result();

            return $result;
        }
    }


    public function course_delete($course_id)
    {
         global $database;

        $stmt = $database->connection->prepare("DELETE FROM `course` (`Course_Id`) VALUES (?)");

        $stmt->bind_param('s', $course_id);

        if($stmt->execute()){

            $stmt->close(); 

            return true;
            
        }

    }

    public function course_edit($Course_Id ,$Course_Name,$Course_description,$Course_duration ,$Course_type ,$Course_fees, $location)
    {
         global $database;
         
         //$enc_password = md5($password);

        $stmt = $database->connection->prepare("UPDATE course SET Course_Name = ?,Course_description = ?,Course_duration = ?,Course_type = ?,Course_fees = ?, location = ? WHERE Course_Id = ?");

        $stmt->bind_param('sssssss', $Course_Id ,$Course_Name,$Course_description,$Course_duration ,$Course_type ,$Course_fees, $location) ;

        if($stmt->execute()){

            $stmt->close(); 

            return true;
            
        }

    }
}

// $user = new User();
// $session = new Session();

// $errors = array();

// $result = $user->user_register("omar", "rashid", "omar@mail", "123");

// if($result)
// {
//     echo var_dump($result);
// }

// $found_user = $user->user_authenticate("omar", 123);

// if($found_user)
// {
//     $user_id = "";
//     $username = "";
//     while($results = $found_user->fetch_assoc())
//     {
//         $user_id = $results["id"];
//         $username = $results["username"];
//     }

//     echo $user_id . "<br>";
    
//     echo $username;

//     $session_values = $session->create_session($user_id, $username);

//     if($session_values['id'] && $session_values['username']){
         
//         header('Location: ../index.php');	
//     }else{

//         $errors[] = "wrong username and password";
//     }

// }

?>
