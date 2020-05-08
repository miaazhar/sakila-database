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
    Rental.
    </h2>
    <form action="rentalnsert.php" method="post">
        Rental ID: <input type="text" name="rentid"/><br><br>
        Rental Date: <input type="text" name="rentdate" /><br><br>
        Inventory ID: <input type="text" name="invid"/><br><br>        
        Customer ID: <input type="text" name="custid" /><br><br>
        Return Date: <input type="text" name="return" /><br><br>
        Staff ID: <input type="text" name="staffid"/><br><br>        
        Last Update: <input type="text" name="lastupdate"/><br><br>
        <input type="submit" name="submit" class="button"/>
    </form>
    
    
    <table>
    <?php
        $sql = "SELECT * FROM rental;";
        $result = mysqli_query($conn, $sql);
            
        if(isset($_POST['rental_id']) && $_POST['rental_id'] == 'y') {  
           echo "<th>Rental ID</th>";
        }
        else{
        ?>  <th style="display:none;">Rental ID</th>
        <?php
        }
        
        if(isset($_POST['rental_date']) && $_POST['rental_date'] == 'y') {  
            echo "<th>Rental Date</th>";
        }
        else{
        ?> <th style="display:none;">Rental Date</th>
        <?php
        }
            
        if(isset($_POST['inventory_id']) && $_POST['last_name'] == 'y') {  
            echo "<th>Inventory ID</th>";
        }
        else{
        ?> <th style="display:none;">Inventory ID</th>
        <?php
        }
        
        if(isset($_POST['customer_id']) && $_POST['customer_id'] == 'y') { 
            echo "<th>Customer ID</th>";
        }
        else{
        ?> <th style="display:none;">Customer ID</th>
        <?php
        }
        
        if(isset($_POST['return_date']) && $_POST['return_date'] == 'y') { 
            echo "<th>Return Date</th>";
        }
        else{
        ?> <th style="display:none;">Return Date</th>
        <?php
        }
        
        if(isset($_POST['staff_id']) && $_POST['staff_id'] == 'y') { 
            echo "<th>Staff ID</th>";
        }
        else{
        ?> <th style="display:none;">Staff ID</th>
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
            if(isset($_POST['rental_id']) && $_POST['rental_id'] == 'y') {  
                echo "<td>".$row['rental_id']."</td>";
            }
            if(isset($_POST['rental_date']) && $_POST['rental_date'] == 'y') {  
                echo "<td>".$row['rental_date']."</td>";
            }
            if(isset($_POST['inventory_id']) && $_POST['inventory_id'] == 'y') {  
                echo "<td>".$row['inventory_id']."</td>";
            }
            if(isset($_POST['customer_id']) && $_POST['customer_id'] == 'y') {  
                echo "<td>".$row['customer_id']."</td>";
            }
            if(isset($_POST['return_date']) && $_POST['return_date'] == 'y') { 
                echo "<td>".$row['return_date']."</td>";
            }
            if(isset($_POST['staff_id']) && $_POST['staff_id'] == 'y') { 
                echo "<td>".$row['staff_id']."</td>";
            }
            if(isset($_POST['last_update']) && $_POST['last_update'] == 'y') { 
                echo "<td>".$row['last_update']."</td>";
            } ?>
                    <td>
                    <form action="rentalInsert.php?rental_id=<?php echo $row['rental_id']; ?> " method="post">
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
