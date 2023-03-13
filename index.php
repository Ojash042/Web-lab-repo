<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Home</title>
</head>
<body>
    <div class="container">
        <?php include('./nav.php')?>
        <div class="inner-container">
            <section id = "welcome">
                <label id  ="welcome-text">Welcome
                <?php if ($_SESSION["loggedin"] === true){echo $_SESSION['username'];}?> </label>
            <img src="https://cdn-icons-png.flaticon.com/512/1077/1077114.png" height="90px" width="90px">
            </section>
            <form id = "search-tab" onsubmit="return search()">
                <input  type ="text" id = "searchbar"
                <?php if(!($_SESSION["loggedin"])){
                    echo "placeholder = 'Login to Search'";    
                } 
                else{
                    echo "placeholder='Search'"; 
                }?>
                <?php if(!($_SESSION['loggedin'])) echo "disabled"?>>
                <input type="submit" value="Submit">
            </form>
        </div>
        
        <div id = "search-results">
        </div>
    <?php include('./footer.php')?>
    </div>
</body>
<script src="./ajax.js"></script>
</html>