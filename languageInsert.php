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
    Language.
    </h2><br>
    <form method="post" id="form1">
        Language ID: <input type="text" name="langid"/><br><br>
        Name: <input type="text" name="name" /><br><br>
        Last Update: <input type="text" name="lastupdate"/><br><br>
        <input type="submit" name="submit" class="button"/>
    </form>
    
    <?php
    //DELETING FUNCTION
    if(isset($_POST['dlt'])=='Delete'){
        if(isset($_GET['language_id'])){
            $language_id = ($_GET['language_id']);
        }
        else{
            echo "<p>Primary key not received.</p>";
        }
        
        $deleteResult = mysqli_query($conn, "DELETE FROM language WHERE language_id= $language_id");
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
        $langid = isset($_POST['langid']) ? $_POST['langid'] : '';
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $lastupdate = date('Ymdhis', time());
            
        $sqlUpdate = "UPDATE language SET language_id='$langid', name='$name', last_update='$lastupdate' WHERE landuage_id='$langid'";  //update query
            
        if(mysqli_query($conn, $sqlUpdate)){    //run query
            echo "<p>Record is updated!</p>";
        }
        else{
            echo "<p>Record is not updated.</p>";
        }
    }
    else if(isset($_POST['submit'])){ //INSERT
        $langid = isset($_POST['langid']) ? $_POST['langid'] : '';
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $lastupdate = date('Ymdhis', time());
        
        $sql ="INSERT INTO language (language_id, name, last_update)"
            ."VALUES ('$langid', '$name', '$lastupdate' )";

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
        <t>
            <th>LanguangeID</th>
            <th>Name</th>
            <th>Last Update</th>
            <th>Actions</th>
        </t>
    <?php
        $sql = "SELECT * FROM language;";
        $result = mysqli_query($conn, $sql);
            
        while($row =mysqli_fetch_assoc($result)){
                echo 
                "<tr><td>".$row['language_id'].
                "</td><td>".$row['name'].
                
                "</td><td>".$row['last_update'].
                "</td>";
                ?>
                    <td>
                    <form action="languageInsert.php?language_id=<?php echo $row['language_id']; ?> " method="post">
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
