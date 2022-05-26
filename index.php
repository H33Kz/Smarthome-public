<?php
    session_start();

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
        header('Location:userpanel.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smarthome - Log in</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/png" href="favicon.png">
</head>

<body>

<section>
    <div class="img"></div>
    <form form action="login.php" method="post" class=" col col-lg-5 col-md-7 col-sm-8 col-10 shadow-lg bg-white p-5 text-center">
        <h1 class="mb-5"><p class="text-decoration-underline">Log in to your system</p></h1>
        <input type="text" class="form-control form-control-lg my-4" name="login" placeholder="Username">
        <input type="password" class="form-control form-control-lg" name="password" placeholder="Password">
        <br>
        <?php
            if(isset($_SESSION['error']))
                echo $_SESSION['error'];
        ?>
        <button class="btn btn-lg mt-4 mb-4 text-white text-uppercase rounded-0" type="submit">Login</button>
        <input type="checkbox" class="form-check-input" id="check">
        <label class="form-check-label" for="check">Remember me</label>
    </form>
</section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" 
            integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
            crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.js"></script>
    
</body>
</html>