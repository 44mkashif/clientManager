<?php
    session_start();
    include('inc/functions.php');

    //connect to database
    include('inc/connection.php');

    //If user is logged in 
    if( $_SESSION ) {
        //redirect to clietns page
        header('Location: clients.php');
    }
    

    if( isset( $_POST['login'])){

        $formEmail = validateFormData( $_POST['email']);
        $formPass = validateFormData( $_POST['password']);

        //create query
        $query = "SELECT username, password, id FROM users WHERE email = '$formEmail';";

        //store the result
        $result = mysqli_query($conn, $query);

        //verify if result is returned
        if(mysqli_num_rows($result) > 0)
        {
            while ( $row = mysqli_fetch_assoc( $result )) {
                $name = $row['username'];
                $id = $row['id'];
                $hashedPass = $row['password'];
            }

            //Verify hashed password with the submitted password
            if( password_verify($formPass, $hashedPass) ) {
                //Correct login details
                //Store data in session variables
                $_SESSION['loggedInUser'] = $name;
                $_SESSION['loggedInEmail'] = $formEmail;
                $_SESSION['loggedInId'] = $id;

                //redirect user to clients page
                header('Location: clients.php');
            }

            else {
                //Incorrect login details
                $loginError = "<div class='alert alert-danger'>Wrong Password. Please Try Again!</div>";
            }

        }

        else {
            //User not found
            $loginError = "<div class='alert alert-danger'>No such user in database. Please Try Again! <a class='close' data-dimdiss='alert'>&times;</a></div>";
        }
    }

    //close connection
    mysqli_close($conn);
    
    include('inc/header.php');

?> 

    <div class="login-image"></div>
    <div class="row index-box" style="margin-top:100px">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="container jumbotron bg-dark text-light text-center">
                <h1>Login</h1>
                <p class="lead">Use this from to log into your Account</p>
                <form class="form"  method="POST" action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>">
                    
                    <div class="form-group row">
                        <div class="col-md-2"></div>
                        <label for="login-email" class="col-md-2 col-form-label">Email</label>
                        <div class="col-md">
                            <input type="text" class="form-control" name="email" <?php if(isset($_POST['login'])) { ?> value=" <?php echo $formEmail; } ?>" id="login-email" placeholder="Enter email">
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

                    <input type="submit" name="login" class="btn btn-primary" value="Login"> 
                </form>
                <hr>
                <p class="lead">Not a member yet? <a class="" href="signup.php">Join Now</a></p>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>

<?php include('inc/footer.php'); ?>