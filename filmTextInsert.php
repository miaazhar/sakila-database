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
    Film Text.
    </h2><br>
    <form method="post" id="form1">
        Film ID: <input type="text" name="filmid"/><br><br>
        Title: <input type="text" name="title" /><br><br>
        Description: <input type="text" name="desc"/><br><br>
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
        
        $deleteResult = mysqli_query($conn, "DELETE FROM film_text WHERE film_id= $film_id");
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
        
        $sqlUpdate = "UPDATE film_text SET film_id='$filmid',  title='$title', description='$description' WHERE film_id='$filmid'";  //update query
            
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
        
        $sql ="INSERT INTO film_category (film_id, title, description)"
            ."VALUES ('$filmid', '$title', '$description')";

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
            <th>Film ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Actions</th>
    <?php
        $sql = "SELECT * FROM film_text;";
        $result = mysqli_query($conn, $sql);
            
        //echo "<table>";
            
        while($row =mysqli_fetch_assoc($result)){
                echo 
                "<tr><td>".$row['film_id'].
                "</td><td>".$row['title'].
                "</td><td>".$row['description'].
                "</td>";
                ?>
                    <td>
                    <form action="filmText.php?film_id=<?php echo $row['film_id']; ?> " method="post">
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
