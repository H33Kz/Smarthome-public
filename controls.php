<?php
    session_start();
    
    //Sprawdź flagę zalogowania
    If(!isset($_SESSION['loggedin'])){
        header('Location: index.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="dashboard_style.css">
    <link rel="shortcut icon" type="image/png" href="favicon.png">
    <title>Controls</title>
</head>
<body>
    
<div class="sidebar">
        <div class="sidebar-brand">
            <h1><a href="userpanel.php"><img class="img" src="https://puu.sh/Im5Rd/506e4631da.png"></a></h1>
        </div>
        <img class="whitebar-line" src="whitebar.png">
        <div class="sidebar-menu">
            <ul>
                <li><a href="tempgraph.php"><img class="sidebaricon" src="https://puu.sh/Im2pg/1699a1b89e.png"><span>Temperature</span></a></li>
            </ul>
            <ul>
                <li><a href="humigraph.php"><img class="sidebaricon" src="https://puu.sh/Im35b/2945fe3e3b.png"><span>Humidity</span></a></li>
            </ul>
            <ul>
                <li><a href="controls.php" class="active"><img class="sidebaricon" src="https://puu.sh/Im3A8/4fe19452d0.png"><span>Controls</span></a></li>
            </ul>
            <ul>
                <li><a href="alerts.php"><img class="sidebaricon" src="https://puu.sh/Imugx/f7736adf7d.png"><span>Alerts</span></a></li>
            </ul>
            <ul>
                <li><a href="user.php"><img class="sidebaricon" src="https://puu.sh/Im35j/00932d1d2f.png"><span>User</span></a></li>
            </ul>
            <ul>
                <li><a href="contact.php"><img class="sidebaricon" src="https://puu.sh/Im3dL/0de59df947.png"><span>Contact</span></a></li>
            </ul>
            <ul>
                <li><a href="logout.php"><img class="sidebaricon" src="https://puu.sh/Im44k/9ea019f209.png"><span>Log out</span></a></li>
            </ul>
        </div>
</div>
    <div class="main-content">
    <center>
        <br><br><br><br><br><br><br><br><br><br><br>
        <div class="container">
            <span
            <div class="row">
              <div class="col-sm">
                <h2>Door</h2>
        <form action="" method="POST">
        <input type="submit" class="doorsopen" name="dooropen" value="Open">
        </form>
        <form action="" method="POST">
        <input type="submit" class="doorsclosed" name="doorclose" value="Close">
        </form>
              </div>
              <div class="col-sm">
                <h2>Light1</h2>
                <form action="" method="POST">
                <input type="submit" class="led1on" name="led_on_1" value="On">
                </form>
                <form action="" method="POST">
                <input type="submit" class="led1off" name="led_off_1" value="Off">
                </form>
              </div>
              <div class="col-sm">
                <h2>Light2</h2>
                <form action="" method="POST">
                <input type="submit" class="led1on" name="led_on_2" value="On">
                </form>
                <form action="" method="POST">
                <input type="submit" class="led1off" name="led_off_2" value="Off">
                </form>
              </div>
            </div>
          </div>
    </center>
</body>
</html>

<?php
$user_id = $_SESSION['id'];
require_once "sql_connect.php"; 
$connect = @mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!$connect){
	echo "Error: " . mysqli_connect_error();
	exit();
}

else
{
    if(isset($_POST['dooropen']))
    {
        $dooropen = "UPDATE `controlTable` SET door=1 WHERE user_id=('$user_id')";
        $result = mysqli_query($connect,$dooropen);
    }

    if(isset($_POST['doorclose']))
    {
        $doorclose = "UPDATE `controlTable` SET door=0 WHERE user_id=('$user_id')"; 
        $result = mysqli_query($connect,$doorclose);
    }

    if(isset($_POST['led_on_1']))
    {
        $led1on = "UPDATE `controlTable` SET led1=1 WHERE user_id=('$user_id')"; 
        $result = mysqli_query($connect,$led1on);
    }

    if(isset($_POST['led_off_1']))
    {
        $led1off = "UPDATE `controlTable` SET led1=0 WHERE user_id=('$user_id')"; 
        $result = mysqli_query($connect,$led1off);
    }

    if(isset($_POST['led_on_2']))
    {
        $led2on = "UPDATE `controlTable` SET led2=1 WHERE user_id=('$user_id')"; 
        $result = mysqli_query($connect,$led2on);
    }

    if(isset($_POST['led_off_2']))
    {
        $led2off = "UPDATE `controlTable` SET led2=0 WHERE user_id=('$user_id')"; 
        $result = mysqli_query($connect,$led2off);
    }
}
?>