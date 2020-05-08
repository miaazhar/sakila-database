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
    Customer.
    </h2><br>
    <form method="post" id="form1">
        Customer ID: <input type="text" name="customerid" /><br><br>
        Store ID: <input type="text" name="storeid" /><br><br>
        First Name: <input type="text" name="firstname" /><br><br>
        Last Name: <input type="text" name="lastname" /><br><br>
        Email: <input type="text" name="email" /><br><br>
        Address ID: <input type="text" name="addressid" /><br><br>
        Active: <input type="text" name="active" /><br><br>
        Create Date: <input type="text" name="date" /><br><br>
        Last Update: <input type="text" name="lastupdate"/><br><br>
        <input type="submit" name="submit" class="button"/>
    </form>
    <?php
    //DELETING FUNCTION
    if(isset($_POST['dlt'])=='Delete'){
        if(isset($_GET['customer_id'])){
            $customer_id = ($_GET['customer_id']);
        }
        else{
            echo "<p>Primary key not received.</p>";
        }
        
        $deleteResult = mysqli_query($conn, "DELETE FROM customer WHERE customer_id= $customer_id");
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
        $customerid = isset($_POST['customerid']) ? $_POST['customerid'] : '';
        $storeid = isset($_POST['storeid']) ? $_POST['storeid'] : '';
        $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
        $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $addressid = isset($_POST['addressid']) ? $_POST['addressid'] : '';
        $active = isset($_POST['active']) ? $_POST['active'] : '';
        $date = isset($_POST['date']) ? $_POST['date'] : '';
        $lastupdate = date('Ymdhis', time());
            
        $sqlUpdate = "UPDATE customer SET customer_id='$customerid', store_id='$storeid', first_name='$firstname', last_name='$lastname', email='$email', address_id='$addressid', active='$active', create_date='$date', last_update='$lastupdate' WHERE customer_id='$customerid'";  //update query
            
        if(mysqli_query($conn, $sqlUpdate)){    //run query
            echo "<p>Record is updated!</p>";
        }
        else{
            echo "<p>Record is not updated.</p>";
        }
    }
    else if(isset($_POST['submit'])){ //INSERT
        $customerid = isset($_POST['customerid']) ? $_POST['customerid'] : '';
        $storeid = isset($_POST['storeid']) ? $_POST['storeid'] : '';
        $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
        $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $addressid = isset($_POST['addressid']) ? $_POST['addressid'] : '';
        $active = isset($_POST['active']) ? $_POST['active'] : '';
        $date = isset($_POST['date']) ? $_POST['date'] : '';
        $lastupdate = date('Ymdhis', time());
        
        $sql ="INSERT INTO customer (customer_id, store_id, first_name, last_name, email, address_id, active,  create_date, last_update)"
            ."VALUES ('$customerid', '$storeid', '$firstname', '$lastname', '$email', '$active','$date', '$lastupdate' )";

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
			<th> Customer ID </th>
			<th> Store ID</th>
			<th> First Name </th>
			<th> Last Name </th>
			<th> Email </th>
			<th> Address ID </th>
			<th> Active </th>
			<th> Create date </th>
			<th> Last update </th>
            <th> Actions </th>
		</tr>

<?php
            $sql = "SELECT * FROM customer;";
            $result = mysqli_query($conn, $sql);
            
            
            
            while($row =mysqli_fetch_assoc($result)){
                    echo "<tr><td>".$row['customer_id']."</td><td>".$row['store_id']."</td><td>".$row['first_name']."</td><td>".$row['last_name']."</td><td>".$row['email']."</td><td>".$row['address_id']."</td><td>".$row['active']."</td><td>".$row['create_date']."</td><td>".$row['last_update']."</td>";
                    ?>
                    <td>
                    <form action="customerInsert.php?customer_id=<?php echo $row['customer_id']; ?> " method="post">
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