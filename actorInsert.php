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
    Actor.
    </h2><br>
    <form method="post" id="form1">
        Actor ID: <input type="text" name="actorid" /><br><br>
        First Name: <input type="text" name="firstname" /><br><br>
        Last Name: <input type="text" name="lastname" /><br><br>
        Last Update: <input type="text" name="x"/><br><br>
        <input type="submit" name="submit" class="button" />
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
        
        $deleteResult = mysqli_query($conn, "DELETE FROM actor WHERE actor_id= $actor_id");
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
        $actorid = isset($_POST['actorid']) ? $_POST['actorid'] : '';   //set all form results into variable
        $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
        $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
        $lastupdate = date('Ymdhis', time());
            
        $sqlUpdate = "UPDATE actor SET actor_id='$actorid', first_name='$firstname', last_name='$lastname', last_update='$lastupdate' WHERE actor_id='$actorid'";  //update query
            
        if(mysqli_query($conn, $sqlUpdate)){    //run query
            echo "<p>Record is updated!</p>";
        }
        else{
            echo "<p>Record is not updated.</p>";
        }
    }
    else if(isset($_POST['submit'])){ //INSERT
        $actorid = isset($_POST['actorid']) ? $_POST['actorid'] : '';   //set all form results into variable
        $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
        $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
        $lastupdate = date('Ymdhis', time());
        
        $sql ="INSERT INTO actor (actor_id, first_name, last_name, last_update)"
            ."VALUES ('$actorid','$firstname', '$lastname', '$lastupdate' )";

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
            <th>Actor ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Last Update</th>
            <th>Actions</th>
    <?php
        $sql = "SELECT * FROM actor;";
        $result = mysqli_query($conn, $sql);
            
        //echo "<table>";
            
        while($row =mysqli_fetch_assoc($result)){
                echo 
                "<tr><td>".$row['actor_id'].
                "</td><td>".$row['first_name'].
                "</td><td>".$row['last_name'].
                "</td><td>".$row['last_update']."</td>";
                ?>
                <td>
                <form action="actorInsert.php?actor_id=<?php echo $row['actor_id']; ?> " method="post">
                    <input type="submit" name="updt" class="act" value="Update">
                    <input type="submit" name="dlt" class="act" value="Delete">
                </form>
                </td>
                <?php
                echo "</tr>";
        }//end while
            
        //echo "</table>";
          // $sql = "INSERT INTO actor (actor_id, first_name, last_name, last_update) /////uh idk what this is but im scared to remove it
            //VALUES ('John', 'Doe', 'john@example.com','0')";
    ?>
    </table>
</body>
</html>
