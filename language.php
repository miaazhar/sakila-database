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
    <h2>
    Language.
    </h2>
    <form action="languageInsert.php" method="post">
        Language ID: <input type="text" name="langid"/><br><br>
        Name: <input type="text" name="name" /><br><br>
        Last Update: <input type="text" name="lastupdate"/><br><br>
        <input type="submit" name="submit" class="button"/>
    </form>
 
 <table>
    <?php
        $sql = "SELECT * FROM language;";
        $result = mysqli_query($conn, $sql);
            
        if(isset($_POST['language_id']) && $_POST['language_id'] == 'y') {  
           echo "<th>Language ID</th>";
        }
        else{
        ?>  <th style="display:none;">Language ID</th>
        <?php
        }
        
        if(isset($_POST['name']) && $_POST['name'] == 'y') {  
            echo "<th>Name</th>";
        }
        else{
        ?> <th style="display:none;">Name</th>
        <?php
        }
                   
        if(isset($_POST['last_update']) && $_POST['last_update'] == 'y') { 
            echo "<th>Last Update</th>";
        }
        else{
        ?> <th style="display:none;">Last Update</th>
        <?php
        }
        echo "<th>Actions</th>";
        
        //IF WANT TO ADD LAST COLUMN FOR BUTTONS ADD HERE
        //eg <th> Update </th>
        
        //select which rows to show
        while($row =mysqli_fetch_assoc($result)){
            echo "<tr>";
            if(isset($_POST['language_id']) && $_POST['language_id'] == 'y') {  
                echo "<td>".$row['language_id']."</td>";
            }
            if(isset($_POST['name']) && $_POST['name'] == 'y') {  
                echo "<td>".$row['name']."</td>";
            }
            if(isset($_POST['last_update']) && $_POST['last_update'] == 'y') { 
                echo "<td>".$row['last_update']."</td>";
            } ?>
                    <td>
                    <form action="languageInsert.php?language_id=<?php echo $row['language_id']; ?> " method="post">
                        <input type="submit" name="updt" class="act" value="Update">
                        <input type="submit" name="dlt" class="act" value="Delete">
                    </form>
                    </td>
               
            <?php
            echo "</tr>";
        }//end while
    ?>
    </table>
</body>
</html>
