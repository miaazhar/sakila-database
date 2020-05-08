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
    Staff.
    </h2>
    <form action="staffInsert.php" method="post">   <!-- INSERTING FORM, OUTPUT GOES TO OTHER FILE -->
        Staff ID: <input type="text" name="staffid"/><br><br>
        First Name: <input type="text" name="fname" /><br><br>
        Last Name: <input type="text" name="lname"/><br><br>        
        Address ID: <input type="text" name="address" /><br><br>
        Picture: <input type="text" name="pic" /><br><br>
        Email: <input type="text" name="email"/><br><br>
        Store ID: <input type="text" name="storeid" /><br><br>
        Active: <input type="text" name="active" /><br><br>
        Username: <input type="text" name="un" /><br><br>
        Password: <input type="text" name="pass" /><br><br>
        Last Update: <input type="text" name="lastupdate"/><br><br>
        <input type="submit" name="submit" class="button"/>
    </form>

<table> 
    <?php
        $sql = "SELECT * FROM staff;";
        $result = mysqli_query($conn, $sql);
        //selected table headings
        if(isset($_POST['staff_id']) && $_POST['staff_id'] == 'y') {  
           echo "<th>Staff ID</th>";
        }
        else{
        ?>  <th style="display:none;">Staff ID</th>
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
        
        if(isset($_POST['address_id']) && $_POST['address_id'] == 'y') { 
            echo "<th>Address ID</th>";
        }
        else{
        ?> <th style="display:none;">Address ID</th>
        <?php
        }
        
        if(isset($_POST['picture']) && $_POST['picture'] == 'y') { 
            echo "<th>Picture</th>";
        }
        else{
        ?> <th style="display:none;">Picture</th>
        <?php
        }
        
        if(isset($_POST['email']) && $_POST['email'] == 'y') { 
            echo "<th>Email</th>";
        }
        else{
        ?> <th style="display:none;">Email</th>
        <?php
        }
        
        if(isset($_POST['store_id']) && $_POST['store_id'] == 'y') {
           echo "<th>Store ID</th>";
        }
        else{
        ?>  <th style="display:none;">Store ID</th>
        <?php
        }
        
        if(isset($_POST['active']) && $_POST['active'] == 'y') { 
            echo "<th>Active</th>";
        }
        else{
        ?> <th style="display:none;">Active</th>
        <?php
        }
        
        if(isset($_POST['username']) && $_POST['username'] == 'y') {
           echo "<th>Username</th>";
        }
        else{
        ?>  <th style="display:none;">Username</th>
        <?php
        }
        
        if(isset($_POST['password']) && $_POST['password'] == 'y') { 
           echo "<th>Password</th>";
        }
        else{
        ?>  <th style="display:none;">Password</th>
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
            if(isset($_POST['staff_id']) && $_POST['staff_id'] == 'y') {  
                echo "<td>".$row['staff_id']."</td>";
            }
            if(isset($_POST['first_name']) && $_POST['first_name'] == 'y') {  
                echo "<td>".$row['first_name']."</td>";
            }
            if(isset($_POST['last_name']) && $_POST['last_name'] == 'y') {  
                echo "<td>".$row['last_name']."</td>";
            }
            if(isset($_POST['address_id']) && $_POST['address_id'] == 'y') {  
                echo "<td>".$row['address_id']."</td>";
            }
            if(isset($_POST['picture']) && $_POST['picture'] == 'y') { 
                echo "<td>".$row['picture']."</td>";
            }
            if(isset($_POST['email']) && $_POST['email'] == 'y') { 
                echo "<td>".$row['email']."</td>";
            }
            if(isset($_POST['store_id']) && $_POST['store_id'] == 'y') {  
                echo "<td>".$row['store_id']."</td>";
            }
            if(isset($_POST['active']) && $_POST['active'] == 'y') {  
                echo "<td>".$row['active']."</td>";
            }
            if(isset($_POST['username']) && $_POST['username'] == 'y') { 
                echo "<td>".$row['username']."</td>";
            }
            if(isset($_POST['password']) && $_POST['password'] == 'y') { 
                echo "<td>".$row['password']."</td>";
            }
            if(isset($_POST['last_update']) && $_POST['last_update'] == 'y') { 
                echo "<td>".$row['last_update']."</td>";
            } ?>
                    <td>
                    <form action="staffInsert.php?staff_id=<?php echo $row['staff_id']; ?> " method="post">
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