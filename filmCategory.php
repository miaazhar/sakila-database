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
    Film_Category.
    </h2>
    <!-- INSERT -->
    
    <div class = "Insert">
        <input type="submit" name="OpenInsert" class="button" value="Insert" onclick="InsertFunc"><br>
    </div>
    
    <form action="filmCategoryInsert.php" method="post">
        Film ID: <input type="text" name="filmid"/><br><br>
        Category ID: <input type="text" name="categoryid"/><br><br>
        Last Update: <input type="text" name="lastupdate"/><br><br>
        <input type="submit" class="button" name = "submit" value="Submit"><br>
    </form>
    
    
    <table>
    <?php
        $sql = "SELECT * FROM film_category;";
        $result = mysqli_query($conn, $sql);
            
        if(isset($_POST['film_id']) && $_POST['film_id'] == 'y') {  
           echo "<th>Film ID</th>";
        }
        else{
        ?>  <th style="display:none;">Film ID</th>
        <?php
        }
        
        if(isset($_POST['category_id']) && $_POST['category_id'] == 'y') {  
            echo "<th>Category ID</th>";
        }
        else{
        ?> <th style="display:none;">Category ID</th>
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
            if(isset($_POST['category_id']) && $_POST['category_id'] == 'y') {  
                echo "<td>".$row['category_id']."</td>";
            }
           
            if(isset($_POST['last_update']) && $_POST['last_update'] == 'y') { 
                echo "<td>".$row['last_update']."</td>";
            } ?>
                    <td>
                    <form action="filmCategoryInsert.php?film_id= <?php echo $row['film_id']; ?> " method="post">
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
