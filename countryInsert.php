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
    Country.
    </h2><br>
    <form method="post" id="form1">
        Country ID: <input type="text" name="countryid" /><br><br>
        Country: <input type="text" name="country" /><br><br>
        Last Update: <input type="text" name="lastupdate"/><br><br>
        <input type="submit" name="submit" class="button"/>
    </form>
    
    <?php
    //DELETING FUNCTION
    if(isset($_POST['dlt'])=='Delete'){
        if(isset($_GET['country_id'])){
            $country_id = ($_GET['country_id']);
        }
        else{
            echo "<p>Primary key not received.</p>";
        }
        
        $deleteResult = mysqli_query($conn, "DELETE FROM country WHERE country_id= $country_id");
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
        $countryid = isset($_POST['countryid']) ? $_POST['countryid'] : '';
        $country = isset($_POST['country']) ? $_POST['country'] : '';
        $lastupdate = date('Ymdhis', time());
            
        $sqlUpdate = "UPDATE country SET country_id='$countryid', country='$country', last_update='$lastupdate' WHERE country_id='$countryid'";  //update query
            
        if(mysqli_query($conn, $sqlUpdate)){    //run query
            echo "<p>Record is updated!</p>";
        }
        else{
            echo "<p>Record is not updated.</p>";
        }
    }
    else if(isset($_POST['submit'])){ //INSERT
        $countryid = isset($_POST['countryid']) ? $_POST['countryid'] : '';
        $country = isset($_POST['country']) ? $_POST['country'] : '';
        $lastupdate = date('Ymdhis', time());
        
        $sql ="INSERT INTO country (country_id, country, last_update)"
            ."VALUES ('$countryid','$country', '$lastupdate' )";

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
			<th> Country ID </th>
			<th> Country </th>
			<th> Last Update </th>
            <th> Actions </th>
		</tr>

<?php
            $sql = "SELECT * FROM country;";
            $result = mysqli_query($conn, $sql);
            
            
            
            while($row =mysqli_fetch_assoc($result)){
                    echo "<tr><td>".$row['country_id']."</td><td>".$row['country']."</td><td>".$row['last_update']."</td>";
                    ?>
                    <td>
                    <form action="countryInsert.php?city_id=<?php echo $row['country_id']; ?> " method="post">
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