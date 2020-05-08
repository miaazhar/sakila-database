<?php
    include 'dbh.sakila.php'; //php connection 
    include 'index.php'
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
    Staff.
    </h2><br>
    <!-- FORM -->
    <form method="post" id="form1">    
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
        <input type="submit" name="submit" class="button"/> <!-- how tf is this capitalized? -->
    </form> <!-- END FORM -->
    
    <?php
    //DELETING FUNCTION
    if(isset($_POST['dlt'])=='Delete'){
        if(isset($_GET['staff_id'])){
            $staff_id = ($_GET['staff_id']);
        }
        else{
            echo "<p>Primary key not received.</p>";
        }
        
        $deleteResult = mysqli_query($conn, "DELETE FROM staff WHERE staff_id= $staff_id");
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
            $staffid = isset($_POST['staffid']) ? $_POST['staffid'] : '';   //set all form results into variable
            $fname = isset($_POST['fname']) ? $_POST['fname'] : '';
            $lname = isset($_POST['lname']) ? $_POST['lname'] : '';
            $address = isset($_POST['address']) ? $_POST['address'] : '';
            $pic = isset($_POST['pic']) ? $_POST['pic'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $storeid = isset($_POST['storeid']) ? $_POST['storeid'] : '';
            $active = isset($_POST['active']) ? $_POST['active'] : '';
            $un = isset($_POST['un']) ? $_POST['un'] : '';
            $pass = isset($_POST['pass']) ? $_POST['pass'] : '';
            $lastupdate = date('Ymdhis', time());
            
            $sqlUpdate = "UPDATE staff SET staff_id='$staffid', first_name='$fname', last_name='$lname', address_id='$address', picture='$pic', email='$email', store_id='$storeid', active='$active', username='$un', password='$pass', last_update='$lastupdate' WHERE staff_id='$staffid'";  //update query
            
            if(mysqli_query($conn, $sqlUpdate)){    //run query
                echo "<p>Record is updated!</p>";
            }
            else{
                echo "<p>Record is not updated.</p>";
            }
    }
    else if(isset($_POST['submit'])){ //INSERT
        $staffid = isset($_POST['staffid']) ? $_POST['staffid'] : '';
        $fname = isset($_POST['fname']) ? $_POST['fname'] : '';
        $lname = isset($_POST['lname']) ? $_POST['lname'] : '';
        $address = isset($_POST['address']) ? $_POST['address'] : '';
        $pic = isset($_POST['pic']) ? $_POST['pic'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $storeid = isset($_POST['storeid']) ? $_POST['storeid'] : '';
        $active = isset($_POST['active']) ? $_POST['active'] : '';
        $un = isset($_POST['un']) ? $_POST['un'] : '';
        $pass = isset($_POST['pass']) ? $_POST['pass'] : '';
        $lastupdate = date('Ymdhis', time());
        
        $sql ="INSERT INTO staff (staff_id, first_name, last_name, address_id, picture, email, store_id, active, username, password, last_update)"
            ."VALUES ('$staffid','$fname', '$lname', '$address','$pic', '$email', '$storeid', '$active','$un', '$pass', '$lastupdate' )";

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
    <!-- PRINT FULL UPDATED TABLE -->
    <table>
            <th>Staff ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address ID</th>
            <th>Picture</th>
            <th>EMail</th>
            <th>Store ID</th>
            <th>Active</th>
            <th>Username</th>
            <th>Password</th>
            <th>Last Update</th>
            <th>Actions</th>
    <?php
        $sql = "SELECT * FROM staff;";
        $result = mysqli_query($conn, $sql);
            
        while($row =mysqli_fetch_assoc($result)){
                echo 
                "<tr><td>".$row['staff_id'].
                "</td><td>".$row['first_name'].
                "</td><td>".$row['last_name'].
                "</td><td>".$row['address_id'].
                "</td><td>".$row['picture'].
                "</td><td>".$row['email'].
                "</td><td>".$row['store_id'].
                "</td><td>".$row['active'].
                "</td><td>".$row['username'].
                "</td><td>".$row['password'].
                "</td><td>".$row['last_update']."</td>";
                ?>
                <td>
                <form action="staffInsert.php?staff_id=<?php echo $row['staff_id']; ?> " method="post">
                    <input type="submit" name="updt" class="act" value="Update">
                    <input type="submit" name="dlt" class="act" value="Delete">
                </form>
                </td>
                <?php
                echo "</tr>";
        } ?>
    </table>
</body>
</html>