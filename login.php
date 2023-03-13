<?php 
    include('./connection.php');
    session_start();
    $_SESSION = array();
    if($_SESSION['loggedin']===true){
        header("Location: index.php");
        exit;
    }
    $username = $password = "";
    $username_err = $password_err = $login_err= "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST["username"];
        if (strpos($username,"@")){
            $query = "SELECT * FROM Users WHERE email = ?"; 
        }
        else{
            $query = "SELECT * FROM Users WHERE username = ?"; 
        }
        if ($stm = $conn->prepare($query)){
            $stm->bind_param('s',$_POST["username"]);
            $stm->execute();
            $stm->store_result();
            if($stm->num_rows()>0){
                $stm->bind_result($uid,$username,$fname,$lname,$email,$password);
                $stm->fetch();
                if ($_POST['password'] === $password){
                    session_regenerate_id();
                    $_SESSION['loggedin'] = true;
                    echo $_SESSION['loggedin'];
                    $_SESSION['uid'] = $uid;
                    $_SESSION['username'] = $username;
                    echo $_SESSION['loggedin'];
                    header("Location: index.php");
                }
                else{
                    $login_err  = "Incorrect username/Password";
                }
            }
            else{
                $login_err = "Incorrect username/Password";
            }
            $stm->close();
        }
        else{
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="./css/login.css">
    <title>Login</title>
</head>
<body>
    <?php include('nav.php')?>

    <div class = 'container'>
        <form id = "form" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" onsubmit=" return loginValidate()">
        <input type="text" placeholder="E-mail or Username" name = "username">
        <input type="password" placeholder="Password" name = "password">
        <input type = "submit" value="submit">
    </form>
    </div>

    <?php include('footer.php')?>
</body>
<script src="validate.js"></script>
</html>