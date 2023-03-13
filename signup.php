<?php
    include('./connection.php');
    session_start();

    $_SESSION = array();
    if($_SESSION['loggedin']==true){
        header("Location: index.php");
    }
    $username = $password = "";
    $signup_err = "";
    $username_err = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $query = "SELECT * FROM Users WHERE email = ? or username =?";
        if ($stm = $conn->prepare($query)){
            $stm->bind_param('ss',$_POST["email"],$_POST["username"]);
            $stm->execute();
            $stm->store_result();
            if($stm->num_rows()>=1){
                $login_err = "Error email/username already in use";
            }
            else{
                $query = "INSERT INTO Users(username,FirstName,LastName,email,password) Values(?,?,?,?,?)";
                if($stmt = $conn->prepare($query)){
                    $stmt->bind_param('sssss',$_POST['username'],$_POST['fname'],$_POST['lname'],$_POST['email'],$_POST['password']);
                    $stmt->execute();
                    header("Location:index.php");
                }
                $stmt->close();
            }
            $stm->close();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel = "stylesheet" href  = "./css/signup.css">
</head>
<body>
    <?php include('nav.php')?>
    <div class="container">
        <label><?php echo $login_err?></label>
            <form id = "form" action = "<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" onsubmit="return signupValidate()">
                <input type="text" placeholder="Username" name="username" required>
                <div class="name-container">
                    <input type="text" id= "fname" placeholder="FirstName" name="fname">
                    <input type="text" id = "lname" placeholder="Last Name" name = "lname">
                </div>
                <input type="email" placeholder="E-mail" name = "email" required>
                <input type="password" placeholder="Password" name = "password" required>
                <input type = "submit" value="Submit">
            </form>
    </div>
    <?php include('footer.php')?>
</body>
<script src="validate.js"></script>
</html>