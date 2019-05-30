<?php
    session_start();

    //If user is not logged in 
    if( !$_SESSION['loggedInUser'] ) {
        //redirect to login page
        header('Location: login.php');
    }

    $clientId = $_GET['id'];

    include('inc/connection.php');
    include('inc/functions.php');

    $query = "SELECT * FROM clients WHERE id = '$clientId'";
    $result = mysqli_query($conn, $query);

    if( mysqli_num_rows( $result ) > 0 ) {
        while( $row = mysqli_fetch_assoc( $result ) ) {
            $clientName     = $row['name'];
            $clientEmail    = $row['email'];
            $clientPhone    = $row['phone'];
            $clientAddress  = $row['address'];
            $clientCompany  = $row['company'];
            $clientNotes    = $row['notes'];
        }
    }

    else {
        $alertMessage = "<div class='alert alert-warning'>Nothing to see here. <a href='clients.php'>Head back</a></div>";
    }

    if( isset( $_POST['update'] ) ) {

        $clientName     = validateFormData( $_POST['clientName'] );
        $clientEmail    = validateFormData( $_POST['clientEmail'] );
        $clientPhone    = validateFormData( $_POST['clientPhone'] );
        $clientAddress  = validateFormData( $_POST['clientAddress'] );
        $clientCompany  = validateFormData( $_POST['clientCompany'] );
        $clientNotes    = validateFormData( $_POST['clientNotes'] );

        $query = "UPDATE clients 
            SET 
                name = '$clientName', 
                email = '$clientEmail', 
                phone = '$clientPhone', 
                address = '$clientAddress', 
                company = '$clientCompany', 
                notes = '$clientNotes' 
            WHERE id = '$clientId';";

        $result = mysqli_query( $conn, $query );
        
        if( $result ) {
            header( 'Location: clients.php?alert=updateSuccess' );
        }
        else {
            echo "Error updating record: " . mysqli_error( $conn );
        }
    }

    if( isset( $_POST['delete'] ) ) {
        
        $query = "DELETE FROM clients WHERE id = '$clientId'";
        $result = mysqli_query( $conn, $query );

        if( $result ) {
            //redirect to clients page
            header('Location: clients.php?alert=deleted');
        } else {
            echo "Error deleting record: " . mysqli_error( $conn );
        }

    }

    //Close The Connection
    mysqli_close($conn);

    include('inc/header.php');
?>

<div class="index-image"></div>
<div class="row addClients-box">
        <div class="col-md"></div>
        <div class="col-md-10">
            <div class="container jumbotron bg-dark text-light text-center">
                <h1>Edit Clients</h1>
                <p class="lead">Use this from to edit or delete client</p>
                
                <form class="form"  method="POST" action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>?id=<?php echo $clientId; ?>">
                    <div class="container add-innerbox">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col-md"></div>
                                    <label for="login-name" class="col-md-3 col-form-label">Name</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="clientName" id="login-name" value="<?php echo $clientName; ?>" placeholder="Enter name">
                                    </div>
                                    <div class="col-md"></div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md"></div>
                                    <label for="login-email" class="col-md-3 col-form-label">Email</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="clientEmail" id="login-email" value="<?php echo $clientEmail; ?>" placeholder="Enter email">
                                    </div>
                                    <div class="col-md"></div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md"></div>
                                    <label for="login-address" class="col-md-3 col-form-label">Address</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="clientAddress" id="login-address" value="<?php echo $clientAddress; ?>" placeholder="Enter address">
                                    </div>
                                    <div class="col-md"></div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md"></div>
                                    <label for="login-company" class="col-md-3 col-form-label">Company</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="clientCompany" id="login-company" value="<?php echo $clientCompany;?> " placeholder="Enter company">
                                    </div>
                                    <div class="col-md"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col-md"></div>
                                    <label for="login-phone" class="col-md-3 col-form-label">Phone Number</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="clientPhone" id="login-phone" value="<?php echo $clientPhone; ?>" placeholder="Enter phone">
                                    </div>
                                    <div class="col-md"></div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md"></div>
                                    <label for="login-notes" class="col-md-3 col-form-label">Notes</label>
                                    <div class="col-md-7">
                                        <textarea type="text" rows="5" class="form-control" name="clientNotes" id="login-notes" placeholder="Enter notes"><?php echo $clientNotes; ?></textarea>
                                    </div>
                                    <div class="col-md"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if(isset($_POST['login'])){
                        echo $loginError;
                    }
                    ?>
                    <br><br>
                    <div class="row">
                        <div class="col-md"></div>
                        <div class="col-md-10 d-flex">
                            <!-- <hr> -->
                            <input type="button" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger p-2 mr-auto" value="Delete"> 

                            <!-- <div class="p-2 ml-auto"> -->
                                <a href="clients.php" class="btn btn-primary p-2 ml-auto">Cancel</a>
                                <input type="submit" name="update" class="btn btn-success p-2 ml-1" value="Update"> 
                            <!-- </div> -->
                        </div>
                        <div class="col-md"></div>
                    </div>

                </form>
            </div>
        </div>
        <div class="col-md"></div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header text-light">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Client</h5>
                    <button type="button" class="close btn btn-secondary" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-light text-dark">
                    <p>Are you sure you want to delete?</p>
                    <br>
                </div>
                <div class="modal-footer bg-secondary">
                        <input type="submit" name="delete" class="btn btn-danger btn-sm" value="Yes">
                        <a type="button" class="btn btn-primary bg-dark text-light btn-sm" data-dismiss="modal" >No</a>
                </div>
            </div>
        </div>
    </div>

<?php include('inc/footer.php'); ?>