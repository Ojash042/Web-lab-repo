<?php 
    include("./connection.php");
    $query = "SELECT * FROM Users WHERE email=? OR username=? OR FirstName=? OR Lastname=?";
    $val = $_GET["q"];
    if($stmt = $conn->prepare($query)){
        $stmt->bind_param('ssss',$val,$val,$val,$val);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->num_rows()>0){
            $stmt->bind_result($uid,$username,$fname,$lname,$email,$password);
            $stmt->fetch();
            echo $uid."/".$username."/".$fname."/".$lname."/".$email;
        }
        else {
            echo "404";
        }
    }
    $stmt->close();
?>