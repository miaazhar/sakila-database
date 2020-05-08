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
    Film Category.
    </h2><br>
    <!-- INSERT -->
    <form method="post" id="form1">
        Film ID: <input type="text" name="filmid"/><br><br>
        Category ID: <input type="text" name="categoryid"/><br><br>
        Last Update: <input type="text" name="lastupdate"/><br><br>
        <input type="submit" class="button" name = "submit"><br>
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
        
        $deleteResult = mysqli_query($conn, "DELETE FROM film_category WHERE film_id= $film_id");
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
        $filmid = isset($_POST['filmid']) ? $_POST['filmid'] : '';  //set all form results into variable
        $categoryid = isset($_POST['categoryid']) ? $_POST['categoryid'] : '';
        $lastupdate = date('Ymdhis', time());
            
        $sqlUpdate = "UPDATE film_category SET film_id='$filmid', category_id='$categoryid',  last_update='$lastupdate' WHERE film_id='$filmid'";  //update query
            
        if(mysqli_query($conn, $sqlUpdate)){    //run query
            echo "<p>Record is updated!</p>";
        }
        else{
            echo "<p>Record is not updated.</p>";
        }
    }
    else if(isset($_POST['submit'])){ //INSERT
        $filmid = isset($_POST['filmid']) ? $_POST['filmid'] : '';
        $categoryid = isset($_POST['categoryid']) ? $_POST['categoryid'] : '';
        $lastupdate = date('Ymdhis', time());
        
        $sql ="INSERT INTO film_category (film_id, category_id, last_update)"
            ."VALUES ('$filmid', '$categoryid', '$lastupdate')";

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
            <th>Category ID</th>
            <th>Last Update</th>
            <th>Actions</th>
    <?php
        $sql = "SELECT * FROM film_category;";
        $result = mysqli_query($conn, $sql);
            
        while($row =mysqli_fetch_assoc($result)){
                echo 
                "<tr><td>".$row['film_id'].
                "</td><td>".$row['category_id'].
                "</td><td>".$row['last_update']."</td>";
                ?>
                <td>
                <form action="filmCategoryInsert.php?staff_id=<?php echo $row['film_id']; ?> " method="post">
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
