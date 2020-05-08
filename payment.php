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
    <h2>
    Payment.
    </h2>
    <form action="paymentInsert.php" method="post">
        Payment ID: <input type="text" name="payid"/><br><br>
        Customer ID: <input type="text" name="custid" /><br><br>
        Staff ID: <input type="text" name="staffid"/><br><br>
        Rental ID: <input type="text" name="rentid"/><br><br>
        Amount: <input type="text" name="amount" /><br><br>
        Payment Date: <input type="text" name="paydate" /><br><br>
        Last Update: <input type="text" name="lastupdate"/><br><br>
        <input type="submit" name="submit" class="button"/>
    </form>

    <table>
   
    <?php
        $sql = "SELECT * FROM payment;";
        $result = mysqli_query($conn, $sql);
            
        if(isset($_POST['payment_id']) && $_POST['payment_id'] == 'y') {  
           echo "<th>Payment ID</th>";
        }
        else{
        ?>  <th style="display:none;">Payment ID</th>
        <?php
        }
        
        if(isset($_POST['customer_id']) && $_POST['customer_id'] == 'y') {  
            echo "<th>Customer ID</th>";
        }
        else{
        ?> <th style="display:none;">Customer ID</th>
        <?php
        }
            
        if(isset($_POST['staff_id']) && $_POST['staff_id'] == 'y') {  
            echo "<th>Staff ID</th>";
        }
        else{
        ?> <th style="display:none;">Staff ID</th>
        <?php
        }
        
        if(isset($_POST['rental_id']) && $_POST['rental_id'] == 'y') { 
            echo "<th>Rental ID</th>";
        }
        else{
        ?> <th style="display:none;">Rental ID</th>
        <?php
        }
        
        if(isset($_POST['amount']) && $_POST['amount'] == 'y') { 
            echo "<th>Amount</th>";
        }
        else{
        ?> <th style="display:none;">Amount</th>
        <?php
        }
        
        if(isset($_POST['payment_date']) && $_POST['payment_date'] == 'y') { 
            echo "<th>Payment Date</th>";
        }
        else{
        ?> <th style="display:none;">Payment Date</th>
        <?php
        }
        
        if(isset($_POST['last_update']) && $_POST['last_update'] == 'y') { 
            echo "<th>Last Update</th>";
        }
        else{
        ?> <th style="display:none;">Last Update</th>
        <?php
        }
        echo "<th>Actions</th>";
        
        //IF WANT TO ADD LAST COLUMN FOR BUTTONS ADD HERE
        //eg <th> Update </th>
        
        //select which rows to show
        while($row =mysqli_fetch_assoc($result)){
            echo "<tr>";
            if(isset($_POST['payment_id']) && $_POST['payment_id'] == 'y') {  
                echo "<td>".$row['payment_id']."</td>";
            }
            if(isset($_POST['customer_id']) && $_POST['customer_id'] == 'y') {  
                echo "<td>".$row['customer_id']."</td>";
            }
            if(isset($_POST['staff_id']) && $_POST['staff_id'] == 'y') {  
                echo "<td>".$row['staff_id']."</td>";
            }
            if(isset($_POST['rental_id']) && $_POST['rental_id'] == 'y') {  
                echo "<td>".$row['rental_id']."</td>";
            }
            if(isset($_POST['amount']) && $_POST['amount'] == 'y') { 
                echo "<td>".$row['amount']."</td>";
            }
            if(isset($_POST['payment_date']) && $_POST['payment_date'] == 'y') { 
                echo "<td>".$row['payment_date']."</td>";
            }
           
            if(isset($_POST['last_update']) && $_POST['last_update'] == 'y') { 
                echo "<td>".$row['last_update']."</td>";
            } ?>
                    <td>
                    <form action="paymentInsert.php?payment_id=<?php echo $row['payment_id']; ?> " method="post">
                        <input type="submit" name="updt" class="act" value="Update">
                        <input type="submit" name="dlt" class="act" value="Delete">
                    </form>
                    </td>
               
            <?php
            echo "</tr>";
        }//end while
    ?>
    </table>
</body>
</html>
