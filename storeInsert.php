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
    <form method="post" id="form1">   <!-- INSERTING FORM, also written here to allow quick multiple inserts -->
        Store ID: <input type="text" name="storeid"/><br><br>
        Manager Staff ID: <input type="text" name="manager" /><br><br>
        Address ID: <input type="text" name="addid"/><br><br>          
        Last Update: <input type="text" name="lastupdate"/><br><br>
        <input type="submit" name="submit" class="button"/>
    </form>
    
    <?php
    //DELETING FUNCTION
    if(isset($_POST['dlt'])=='Delete'){
        if(isset($_GET['store_id'])){
            $store_id = ($_GET['store_id']);
        }
        else{
            echo "<p>Primary key not received.</p>";
        }
        
        $deleteResult = mysqli_query($conn, "DELETE FROM store WHERE store_id= $store_id");
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
        $storeid = isset($_POST['storeid']) ? $_POST['storeid'] : '';
        $manager = isset($_POST['manager']) ? $_POST['manager'] : '';
        $addid = isset($_POST['addid']) ? $_POST['addid'] : '';
        $lastupdate = isset($_POST['lastupdate']) ? $_POST['lastupdate'] : '';
            
        $sqlUpdate = "UPDATE store SET store_id='$storeid', manager_staff_id='$manager', address_id='$addid',  last_update='$lastupdate' WHERE store_id='$storeid'";  //update query
            
        if(mysqli_query($conn, $sqlUpdate)){    //run query
            echo "<p>Record is updated!</p>";
        }
        else{
            echo "<p>Record is not updated.</p>";
        }
    }
    else if(isset($_POST['submit'])){ //INSERT
        $storeid = isset($_POST['storeid']) ? $_POST['storeid'] : '';
        $manager = isset($_POST['manager']) ? $_POST['manager'] : '';
        $addid = isset($_POST['addid']) ? $_POST['addid'] : '';
        $lastupdate = isset($_POST['lastupdate']) ? $_POST['lastupdate'] : '';
        
        $sql ="INSERT INTO store (store_id, manager_staff_id, address_id, last_update)"
            ."VALUES ('$storeid','$manager', '$addid', '$lastupdate' )";

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
    <table> <!--PRINTS ENTIRE TABLE AND RECORDS -->
            <th>Store ID</th>
            <th>Manager Staff ID</th>
            <th>Address ID</th>
            <th>Last Update</th>
            <th>Actions</th>
    <?php
        $sql = "SELECT * FROM store;";
        $result = mysqli_query($conn, $sql);
            
        while($row =mysqli_fetch_assoc($result)){
                echo 
                "<tr><td>".$row['store_id'].
                "</td><td>".$row['manager_staff_id'].
                "</td><td>".$row['address_id'].
                "</td><td>".$row['last_update'].
                "</td>";
                ?>
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
