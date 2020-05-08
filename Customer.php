<?php
    include 'dbh.sakila.php'; //php connection 
    include 'index.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="style1.css">
</head>

<body>
    <h2>Customer.
    </h2>
    <form action="customerInsert" method="post">
        Customer ID: <input type="text" name="customerid" /><br><br>
        Store ID: <input type="text" name="storeid" /><br><br>
        First Name: <input type="text" name="firstname" /><br><br>
        Last Name: <input type="text" name="lastname" /><br><br>
        Email: <input type="text" name="email" /><br><br>
        Address ID: <input type="text" name="addressid" /><br><br>
        Active: <input type="text" name="active" /><br><br>
        Create Date: <input type="text" name="date" /><br><br>
        Last Update: <input type="text" name="lastupdate"/><br><br>
        <input type="submit" name="submit"/>
    </form>
    

<table>

<?php
            $sql = "SELECT * FROM customer;";
            $result = mysqli_query($conn, $sql);
            
        if(isset($_POST['customer_id']) && $_POST['customer_id'] == 'y') {  
           echo "<th>Customer ID</th>";
        }
        else{
        ?>  <th style="display:none;">Customer ID</th>
        <?php
        }
        
        if(isset($_POST['store_id']) && $_POST['store_id'] == 'y') { 
            echo "<th>Store ID</th>";
        }
        else{
        ?> <th style="display:none;">Store ID</th>
        <?php
        }
        
        if(isset($_POST['first_name']) && $_POST['first_name'] == 'y') {  
            echo "<th>First Name</th>";
        }
        else{
        ?> <th style="display:none;">First Name</th>
        <?php
        }
            
        if(isset($_POST['last_name']) && $_POST['last_name'] == 'y') {  
            echo "<th>Last Name</th>";
        }
        else{
        ?> <th style="display:none;">Last Name</th>
        <?php
        }
        
        if(isset($_POST['email']) && $_POST['email'] == 'y') { 
            echo "<th>Email</th>";
        }
        else{
        ?> <th style="display:none;">Email</th>
        <?php
        }
        
                if(isset($_POST['address_id']) && $_POST['address_id'] == 'y') { 
            echo "<th>Address ID</th>";
        }
        else{
        ?> <th style="display:none;">Address ID</th>
        <?php
        }
        
        if(isset($_POST['active']) && $_POST['active'] == 'y') {
           echo "<th>Active</th>";
        }
        else{
        ?>  <th style="display:none;">Active</th>
        <?php
        }
 
        if(isset($_POST['create_date']) && $_POST['create_date'] == 'y') {
           echo "<th>Create Date</th>";
        }
        else{
        ?>  <th style="display:none;">Create Date</th>
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
            if(isset($_POST['customer_id']) && $_POST['customer_id'] == 'y') {  
                echo "<td>".$row['customer_id']."</td>";
            }
            if(isset($_POST['store_id']) && $_POST['store_id'] == 'y') {  
                echo "<td>".$row['store_id']."</td>";
            }
            if(isset($_POST['first_name']) && $_POST['first_name'] == 'y') {  
                echo "<td>".$row['first_name']."</td>";
            }
            if(isset($_POST['last_name']) && $_POST['last_name'] == 'y') {  
                echo "<td>".$row['last_name']."</td>";
            }
 
            if(isset($_POST['email']) && $_POST['email'] == 'y') { 
                echo "<td>".$row['email']."</td>";
            }
            
            if(isset($_POST['address_id']) && $_POST['address_id'] == 'y') {  
                echo "<td>".$row['address_id']."</td>";
            }
            
            if(isset($_POST['active']) && $_POST['active'] == 'y') {  
                echo "<td>".$row['active']."</td>";
            }
            if(isset($_POST['create_date']) && $_POST['create_date'] == 'y') { 
                echo "<td>".$row['create_date']."</td>";
            }

            if(isset($_POST['last_update']) && $_POST['last_update'] == 'y') { 
                echo "<td>".$row['last_update']."</td>";
            } ?>
                    <td>
                    <form action="customerInsert.php?customer_id=<?php echo $row['customer_id']; ?> " method="post">
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