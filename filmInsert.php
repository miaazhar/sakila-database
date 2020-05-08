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
    Film.
    </h2><br>
    <form method="post" id="form1">
        Film ID: <input type="text" name="filmid" /><br><br>
        Title: <input type="text" name="title" /><br><br>
        Description: <input type="text" name="description"/><br><br>
        Release Year: <input type="text" name="year" /><br><br>
        Language ID: <input type="text" name="languageid" /><br><br>
        Original Language ID: <input type="text" name="orilanguageid"/><br><br>
        Rental Duration: <input type="text" name="rentdur" /><br><br>
        Rental Rate: <input type="text" name="rentrate" /><br><br>
        Length: <input type="text" name="length"/><br><br>
        Replacement Cost: <input type="text" name="cost" /><br><br>
        Rating: <input type="text" name="rate" /><br><br>
        Special features: <input type="text" name="sfx"/><br><br>
        Last Update: <input type="text" name="lastupdate"/><br><br>
        <input type="submit" name="submit" class="button"/>
    </form>
    <?php
    //DELETING FUNCTION
    if(isset($_POST['dlt'])=='Delete'){
        if(isset($_GET['film_id'])){
            $film_id = ($_GET['film_id']);
        }
        else{
            echo "<p>Primary key not received.</p>";
        }
        
        $deleteResult = mysqli_query($conn, "DELETE FROM film WHERE film_id= $film_id");
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
        $filmid = isset($_POST['filmid']) ? $_POST['filmid'] : '';
        $title = isset($_POST['title']) ? $_POST['title'] : '';
        $description = isset($_POST['description']) ? $_POST['description'] : '';
        $year = isset($_POST['year']) ? $_POST['year'] : '';
        $languageid = isset($_POST['languageid']) ? $_POST['languageid'] : '';
        $orilanguageid = isset($_POST['orilanguageid']) ? $_POST['orilanguageid'] : '';
        $rentdur = isset($_POST['rentdur']) ? $_POST['rentdur'] : '';
        $rentrate = isset($_POST['rentrate']) ? $_POST['rentrate'] : '';
        $length = isset($_POST['length']) ? $_POST['length'] : '';
        $cost = isset($_POST['cost']) ? $_POST['cost'] : '';
        $rate = isset($_POST['rate']) ? $_POST['rate'] : '';
        $sfx = isset($_POST['sfx']) ? $_POST['sfx'] : '';
        $lastupdate = date('Ymdhis', time());
            
        $sqlUpdate = "UPDATE film SET film_id='$filmid', title='$title', description='$description', release_year='$year', language_id='$languageid', original_language_id='$orilanguageid', rental_duration='$rentdur', rental_rate='$rentrate', length='$length', replacement_cost='$cost', rating='$rate', special_features='$sfx', last_update='$lastupdate' WHERE film_id='$filmid'";  //update query
            
        if(mysqli_query($conn, $sqlUpdate)){    //run query
            echo "<p>Record is updated!</p>";
        }
        else{
            echo "<p>Record is not updated.</p>";
        }
    }
    else if(isset($_POST['submit'])){ //INSERT
        $filmid = isset($_POST['filmid']) ? $_POST['filmid'] : '';
        $title = isset($_POST['title']) ? $_POST['title'] : '';
        $description = isset($_POST['description']) ? $_POST['description'] : '';
        $year = isset($_POST['year']) ? $_POST['year'] : '';
        $languageid = isset($_POST['languageid']) ? $_POST['languageid'] : '';
        $orilanguageid = isset($_POST['orilanguageid']) ? $_POST['orilanguageid'] : '';
        $rentdur = isset($_POST['rentdur']) ? $_POST['rentdur'] : '';
        $rentrate = isset($_POST['rentrate']) ? $_POST['rentrate'] : '';
        $length = isset($_POST['length']) ? $_POST['length'] : '';
        $cost = isset($_POST['cost']) ? $_POST['cost'] : '';
        $rate = isset($_POST['rate']) ? $_POST['rate'] : '';
        $sfx = isset($_POST['sfx']) ? $_POST['sfx'] : '';
        $lastupdate = date('Ymdhis', time());
        
        $sql ="INSERT INTO film (film_id, title, description, release_year, language_id, original_language_id, rental_duration, rental_rate, length, replacement_cost, rating, special_features, last_update)"
            ."VALUES ('$filmid','$title', '$description', '$year','$languageid', '$orilanguageid', '$rentdur', '$rentrate','$length', '$cost', '$rate', '$sfx', '$lastupdate' )";

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
			<th> Film ID </th>
			<th> Title </th>
			<th> Description </th>
			<th> Release year </th>
			<th> Language ID </th>
			<th> Original language ID </th>
			<th> Rental duration </th>
			<th> Rental rate </th>
			<th> Length </th>
			<th> Replacement cost </th>
			<th> Rating </th>
			<th> Special features </th>
			<th> Last update </th>
            <th> Actions </th>
		</tr>

<?php
            $sql = "SELECT * FROM film;";
            $result = mysqli_query($conn, $sql);
            
            
            
            while($row =mysqli_fetch_assoc($result)){
                    echo "<tr><td>".$row['film_id']."</td><td>".$row['title']."</td><td>".$row['description']."</td><td>".$row['release_year']."</td><td>".$row['language_id']."</td><td>".$row['original_language_id']."</td><td>".$row['rental_duration']."</td><td>".$row['rental_rate']."</td><td>".$row['length']."</td><td>".$row['replacement_cost']."</td><td>".$row['rating']."</td><td>".$row['special_features']."</td><td>".$row['last_update']."</td>";
                    ?>
                    <td>
                    <form action="filmInsert.php?film_id=<?php echo $row['film_id']; ?> " method="post">
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