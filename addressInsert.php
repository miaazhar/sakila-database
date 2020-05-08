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
    <br><h1>
        Sakila Database.
    </h1><br>
    <br><h2>
    Address.
    </h2><br>
    <form method="post" id="form1">
        Address ID: <input type="text" name="addressid" /><br><br>
        1st Address: <input type="text" name="address" /><br><br>
        2nd Address: <input type="text" name="address2" /><br><br>
        District: <input type="text" name="district" /><br><br>
        City ID: <input type="text" name="cityid" /><br><br>
        Postal Code: <input type="text" name="postalcode" /><br><br>
        Phone: <input type="text" name="phone" /><br><br>
        Last Update: <input type="text" name="lastupdate"/><br><br>
        <input type="submit" name="submit" class="button"/>
    </form>
    <?php
    //DELETING FUNCTION
    if(isset($_POST['dlt'])=='Delete'){
        if(isset($_GET['address_id'])){
            $address_id = ($_GET['address_id']);
        }
        else{
            echo "<p>Primary key not received.</p>";
        }
        
        $deleteResult = mysqli_query($conn, "DELETE FROM address WHERE address_id= $address_id");
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
        $addressid = isset($_POST['addressid']) ? $_POST['address_id'] : '';   //set all form results into variable
        $address = isset($_POST['address']) ? $_POST['address'] : '';
        $address2 = isset($_POST['address2']) ? $_POST['address2'] : '';
        $district = isset($_POST['district']) ? $_POST['district'] : '';
        $cityid = isset($_POST['cityid']) ? $_POST['cityid'] : '';
        $postalcode = isset($_POST['postalcode']) ? $_POST['postalcode'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $lastupdate = date('Ymdhis', time());
            
        $sqlUpdate = "UPDATE address SET address_id='$addressid', address='$address', address2='$address2', district='$district', city_id='$cityid', postal_code='$postalcode', phone='$phone', last_update='$lastupdate' WHERE address_id='$addressid'";  //update query
            
        if(mysqli_query($conn, $sqlUpdate)){    //run query
            echo "<p>Record is updated!</p>";
        }
        else{
            echo "<p>Record is not updated.</p>";
        }
    }
    else if(isset($_POST['submit'])){ //INSERT
        $addressid = isset($_POST['addressid']) ? $_POST['address_id'] : '';   //set all form results into variable
        $address = isset($_POST['address']) ? $_POST['address'] : '';
        $address2 = isset($_POST['address2']) ? $_POST['address2'] : '';
        $district = isset($_POST['district']) ? $_POST['district'] : '';
        $cityid = isset($_POST['cityid']) ? $_POST['cityid'] : '';
        $postalcode = isset($_POST['postalcode']) ? $_POST['postalcode'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $lastupdate = date('Ymdhis', time());
        
        $sql ="INSERT INTO staff (address_id, address, address2, district, city_id, postal_code, phone, last_update)"
            ."VALUES ('$addressid','$address', '$address2', '$district','$cityid', '$postalcode', '$phone', '$lastupdate' )";

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
			<th> Address ID </th>
			<th> Address </th>
			<th> Address2 </th>
			<th> District</th>
			<th> City ID</th>
			<th> Postal code </th>
			<th> Phone </th>
			<th> Last update </th>
            <th> Actions </th>
		</tr>

<?php
            $sql = "SELECT * FROM address;";
            $result = mysqli_query($conn, $sql);
            
           
            
            while($row =mysqli_fetch_assoc($result)){
                    echo "<tr><td>".$row['address_id']."</td><td>".$row['address']."</td><td>".$row['address2']."</td><td>".$row['district']."</td><td>".$row['city_id']."</td><td>".$row['postal_code']."</td><td>".$row['phone']."</td><td>".$row['last_update']."</td>";
                    ?>
                    <td>
                    <form action="addressInsert.php?address_id=<?php echo $row['address_id']; ?> " method="post">
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
