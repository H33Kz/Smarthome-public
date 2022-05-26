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
    <title>Userpanel</title>
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
                <li><a href="controls.php"><img class="sidebaricon" src="https://puu.sh/Im3A8/4fe19452d0.png"><span>Controls</span></a></li>
            </ul>
            <ul>
                <li><a href="alerts.php"><img class="sidebaricon" src="https://puu.sh/Imugx/f7736adf7d.png"><span>Alerts</span></a></li>
            </ul>
            <ul>
                <li><a href="user.php"><img class="sidebaricon" src="https://puu.sh/Im35j/00932d1d2f.png"><span>User</span></a></li>
            </ul>
            <ul>
                <li><a href="contact.php" class="active"><img class="sidebaricon" src="https://puu.sh/Im3dL/0de59df947.png"><span>Contact</span></a></li>
            </ul>
            <ul>
                <li><a href="logout.php"><img class="sidebaricon" src="https://puu.sh/Im44k/9ea019f209.png"><span>Log out</span></a></li>
            </ul>
        </div>
</div>
    <div class="main-content">
        <center>
            <b>
                Cretors of this site:
            </b>
        </center>
        
        <table class="table">
            <thead>
                <tr>
                <th scope="col">First name</th>
                <th scope="col">Last name</th>
                <th scope="col">e-mail</th>
                <th scope="col">github</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>Piotr</td>
                <td>Snarski</td>
                <td>piotrek.snarski@gmail.com</td>
                <td><a href="https://github.com/H33Kz" target="_blank" rel="noopener noreferrer">github.com/H33Kz</a></td>
                </tr>
                <tr>
                <td>Łukasz</td>
                <td>Szołtysik</td>
                <td>lukasz.szoltysik@podlesie.net</td>
                <td><a href="https://github.com/BlanC2137" target="_blank" rel="noopener noreferrer">github.com/BlanC2137</a></td>
                </tr>
                <tr>
                <td>Adam</td>
                <td>Szydło</td>
                <td>adam@clubpenguin.com</td>
                <td><a href="https://github.com/AsBlade" target="_blank" rel="noopener noreferrer">github.com/AsBlade</a></td>
                </tr>
            </tbody>
            </table>
        <h1>
            <label for="">
                <span></span>
            </label>
        </h1>
</body>
</html>