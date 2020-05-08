<?php
    include 'dbh.sakila.php';
    include 'index.php' ; //php connection 
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
    Store.
    </h2>
    
    <form action="storeInsert.php" method="post">
        Store ID: <input type="text" name="storeid"/><br><br>
        Manager Staff ID: <input type="text" name="manager" /><br><br>
        Address ID: <input type="text" name="addid"/><br><br>          
        Last Update: <input type="text" name="x"/><br><br>
        <input type="submit" name="submit" class="button"/>
    </form>

    <table>
     
    <?php
        $sql = "SELECT * FROM store;";
        $result = mysqli_query($conn, $sql);
            
        if(isset($_POST['store_id']) && $_POST['store_id'] == 'y') {  
           echo "<th>Store ID</th>";
        }
        else{
        ?>  <th style="display:none;">Store ID</th>
        <?php
        }
        
        if(isset($_POST['manager_staff_id']) && $_POST['manager_staff_id'] == 'y') {  
            echo "<th>Manager Staff ID</th>";
        }
        else{
        ?> <th style="display:none;">Manager Staff ID</th>
        <?php
        }
           
        if(isset($_POST['address_id']) && $_POST['address_id'] == 'y') { 
            echo "<th>Address ID</th>";
        }
        else{
        ?> <th style="display:none;">Address ID</th>
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
            if(isset($_POST['store_id']) && $_POST['store_id'] == 'y') {  
                echo "<td>".$row['store_id']."</td>";
            }
            if(isset($_POST['manager_staff_id']) && $_POST['manager_staff_id'] == 'y') {  
                echo "<td>".$row['manager_staff_id']."</td>";
            }
            if(isset($_POST['address_id']) && $_POST['address_id'] == 'y') {  
                echo "<td>".$row['address_id']."</td>";
            }
            if(isset($_POST['last_update']) && $_POST['last_update'] == 'y') { 
                echo "<td>".$row['last_update']."</td>";
            } ?>
                    <td>
                    <form action="storeInsert.php?store_id=<?php echo $row['store_id']; ?> " method="post">
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
