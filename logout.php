<?php
    session_start();
    include('inc/header.php');

    if(isset($_COOKIE[session_name()])){
        setcookie( session_name(), '', time()-86400, '/' );
    }

    //clear all the session variables
    // session_unset();

    //destroy the session
    session_destroy();
?>

    <div class="row" style="margin-top:100px">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="container jumbotron bg-dark text-light text-center">
                <!-- <h1>Profile Page</h1> -->
                <p class="lead">You've been Logged Out! See you Next time...</p>
                <br>
                <a type="button" class="btn btn-primary" href='index.php'>Home</a>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>

    <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>