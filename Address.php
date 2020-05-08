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
    <h2>
        Address.
    </h2>
    
    <!--<input type="submit" name="InsertData" class="button" value="Insert"><br> -->
       
    
    <form action="addressInsert.php" method="post">
        Address ID: <input type="text" name="addressid" /><br><br>
        1st Address: <input type="text" name="address" /><br><br>
        2nd Address: <input type="text" name="address2" /><br><br>
        District: <input type="text" name="district" /><br><br>
        City ID: <input type="text" name="cityid" /><br><br>
        Postal Code: <input type="text" name="postalcode" /><br><br>
        Phone: <input type="text" name="phone" /><br><br>
        Last Update: <input type="text" name="lastupdate"/><br><br>
        <input type="submit" name="submit" class="button" />
    </form>
    
<table>

<?php
            $sql = "SELECT * FROM address;";
            $result = mysqli_query($conn, $sql);
            
            //SELECT TABLE HEADINGS
            
        if(isset($_POST['address_id']) && $_POST['address_id'] == 'y') {  
           echo "<th>Address ID</th>";
        }
        else{
        ?>  <th style="display:none;">Address ID</th>
        <?php
        }
        
        if(isset($_POST['address']) && $_POST['address'] == 'y') {  
            echo "<th>Address</th>";
        }
        else{
        ?> <th style="display:none;">Address</th>
        <?php
        }
            
        if(isset($_POST['address2']) && $_POST['address2'] == 'y') {  
            echo "<th>Address 2</th>";
        }
        else{
        ?> <th style="display:none;">Address 2</th>
        <?php
        }
        
        if(isset($_POST['district']) && $_POST['district'] == 'y') { 
            echo "<th>District</th>";
        }
        else{
        ?> <th style="display:none;">District</th>
        <?php
        }
        
        if(isset($_POST['city_id']) && $_POST['city_id'] == 'y') { 
            echo "<th>City ID</th>";
        }
        else{
        ?> <th style="display:none;">City ID</th>
        <?php
        }
        
        if(isset($_POST['postal_code']) && $_POST['postal_code'] == 'y') { 
            echo "<th>Postal Code</th>";
        }
        else{
        ?> <th style="display:none;">Postal Code</th>
        <?php
        }
        
        if(isset($_POST['phone']) && $_POST['phone'] == 'y') {
           echo "<th>Phone</th>";
        }
        else{
        ?>  <th style="display:none;">Phone</th>
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
            if(isset($_POST['address_id']) && $_POST['address_id'] == 'y') {  
                echo "<td>".$row['address_id']."</td>";
            }
            if(isset($_POST['address']) && $_POST['address'] == 'y') {  
                echo "<td>".$row['address']."</td>";
            }
            if(isset($_POST['address2']) && $_POST['address2'] == 'y') {  
                echo "<td>".$row['address2']."</td>";
            }
            if(isset($_POST['district']) && $_POST['district'] == 'y') {  
                echo "<td>".$row['district']."</td>";
            }
            if(isset($_POST['city_id']) && $_POST['city_id'] == 'y') { 
                echo "<td>".$row['city_id']."</td>";
            }
            if(isset($_POST['postal_code']) && $_POST['postal_code'] == 'y') { 
                echo "<td>".$row['postal_code']."</td>";
            }
            if(isset($_POST['phone']) && $_POST['phone'] == 'y') {  
                echo "<td>".$row['phone']."</td>";
            }
            if(isset($_POST['last_update']) && $_POST['last_update'] == 'y') { 
                echo "<td>".$row['last_update']."</td>";
            } ?>
                    <td>
                    <form action="addressInsert.php?address_id=<?php echo $row['address_id']; ?> " method="post">
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
