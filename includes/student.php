
<?php
require_once "database.php";
//require_once "sessions.php";

class Student{

    public function find_by_sql($sql=""){

        global $database;

        $result_set = $database->query($sql);

        return $result_set;

    }


    public function find_all(){

        $result_set = $this->find_by_sql("SELECT * FROM `registeredstudent`");

        return $result_set;

    }

    public function find_by_Id($Id){

        $result_set = $this->find_by_sql("SELECT * FROM `registeredstudent`  where nic='$Id' ");

        return $result_set;

    }
    // public function find_by_id($id=0){

    //     global $database;

    //     $result_set = $this->find_by_sql("SELECT * FROM users WHERE id='$id'");

    //     $found = $database->fetch_assoc($result_set);

    //     return $found;

    // }

    public function student_authenticate($username, $password)
    {
        global $database;

        $stmt = $database->connection->prepare("SELECT * FROM `registeredstudent` WHERE `username` = ? AND `password` = ?");

        $stmt->bind_param('ss', $username, $password);

        if($stmt->execute()){

            $result = $stmt->get_result();

            return $result;
        }

    }


    public function check_student($nic,$username)
    {
        global $database;

        $stmt = $database->connection->prepare("SELECT * FROM `registeredstudent` WHERE `nic` = ? AND `username` = ?");

        $stmt->bind_param('ss',$nic, $username);

        if($stmt->execute()){

            $result = $stmt->get_result();

            return $result;
        }
    }

    public function student_register($nic,$fname,$lname,$Mobile,$Gender,$Address ,$Occupation,$email ,$username,$password)
    {
         global $database;
         
         //$enc_password = md5($password);

        $stmt = $database->connection->prepare("INSERT INTO `registeredstudent` ('nic','fname','lname','Mobile','Gender','Address' ,'Occupation','email' ,'username','password') VALUES (?,?,?,?,?,?,?,?,?,?)");

        $stmt->bind_param('sssssssss', $nic,$fname,$lname,$Mobile,$Gender,$Address ,$Occupation,$email ,$username,$password);

        if($stmt->execute()){

            $stmt->close(); 

            return true;
            
        }

    }

    public function delete_student($nic)
    {
         global $database;
         
         //$enc_password = md5($password);

        $stmt = $database->connection->prepare("DELETE FROM `registeredstudent` (`nic`) VALUES (?)");

        $stmt->bind_param('s', $nic);

        if($stmt->execute()){

            $stmt->close(); 

            return true;
            
        }

    }

    public function student_update($s_id,$nic,$fname,$lname,$Mobile,$Gender,$Address ,$Occupation,$email ,$username,$password)
    {
         global $database;
         
        $stmt = $database->connection->prepare("UPDATE `registeredstudent` SET nic = ?, fname = ?, lname = ?,Mobile = ? ,Gender = ?, Address = ?, Occupation = ?, email = ?, username = ?, password = ? WHERE  nic = ?");

        $stmt->bind_param('sssssssssss', $nic,$fname,$lname,$Mobile,$Gender,$Address ,$Occupation,$email ,$username,$password,$s_id);

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
