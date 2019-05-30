<?php
    session_start();
    include('inc/header.php');
?>

<div class="index-image"></div>
<section id="homeCover" class="cover-container d-flex p-3 flex-column text-center index-box"> 
    <div class="container">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div class="container mt-5">
                    <h1 class="cover-heading">CLIENT <strong>MANAGER</strong></h1>
                    <p class="lead">A Web Application designed for freelancers and small businesses who need a quick and easy way to manage their clients, projects and invoicing.</p>
                    <p class="lead">
                        <a href="signup.php" class="btn btn-lg btn-secondary">Join Now</a>
                    </p>
                </div>
            </div>
            <div class="col-sm-1"></div>
        </div>
    </div> 
</section>

<?php include('inc/footer.php'); ?>