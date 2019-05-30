<?php
    session_start();
    //Connect to Database
    include('inc/connection.php');

    //Check Submit
    if(isset($_POST['signup'])){

        $formEmail = $_POST['email'];
        $formUser = $_POST['username'];
        $formPass = $_POST['password'];

        //Encrypt Password
        $hashedPassword = password_hash( "$formPass", PASSWORD_DEFAULT );

        //Create Query
        $query = "INSERT INTO users (email, username, password) VALUES ('$formEmail', '$formUser', '$hashedPassword');";

        if(mysqli_query($conn, $query)){
            echo "<div class='alert alert-success'>Congratulations! Account Created Successfully</div>";
            header('Location: login.php');
        }
        else{
            echo "<div class='alert alert-danger'>ERROR:".mysqli_error($conn);"</div>";
        }
        
    }
    mysqli_close($conn);

    include('inc/header.php');
?>

<div class="signup-image"></div>
<div class="row signup-box">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="container jumbotron bg-dark text-light text-center">
            <h1>Signup</h1>
            <p class="lead">Use this from to Signup for Free</p>
            <form class="form"  method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-group row">
                    <div class="col-md-2"></div>
                    <label for="login-email" class="col-md-2 col-form-label">Email</label>
                    <div class="col-md">
                        <input type="email" class="form-control" name="email" id="login-email" placeholder="Enter Email">
                    </div>
                    <div class="col-md-2"></div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2"></div>
                    <label for="login-username" class="col-md-2 col-form-label">Username</label>
                    <div class="col-md">
                        <input type="text" class="form-control" name="username" id="login-username" placeholder="Enter Username">
                    </div>
                    <div class="col-md-2"></div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2"></div>
                    <label for="login-password" class="col-md-2 col-form-label">Password</label>
                    <div class="col-md">
                    <input type="password" class="form-control" id="login-password" name="password" placeholder="Enter Password">
                    </div>
                    <div class="col-md-2"></div>
                </div>

                <?php if(isset($_POST['login'])){
                    echo $loginError;
                }
                ?>

                <input type="submit" name="signup" class="btn btn-primary" value="Signup"> 
            </form>
            <hr>
            <p class="lead">Already have an Account? <a class="text-primary" href="login.php"><strong>Login</strong></a></p>
        </div>
    </div>
    <div class="col-md-3 hidden"></div>
</div>

<?php include('inc/footer.php'); ?>