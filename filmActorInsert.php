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
    Film Actor.
    </h2><br>
    <form method="post" id="form1">
        Actor ID: <input type="text" name="actorid" /><br><br>
        Film ID: <input type="text" name="filmid"/><br><br>
        Last Update: <input type="text" name="lastupdate"/><br><br>
        <input type="submit" name="submit" class="button"/>
    </form>
    
    <?php
    //DELETING FUNCTION
    if(isset($_POST['dlt'])=='Delete'){
        if(isset($_GET['actor_id'])){
            $actor_id = ($_GET['actor_id']);
        }
        else{
            echo "<p>Primary key not received.</p>";
        }
        
        $deleteResult = mysqli_query($conn, "DELETE FROM film_actor WHERE actor_id= $actor_id");
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
        $actorid = isset($_POST['actorid']) ? $_POST['actorid'] : ''; 
        $filmid = isset($_POST['filmid']) ? $_POST['filmid'] : '';
        $lastupdate = date('Ymdhis', time());
            
        $sqlUpdate = "UPDATE film_actor SET actor_id='$actorid', film_id='$filmid', last_update='$lastupdate' WHERE actor_id='$actorid'";  //update query
            
        if(mysqli_query($conn, $sqlUpdate)){    //run query
            echo "<p>Record is updated!</p>";
        }
        else{
            echo "<p>Record is not updated.</p>";
        }
    }
    else if(isset($_POST['submit'])){ //INSERT
        $actorid = isset($_POST['actorid']) ? $_POST['actorid'] : ''; 
        $filmid = isset($_POST['filmid']) ? $_POST['filmid'] : '';
        $lastupdate = date('Ymdhis', time());
        
        $sql ="INSERT INTO actor (actor_id, film_id, last_update)"
            ."VALUES ('$actorid','$filmid', '$lastupdate' )";

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
		<tr>
			<th> Actor ID </th>
			<th> Film ID </th>
			<th> Last Update </th>
            <th> Actions </th>
		</tr>

<?php
            $sql = "SELECT * FROM film_actor;";
            $result = mysqli_query($conn, $sql);
            
            while($row =mysqli_fetch_assoc($result)){
                    echo "<tr><td>".$row['actor_id']."</td><td>".$row['film_id']."</td><td>".$row['last_update']."</td";
                    ?>
                    <td>
                    <form action="filmActorInsert.php?actor_id=<?php echo $row['actor_id']; ?> " method="post">
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