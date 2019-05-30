<?php
    session_start();
    include('inc/functions.php');

    //connect to database
    include('inc/connection.php');

    

    if( isset( $_POST['add'])){
        //set all variables to empty by default
        $clientname = $clientEmail = $clientPhone = $clientAddress = $clientCompany = $clientNotes = "";

        //check to see if required inputs are empty
        if( !$_POST['clientName'] ) {
            //Generate error
            $nameError = "Please enter a name <br>";
        } else {
            $clientName = validateFormData( $_POST['clientName'] );
        }

        if( !$_POST['clientEmail'] ) {
            $emailError = "Please enter an email <br>";
        } else {
            $clientEmail = validateFormData( $_POST['clientEmail'] );
        }

        //these inputs are optional
        $clientPhone    = validateFormData( $_POST['clientPhone'] );
        $clientAddress  = validateFormData( $_POST['clientAddress'] );
        $clientCompany  = validateFormData( $_POST['clientCompany'] );
        $clientNotes    = validateFormData( $_POST['clientNotes'] );
        $clientUserId   = validateFormData( $_SESSION['loggedInId'] );

        if( $clientName && $clientEmail )
        {
            //create query
            $query = "INSERT INTO clients (name, email, phone, address, company, notes, userId) VALUES ('$clientName', '$clientEmail', '$clientPhone', '$clientAddress', '$clientCompany', '$clientNotes', '$clientUserId');";
            
            //store the result
            $result = mysqli_query($conn, $query);

            if( $result ) {
                //Refresh page with query string
                header('Location: clients.php?alert=success');
            } else {
                //something went wrong
                echo "Error: ". $query ."<br>".mysqli_error($conn);
            }
        }
        
    }

    //close connection
    mysqli_close($conn);

    include('inc/header.php'); 
    
?> 

    <div class="index-image"></div>
    <div class="row addClients-box">
        <div class="col-md"></div>
        <div class="col-md-10">
            <div class="container jumbotron bg-dark text-light text-center">
                <h1>Add Clients</h1>
                <p class="lead">Use this from to add clients</p>
                <form class="form"  method="POST" action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>">
                    <div class="container add-innerbox">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col-md"></div>
                                    <label for="login-name" class="col-md-3 col-form-label">Name</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="clientName" id="login-name" placeholder="Enter name">
                                    </div>
                                    <div class="col-md"></div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md"></div>
                                    <label for="login-email" class="col-md-3 col-form-label">Email</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="clientEmail" id="login-email" placeholder="Enter email">
                                    </div>
                                    <div class="col-md"></div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md"></div>
                                    <label for="login-address" class="col-md-3 col-form-label">Address</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="clientAddress" id="login-address" placeholder="Enter address">
                                    </div>
                                    <div class="col-md"></div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md"></div>
                                    <label for="login-company" class="col-md-3 col-form-label">Company</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="clientCompany" id="login-company" placeholder="Enter company">
                                    </div>
                                    <div class="col-md"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col-md"></div>
                                    <label for="login-phone" class="col-md-3 col-form-label">Phone Number</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="clientPhone" id="login-phone" placeholder="Enter phone">
                                    </div>
                                    <div class="col-md"></div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md"></div>
                                    <label for="login-notes" class="col-md-3 col-form-label">Notes</label>
                                    <div class="col-md-7">
                                        <textarea type="text" rows="5" class="form-control" name="clientNotes" id="login-notes" placeholder="Enter notes"></textarea>
                                    </div>
                                    <div class="col-md"></div>
                                </div>

                                <input type="hidden" name="userId" value="<?php $_SESSION['loggedInId']; ?>">
                            </div>
                        </div>
                    </div>

                    <?php if(isset($_POST['login'])){
                        echo $loginError;
                    }
                    ?>
                    <br>
                    <a href="clients.php" class="btn btn-primary">Cancel</a>
                    <input type="submit" name="add" class="btn btn-success" value="Add Client"> 
                </form>
                <!--<hr>
                <p class="lead">Not a member yet? <a class="" href="signup.php">Join Now</a></p> -->
            </div>
        </div>
        <div class="col-md"></div>
    </div>

<?php include('inc/footer.php'); ?>