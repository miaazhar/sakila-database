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
    Film_text.
    </h2>
    <form action="filmTextInsert.php" method="post">
        Film ID: <input type="text" name="filmid"/><br><br>
        Title: <input type="text" name="title" /><br><br>
        Description: <input type="text" name="desc"/><br><br>
        <input type="submit" name="submit" class="button"/>
    </form>
    
    <table>
    <?php
        $sql = "SELECT * FROM film_text;";
        $result = mysqli_query($conn, $sql);
            
        if(isset($_POST['film_id']) && $_POST['film_id'] == 'y') {  
            echo "<th>Film ID</th>";
        }
        else{
        ?> <th style="display:none;">Film ID</th>
        <?php
        }
        
        if(isset($_POST['title']) && $_POST['title'] == 'y') {  
            echo "<th>Title</th>";
        }
        else{
        ?> <th style="display:none;">Title</th>
        <?php
        }
            
        if(isset($_POST['description']) && $_POST['description'] == 'y') {  
            echo "<th>Description</th>";
        }
        else{
        ?> <th style="display:none;">Description</th>
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
            if(isset($_POST['film_id']) && $_POST['film_id'] == 'y') {  
                echo "<td>".$row['film_id']."</td>";
            }
            if(isset($_POST['title']) && $_POST['title'] == 'y') {  
                echo "<td>".$row['title']."</td>";
            }
            if(isset($_POST['description']) && $_POST['description'] == 'y') {  
                echo "<td>".$row['description']."</td>";
            }

            if(isset($_POST['last_update']) && $_POST['last_update'] == 'y') { 
                echo "<td>".$row['last_update']."</td>";
            } ?>
                    <td>
                    <form action="filmTextInsert.php?film_id=<?php echo $row['film_id']; ?> " method="post">
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
