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
    <h2>
        Film.
    </h2>
    <form action="filmInsert.php" method="post">
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
        <input type="submit" name="submit"/>
    </form>
    
<table>

<?php
            $sql = "SELECT * FROM film;";
            $result = mysqli_query($conn, $sql);
            
            //selected table headings
        if(isset($_POST['film_id']) && $_POST['film_id'] == 'y') {  
           echo "<th>Film ID</th>";
        }
        else{
        ?>  <th style="display:none;">Film ID</th>
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
        
        if(isset($_POST['release_year']) && $_POST['release_year'] == 'y') { 
            echo "<th>Release Year>";
        }
        else{
        ?> <th style="display:none;">Release Year</th>
        <?php
        }
        
        if(isset($_POST['language_id']) && $_POST['language_id'] == 'y') { 
            echo "<th>Language ID</th>";
        }
        else{
        ?> <th style="display:none;">Language ID</th>
        <?php
        }
        
        if(isset($_POST['original_language_id']) && $_POST['original_language_id'] == 'y') { 
            echo "<th>Original Language ID</th>";
        }
        else{
        ?> <th style="display:none;">Original Language ID</th>
        <?php
        }
        
        if(isset($_POST['rental_duration']) && $_POST['rental_duration'] == 'y') {
           echo "<th>Rental Duration</th>";
        }
        else{
        ?>  <th style="display:none;">Rental Duration</th>
        <?php
        }
        
        if(isset($_POST['rental_rate']) && $_POST['rental_rate'] == 'y') { 
            echo "<th>Rental Rate</th>";
        }
        else{
        ?> <th style="display:none;">Rental Rate</th>
        <?php
        }
        
        if(isset($_POST['length']) && $_POST['length'] == 'y') {
           echo "<th>Length</th>";
        }
        else{
        ?>  <th style="display:none;">Length</th>
        <?php
        }
        
        if(isset($_POST['replacement_cost']) && $_POST['replacement_cost'] == 'y') { 
           echo "<th>Replacement Cost</th>";
        }
        else{
        ?>  <th style="display:none;">Replacement Cost</th>
        <?php
        }
        
        if(isset($_POST['rating']) && $_POST['rating'] == 'y') {
           echo "<th>Rating</th>";
        }
        else{
        ?>  <th style="display:none;">Rating</th>
        <?php
        }
        
        if(isset($_POST['special_features']) && $_POST['special_features'] == 'y') { 
           echo "<th>Special Features</th>";
        }
        else{
        ?>  <th style="display:none;">Special Features</th>
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
            if(isset($_POST['release_year']) && $_POST['release_year'] == 'y') {  
                echo "<td>".$row['release_year']."</td>";
            }
            if(isset($_POST['language_id']) && $_POST['language_id'] == 'y') { 
                echo "<td>".$row['language_id']."</td>";
            }
            if(isset($_POST['original_language_id']) && $_POST['original_language_id'] == 'y') { 
                echo "<td>".$row['original_language_id']."</td>";
            }
            if(isset($_POST['rental_duration']) && $_POST['rental_duration'] == 'y') {  
                echo "<td>".$row['rental_duration']."</td>";
            }
            if(isset($_POST['rental_rate']) && $_POST['rental_rate'] == 'y') {  
                echo "<td>".$row['rental_rate']."</td>";
            }
            if(isset($_POST['length']) && $_POST['length'] == 'y') { 
                echo "<td>".$row['length']."</td>";
            }
            if(isset($_POST['replacement_cost']) && $_POST['replacement_cost'] == 'y') { 
                echo "<td>".$row['replacement_cost']."</td>";
            }
            if(isset($_POST['rating']) && $_POST['rating'] == 'y') {  
                echo "<td>".$row['rating']."</td>";
            }
            if(isset($_POST['special_features']) && $_POST['special_features'] == 'y') { 
                echo "<td>".$row['special_features']."</td>";
            }
            if(isset($_POST['last_update']) && $_POST['last_update'] == 'y') { 
                echo "<td>".$row['last_update']."</td>";
            } ?>
                    <td>
                    <form action="filmInsert.php?film_id=<?php echo $row['film_id']; ?> " method="post">
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