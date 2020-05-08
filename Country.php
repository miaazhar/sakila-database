<?php
    include 'dbh.sakila.php'; //php connection 
    include 'index.php';
?>

<html>
<head>
    <title></title>
    <link rel="stylesheet" href="style1.css">
</head>

<body>
    <h2>
        Country.
    </h2>
    
    <form action="countryInsert.php" method="post">
        Country ID: <input type="text" name="countryid" /><br><br>
        Country: <input type="text" name="country" /><br><br>
        Last Update: <input type="text" name="lastupdate"/><br><br>
        <input type="submit" name="submit" class="button"/>
    </form>
    
   
    <table>

        <?php
            $sql = "SELECT * FROM country;";
            $result = mysqli_query($conn, $sql);
         
            //selected table headings
        if(isset($_POST['country_id']) && $_POST['country_id'] == 'y') {  
           echo "<th>Country ID</th>";
        }
        else{
        ?>  <th style="display:none;">Country ID</th>
        <?php
        }
        
        if(isset($_POST['country']) && $_POST['country'] == 'y') {  
            echo "<th>Country</th>";
        }
        else{
        ?> <th style="display:none;">Country</th>
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
            if(isset($_POST['country_id']) && $_POST['country_id'] == 'y') {  
                echo "<td>".$row['country_id']."</td>";
            }
            if(isset($_POST['country']) && $_POST['country'] == 'y') {  
                echo "<td>".$row['country']."</td>";
            }
            if(isset($_POST['last_update']) && $_POST['last_update'] == 'y') { 
                echo "<td>".$row['last_update']."</td>";
            } ?>
                    <td>
                    <form action="countryInsert.php?country_id=<?php echo $row['country_id']; ?> " method="post">
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