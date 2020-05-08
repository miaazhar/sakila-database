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
    City.
    </h2><br>
    <form method="post" id="form1">
        City ID: <input type="text" name="cityid" /><br><br>
        City: <input type="text" name="city" /><br><br>
        Country ID: <input type="text" name="countryid"/><br><br>
        Last Update: <input type="text" name="lastupdate"/><br><br>
        <input type="submit" name="submit" class="button"/>
    </form>
    <?php
    //DELETING FUNCTION
    if(isset($_POST['dlt'])=='Delete'){
        if(isset($_GET['city_id'])){
            $city_id = ($_GET['city_id']);
        }
        else{
            echo "<p>Primary key not received.</p>";
        }
        
        $deleteResult = mysqli_query($conn, "DELETE FROM city WHERE city_id= $city_id");
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
        $cityid = isset($_POST['cityid']) ? $_POST['cityid'] : '';
        $city = isset($_POST['city']) ? $_POST['city'] : '';
        $countryid = isset($_POST['countryid']) ? $_POST['countryid'] : '';
        $lastupdate = date('Ymdhis', time());
            
        $sqlUpdate = "UPDATE city SET city_id='$cityid', city='$city', country_id='$countryid', last_update='$lastupdate' WHERE city_id='$cityid'";  //update query
            
        if(mysqli_query($conn, $sqlUpdate)){    //run query
            echo "<p>Record is updated!</p>";
        }
        else{
            echo "<p>Record is not updated.</p>";
        }
    }
    else if(isset($_POST['submit'])){ //INSERT
        $cityid = isset($_POST['cityid']) ? $_POST['cityid'] : '';
        $city = isset($_POST['city']) ? $_POST['city'] : '';
        $countryid = isset($_POST['countryid']) ? $_POST['cityid'] : '';
        $lastupdate = date('Ymdhis', time());
        
        $sql ="INSERT INTO city (city_id, city, country_id, last_update)"
            ."VALUES ('$cityid','$city', '$countryid', '$lastupdate' )";

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
			<th> City ID </th>
			<th> City </th>
			<th> Country ID </th>
			<th> Last Update </th>
            <th> Actions </th>
		</tr>

<?php
            $sql = "SELECT * FROM city;";
            $result = mysqli_query($conn, $sql);
            
            
            
            while($row =mysqli_fetch_assoc($result)){
                    echo "<tr><td>".$row['city_id']."</td><td>".$row['city']."</td><td>".$row['country_id']."</td><td>".$row['last_update']."</td>";
                    ?>
                    <td>
                    <form action="cityInsert.php?city_id=<?php echo $row['city_id']; ?> " method="post">
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
