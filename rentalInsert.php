<?php
    include 'dbh.sakila.php'; //php connection 
    include 'index.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>
    </title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <br><h1>
        Sakila Database.
    </h1><br>
    <br><h2>
    Store.
    </h2><br>
    <form method="post" id="form1">
        Rental ID: <input type="text" name="rentid"/><br><br>
        Rental Date: <input type="text" name="rentdate" /><br><br>
        Inventory ID: <input type="text" name="invid"/><br><br>        
        Customer ID: <input type="text" name="custid" /><br><br>
        Return Date: <input type="text" name="return" /><br><br>
        Staff ID: <input type="text" name="staffid"/><br><br>        
        Last Update: <input type="text" name="lastupdate"/><br><br>
        <input type="submit" name="submit" class="button"/>
    </form>
    
   <?php
    //DELETING FUNCTION
    if(isset($_POST['dlt'])=='Delete'){
        if(isset($_GET['rental_id'])){
            $rental_id = ($_GET['rental_id']);
        }
        else{
            echo "<p>Primary key not received.</p>";
        }
        
        $deleteResult = mysqli_query($conn, "DELETE FROM customer WHERE customer_id= $customer_id");
        if($deleteResult){
            echo "<p>Record deleted!</p>";
        }
        else{
            echo "<p>Record has not been deleted.</p>";
        }
    } // DELETE FUNCTION COMPLETE
    else if(isset($_POST['updt'])=='Update'){   //CHOSEN TO UPDATE
        echo "<p>You have chosen to update this record, please fill in the form and click below to update</p>";
        ?>
        <input type="submit" name="dateUp" class="act" value="Update" form="form1"> <!-- new update button -->
        <?php
    }
    else if(isset($_POST['dateUp'])=='Update'){ //SUBMIT NEW UPDATED RECORD
        $rentid = isset($_POST['rentid']) ? $_POST['rentid'] : '';
        $rentdate = isset($_POST['rentdate']) ? $_POST['rentdate'] : '';
        $invid = isset($_POST['invid']) ? $_POST['invid'] : ''; 
        $custid = isset($_POST['custid']) ? $_POST['custid'] : '';
        $return = isset($_POST['return']) ? $_POST['return'] : '';
        $staffid = isset($_POST['staffid']) ? $_POST['staffid'] : '';
        $lastupdate = date('Ymdhis', time());
            
        $sqlUpdate = "UPDATE rental SET rental_id='$rentid', rental_date='$rentdate', inventory_id='$invid', customer_id='$custid', return_date='$return', staff_id='$staffid', last_update='$lastupdate' WHERE rental_id='$rentid'";  //update query
            
        if(mysqli_query($conn, $sqlUpdate)){    //run query
            echo "<p>Record is updated!</p>";
        }
        else{
            echo "<p>Record is not updated.</p>";
        }
    }
    else if(isset($_POST['submit'])){ //INSERT
        $rentid = isset($_POST['rentid']) ? $_POST['rentid'] : '';
        $rentdate = isset($_POST['rentdate']) ? $_POST['rentdate'] : '';
        $invid = isset($_POST['invid']) ? $_POST['invid'] : ''; 
        $custid = isset($_POST['custid']) ? $_POST['custid'] : '';
        $return = isset($_POST['return']) ? $_POST['return'] : '';
        $staffid = isset($_POST['staffid']) ? $_POST['staffid'] : '';
        $lastupdate = date('Ymdhis', time());
        
        $sql ="INSERT INTO rental (rental_id, rental_date, inventory_id, customer_id, return_date, staff_id, last_update)"
            ."VALUES ('$rentid', '$rentdate', '$invid', '$custid', '$return', '$staffid',$lastupdate' )";

        if (mysqli_query($conn, $sql)) {    //run inserting query
            echo "<p>New record has been added successfully !</p>";
        } 
        else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
    }
    else {  //should not be able to get to this page w/o clicking any buttons
        echo "Error.";
    }
    ?> 
    <table>
            <th>Rental ID</th>
            <th>Rental Date</th>
            <th>Inventory ID</th>
            <th>Customer ID</th>
            <th>Return Date</th>
            <th>Staff ID</th>
            <th>Last Update</th>
            <th>Actions</th>
    <?php
        $sql = "SELECT * FROM rental;";
        $result = mysqli_query($conn, $sql);
            
        while($row =mysqli_fetch_assoc($result)){
                echo 
                "<tr><td>".$row['rental_id'].
                "</td><td>".$row['rental_date'].
                "</td><td>".$row['inventory_id'].
                "</td><td>".$row['customer_id'].
                "</td><td>".$row['return_date'].
                "</td><td>".$row['staff_id'].
                "</td><td>".$row['last_update'].
                "</td>";
                ?>
                    <td>
                    <form action="rentalInsert.php?rental_id=<?php echo $row['rental_id']; ?> " method="post">
                        <input type="submit" name="updt" class="act" value="Update">
                        <input type="submit" name="dlt" class="act" value="Delete">
                    </form>
                    </td>
                    <?php
                    echo "</tr>";
        }
    ?>
    </table>
</body>
</html>
