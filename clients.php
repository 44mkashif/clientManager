<?php
    session_start();

    //If user is not logged in 
    if( !$_SESSION['loggedInUser'] ) {
        //redirect to login page
        header('Location: login.php');
    }

    include('inc/connection.php');
    
    $userId = $_SESSION['loggedInId'];
    $query = "SELECT * FROM clients WHERE userId = '$userId';";
    $result = mysqli_query($conn, $query);

    //check for query string
    if( isset( $_GET['alert'] ) ) {
        //new client added
        if( $_GET['alert'] == 'success' ) {
            $alertMessage = "<div class='alert alert-success'>New client added!<button type='button' class='close'>
            <span data-dismiss='alert' aria-hidden='true'>&times;</span></button></div>";
        } 
        //Client updated
        elseif ( $_GET['alert'] == 'updateSuccess') {
            $alertMessage = "<div class='alert alert-success'>Client updated!<button type='button' class='close'>
            <span data-dismiss='alert' aria-hidden='true'>&times;</span></button></div>";
        }
        //Client deleted
        elseif ( $_GET['alert'] == 'deleted') {
            $alertMessage = "<div class='alert alert-danger'>Client deleted<button type='button' class='close'>
            <span data-dismiss='alert' aria-hidden='true'>&times;</span></button></div>";
        }

    } else 

    //Close The Connection
    mysqli_close($conn);

    include('inc/header.php');
?>

<div class="container mt-5">
    <h1>Clients Address Book</h1>
    <?php
        if( isset( $_GET['alert'] ) ) {
            echo $alertMessage; 
        }
    ?>
    <table class="table table-striped table-bordered">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Company</th>
            <th>Notes</th>
            <th>Edit</th>
        </tr>

        <?php
            if( mysqli_num_rows( $result ) > 0 ) {

                //Output the data
                while( $row = mysqli_fetch_assoc( $result ) ) {
                    echo "<tr>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>".$row['phone']."</td>";
                    echo "<td>".$row['address']."</td>";
                    echo "<td>".$row['company']."</td>";
                    echo "<td>".$row['notes']."</td>";
                    echo '<td><a href="edit.php?id='.$row['id'] . '" type="button" class="btn btn-defualt btn-sm border-0 rounded" >
                        <i class="fas fa-edit"></i>
                        </a></td>';
                    echo "</tr>";
                }

            } else {
                //if no entries
                echo "<div class='alert alert-warning'>You've no clients!<button type='button' class='close'>
                <span data-dismiss='alert' aria-hidden='true'>&times;</span></button></div>";
            }
        ?>

        <tr>
            <td colspan="7">
                <div class="text-center">
                <?php
                echo "<a href='addClients.php?id=".$_SESSION['loggedInId'] . "' class='btn btn-success btn-sm'>
                        <i class='fas fa-user-plus'></i> Add Client
                     </a>"
                ?>
                </div>
            </td>            
        </tr>

    </table>

    <?php include('inc/footer.php'); ?>
</div>