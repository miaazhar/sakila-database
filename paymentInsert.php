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
        Payment ID: <input type="text" name="payid"/><br><br>
        Customer ID: <input type="text" name="custid" /><br><br>
        Staff ID: <input type="text" name="staffid"/><br><br>
        Rental ID: <input type="text" name="rentid"/><br><br>
        Amount: <input type="text" name="amount" /><br><br>
        Payment Date: <input type="text" name="paydate" /><br><br>
        Last Update: <input type="text" name="lastupdate"/><br><br>
        <input type="submit" name="submit" class="button"/>
    </form>
    
    <?php
    //DELETING FUNCTION
    if(isset($_POST['dlt'])=='Delete'){
        if(isset($_GET['payment_id'])){
            $payment_id = ($_GET['payment_id']);
        }
        else{
            echo "<p>Primary key not received.</p>";
        }
        
        $deleteResult = mysqli_query($conn, "DELETE FROM payment WHERE payment_id= $payment_id");
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
        $payid = isset($_POST['payid']) ? $_POST['payid'] : '';
        $custid = isset($_POST['custid']) ? $_POST['custid'] : '';
        $staffid = isset($_POST['staffid']) ? $_POST['staffid'] : '';
        $rentid = isset($_POST['rentid']) ? $_POST['rentid'] : '';
        $amount = isset($_POST['amount']) ? $_POST['amount'] : '';
        $paydate = isset($_POST['paydate']) ? $_POST['paydate'] : '';
        $lastupdate = date('Ymdhis', time());
            
        $sqlUpdate = "UPDATE payment SET payment_id='$payid', customer_id='$custid', staff_id='$staffid', rental_date='$rentdate', amount='$amount',  payment_date='$paydate', last_update='$lastupdate' WHERE payment_id='$payid'";  //update query
            
        if(mysqli_query($conn, $sqlUpdate)){    //run query
            echo "<p>Record is updated!</p>";
        }
        else{
            echo "<p>Record is not updated.</p>";
        }
    }
    else if(isset($_POST['submit'])){ //INSERT
        $payid = isset($_POST['payid']) ? $_POST['payid'] : '';
        $custid = isset($_POST['custid']) ? $_POST['custid'] : '';
        $staffid = isset($_POST['staffid']) ? $_POST['staffid'] : '';
        $rentid = isset($_POST['rentid']) ? $_POST['rentid'] : '';
        $amount = isset($_POST['amount']) ? $_POST['amount'] : '';
        $paydate = isset($_POST['paydate']) ? $_POST['paydate'] : '';
        $lastupdate = date('Ymdhis', time());
        
        $sql ="INSERT INTO payment (payment_id, customer_id,  staff_id, rental_date, amount, payment_date, last_update)"
            ."VALUES ('$payid', '$custid', '$staffid', '$rentdate', '$amount', '$paydate', '$lastupdate' )";

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
        <t>
            <th>Payment ID</th>
            <th>Customer ID</th>
            <th>Staff ID</th>
            <th>Rental ID</th>
            <th>Amount</th>
            <th>Payment Date</th>
            <th>Last Update</th>
            <th>Actions</th>
        </t>
    <?php
        $sql = "SELECT * FROM payment;";
        $result = mysqli_query($conn, $sql);
            
        //echo "<table>";
            
        while($row =mysqli_fetch_assoc($result)){
                echo 
                "<tr><td>".$row['payment_id'].
                "</td><td>".$row['customer_id'].
                "</td><td>".$row['staff_id'].
                "</td><td>".$row['rental_id'].
                "</td><td>".$row['amount'].
                "</td><td>".$row['payment_date'].
                "</td><td>".$row['last_update'].
                "</td>";
                ?>
                    <td>
                    <form action="paymentInsert.php?payment_id=<?php echo $row['payment_id']; ?> " method="post">
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
