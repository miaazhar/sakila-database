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
    Inventory.
    </h2><br>
    <form method="post" id="form1">
        Inventory ID: <input type="text" name="invid"/><br><br>
        Film ID: <input type="text" name="filmid" /><br><br>
        Store ID: <input type="text" name="storeid"/><br><br>
        Last Update: <input type="text" name="lastupdate"/><br><br>
        <input type="submit" name="submit" class="button"/>
    </form>
    
    <?php
    //DELETING FUNCTION
    if(isset($_POST['dlt'])=='Delete'){
        if(isset($_GET['inventory_id'])){
            $inventory_id = ($_GET['inventory_id']);
        }
        else{
            echo "<p>Primary key not received.</p>";
        }
        
        $deleteResult = mysqli_query($conn, "DELETE FROM inventory WHERE inventory_id= $inventory_id");
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
        $inventoryid = isset($_POST['invid']) ? $_POST['invid'] : ''; 
        $filmid = isset($_POST['filmid']) ? $_POST['filmid'] : '';
        $storeid = isset($_POST['storeid']) ? $_POST['storeid'] : '';
        $lastupdate = date('Ymdhis', time());
            
        $sqlUpdate = "UPDATE inventory SET inventory_id='$invid', film_id='$filmid', store_id='$storeid', last_update='$lastupdate' WHERE inventory_id='$invid'";  //update query
            
        if(mysqli_query($conn, $sqlUpdate)){    //run query
            echo "<p>Record is updated!</p>";
        }
        else{
            echo "<p>Record is not updated.</p>";
        }
    }
    else if(isset($_POST['submit'])){ //INSERT
        $inventoryid = isset($_POST['invid']) ? $_POST['invid'] : ''; 
        $filmid = isset($_POST['filmid']) ? $_POST['filmid'] : '';
        $storeid = isset($_POST['storeid']) ? $_POST['storeid'] : '';
        $lastupdate = date('Ymdhis', time());
        
        $sql ="INSERT INTO inventory (inventory_id, film_id, store_id, last_update)"
            ."VALUES ('$invid', '$filmid', '$storeid', '$lastupdate')";

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
            <th>Inventory ID</th>
            <th>Film ID</th>
            <th>Store ID</th>
            <th>Last Update</th>
            <th>Actions</th>
    <?php
    
        $sql = "SELECT * FROM inventory;";
        $result = mysqli_query($conn, $sql);
            
        while($row =mysqli_fetch_assoc($result)){
                echo 
                "<tr><td>".$row['inventory_id'].
                "</td><td>".$row['film_id'].
                "</td><td>".$row['store_id'].
                "</td><td>".$row['last_update'].
                "</td>";
                ?>
                    <td>
                    <form action="inventoryInsert.php?inventory_id=<?php echo $row['inventory_id']; ?> " method="post">
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
