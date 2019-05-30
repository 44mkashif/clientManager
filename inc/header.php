<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Client Address Book</title>
</head>
<body>
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">CLIENT<strong>MANAGER</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <?php 
                if( $_SESSION != NULL ) { ?>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="clients.php">My Clients <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="addClients.php">Add Client</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                        <p class="nav-link" href="#">Hi, <?php if( !$_SESSION['loggedInUser'] ){ echo 'Guest'; } else { echo $_SESSION['loggedInUser']; }?></p>
                    <li class="nav-item pull-right">
                        <a class="nav-link" href="logout.php">Log out</a>
                    </li>
                </ul>
            <?php 
                } else {
            ?>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item pull-right">
                        <a class="nav-link" href="login.php">Log in</a>
                    </li>
                    <li class="nav-item pull-right">
                        <a class="nav-link" href="signup.php">Sign up</a>
                    </li>
                </ul>
            <?php
                }
            ?>

        </div>
    </nav>