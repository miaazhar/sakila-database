<?php
   include 'dbh.sakila.php'; //php connection
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="style1.css">   <!-- link css-->
</head>

<body>
    <h1>
        Sakila Database.
    </h1>
<div>
    <form action="index.php" method="post"class="menu">     <!-- this until line 34 is dropdown menu-->
        <select name="valueToSearch">   <!-- name used to identify which option chosen -->
            <OPTION value=0>Select a table</OPTION>
            <OPTION value="actor">actor</OPTION>
            <OPTION value="address">address</OPTION>
            <OPTION value="category">category</OPTION>  
            <OPTION value="city">city</OPTION>
            <OPTION value="country">country</OPTION>
            <OPTION value="customer">customer</OPTION>
            <OPTION value="film">film</OPTION>
            <OPTION value="film_actor">film_actor</OPTION>
            <OPTION value="film_category">film_category</OPTION>
            <OPTION value="film_text">film_text</OPTION>    
            <OPTION value="inventory">inventory</OPTION>
            <OPTION value="language">language</OPTION>
            <OPTION value="payment">payment</OPTION>
            <OPTION value="rental">rental</OPTION>
            <OPTION value="staff">staff</OPTION>
            <OPTION value="store">store</OPTION>
        </select>
        <input type="submit" name="search" class="button" value="filter"><br>   <!-- submitting dropdown menu option, name of button is important!!-->
    </form>
</div>
<div>
    <?php $filter_result = isset($_POST['valueToSearch']) ? $_POST['valueToSearch'] : '';   //set variable calle filter_result ONLY IF there was an option submitted, if not, leave empty
    if($filter_result=="actor"){    //IF option is actor, display the checkboxes for actor
    ?>                              <!-- have to close php everytime bc the forms dont work if not under html :// -->
        <form action="actor.php" method="post">
            <input type="checkbox" name="actor_id" value="y" /> Actor ID
            <input type="checkbox" name="first_name" value="y" /> First Name
            <input type="checkbox" name="last_name" value="y" /> Last Name
            <input type="checkbox" name="last_update" value="y" /> Last Update
        <input type="submit" name="search2" class="button" value="filter"><br>
        </form>
    <?php
    }
    else if($filter_result=="address"){
    ?>
        <form action="address.php" method="post">
            <input type="checkbox" name="address_id" value="y" /> Address ID
            <input type="checkbox" name="address" value="y" /> Address
            <input type="checkbox" name="address2" value="y" /> Address2
            <input type="checkbox" name="district" value="y" /> District
            <input type="checkbox" name="city_id" value="y" /> City ID
            <input type="checkbox" name="postal_code" value="y" /> Postal code
            <input type="checkbox" name="phone" value="y" /> Phone
            <input type="checkbox" name="last_update" value="y" /> Last update
        <input type="submit" name="search2" class="button" value="filter"><br>
        </form>
    <?php
    }
    else if($filter_result=="category"){
    ?>
        <form action="category.php" method="post">
            <input type="checkbox" name="category_id" value="y" /> Category ID
            <input type="checkbox" name="name" value="y" /> Name
            <input type="checkbox" name="last_update" value="y" /> Last Update
        <input type="submit" name="search2" class="button" value="filter"><br>
        </form>
    <?php
    }
    else if($filter_result=="city"){
    ?>
        <form action="city.php" method="post">
            <input type="checkbox" name="city_id" value="y" /> City ID
            <input type="checkbox" name="city" value="y" /> City
            <input type="checkbox" name="country_id" value="y" />  Country ID
            <input type="checkbox" name="last_update" value="y" /> Last Update
        <input type="submit" name="search2" class="button" value="filter"><br>
        </form>
    <?php
    }
    else if($filter_result=="country"){
    ?>
        <form action="country.php" method="post">
            <input type="checkbox" name="country_id" value="y" /> Country ID
            <input type="checkbox" name="country" value="y" /> Country
            <input type="checkbox" name="last_update" value="y" /> Last Update
        <input type="submit" name="search2" class="button" value="filter"><br>
        </form>
    <?php
    }
    else if($filter_result=="customer"){
    ?>
        <form action="customer.php" method="post">
            <input type="checkbox" name="customer_id" value="y" /> Customer ID
            <input type="checkbox" name="store_id" value="y" /> Store ID
            <input type="checkbox" name="first_name" value="y" /> First Name
            <input type="checkbox" name="last_name" value="y" /> Last Name
            <input type="checkbox" name="email" value="y" /> Email
            <input type="checkbox" name="address_id" value="y" /> Address ID
            <input type="checkbox" name="active" value="y" /> Active
            <input type="checkbox" name="create_date" value="y" /> Create Date
            <input type="checkbox" name="last_update" value="y" /> Last Update
        <input type="submit" name="search2" class="button" value="filter"><br>
        </form>
    <?php
    }
    else if($filter_result=="film_category"){
    ?>
        <form action="filmCategory.php" method="post">
            <input type="checkbox" name="film_id" value="y" /> Film ID
            <input type="checkbox" name="category_id" value="y" /> Category ID
            <input type="checkbox" name="last_update" value="y" /> Last Update
        <input type="submit" name="search2" class="button" value="filter"><br>
        </form>
    <?php
    }
    else if($filter_result=="film_text"){
    ?>
        <form action="filmText.php" method="post">
            <input type="checkbox" name="film_id" value="y" /> Film ID
            <input type="checkbox" name="title" value="y" /> Title
            <input type="checkbox" name="description" value="y" /> Description
        <input type="submit" name="search2" class="button" value="filter"><br>
        </form>
    <?php
    }
    else if($filter_result=="film"){
    ?>
        <form action="film.php" method="post">
            <input type="checkbox" name="film_id" value="y" /> Film ID
            <input type="checkbox" name="title" value="y" /> Title
            <input type="checkbox" name="description" value="y" /> Description
            <input type="checkbox" name="release_year" value="y" /> Release Year
            <input type="checkbox" name="language_id" value="y" /> Language ID
            <input type="checkbox" name="original_language" value="y" /> Original Language
            <input type="checkbox" name="rental_duration" value="y" /> Rental Duration
            <input type="checkbox" name="rental_rate" value="y" /> Rental Rate
            <input type="checkbox" name="length" value="y" /> Length
            <input type="checkbox" name="replacement_cost" value="y" /> Replacement Cost
            <input type="checkbox" name="rating" value="rating" /> Rating
            <input type="checkbox" name="special_features" value="special_features" /> Special Features
            <input type="checkbox" name="last_update" value="last_update" /> Last Update
        <input type="submit" name="search2" class="button" value="filter"><br>
        </form>
    <?php
    }
    else if($filter_result=="film_actor"){
    ?>
        <form action="filmActor.php" method="post">
            <input type="checkbox" name="actor_id" value="y" /> Actor ID
            <input type="checkbox" name="film_id" value="y" /> Film ID
            <input type="checkbox" name="last_update" value="y" /> Last Update
        <input type="submit" name="search2" class="button" value="filter"><br>
        </form>
    <?php
    }
    else if($filter_result=="inventory"){
    ?>
        <form action="inventory.php" method="post">
            <input type="checkbox" name="inventory_id" value="y" /> Inventory ID
            <input type="checkbox" name="film_id" value="y" /> Film ID
            <input type="checkbox" name="store_id" value="y" /> Store ID
            <input type="checkbox" name="last_update" value="y" /> Last Update
        <input type="submit" name="search2" class="button" value="filter"><br>
        </form>
    <?php
    }
    else if($filter_result=="language"){
    ?>
        <form action="language.php" method="post">
            <input type="checkbox" name="language_id" value="y" /> Language ID
            <input type="checkbox" name="name" value="y" /> Name
            <input type="checkbox" name="last_update" value="y" /> Last Update
        <input type="submit" name="search2" class="button" value="filter"><br>
        </form>
    <?php
    }
    else if($filter_result=="payment"){
    ?>
        <form action="payment.php" method="post">
            <input type="checkbox" name="payment_id" value="y" /> Payment ID
            <input type="checkbox" name="customer_id" value="y" /> Customer ID
            <input type="checkbox" name="staff_id" value="y" /> Staff ID
            <input type="checkbox" name="rental_id" value="y" /> Rental ID
            <input type="checkbox" name="amount" value="y" /> Amount
            <input type="checkbox" name="payment_date" value="y" /> Payment Date
            <input type="checkbox" name="last_update" value="y" /> Last Update
        <input type="submit" name="search2" class="button" value="filter"><br>
        </form>
    <?php
    }
    else if($filter_result=="rental"){
    ?>
        <form action="rental.php" method="post">
            <input type="checkbox" name="rental_id" value="y" /> Rental ID
            <input type="checkbox" name="rental_date" value="y" /> Rental Date
            <input type="checkbox" name="inventory_id" value="y" /> Inventory ID
            <input type="checkbox" name="customer_id" value="y" /> Customer ID
            <input type="checkbox" name="return_date" value="y" /> Return Date
            <input type="checkbox" name="staff_id" value="y" /> Staff ID
            <input type="checkbox" name="last_update" value="y" /> Last Update
        <input type="submit" name="search2" class="button" value="filter"><br>
        </form>
    <?php
    }
    else if($filter_result=="staff"){
    ?>
        <form action="staff.php" method="post">
            <input type="checkbox" name="staff_id" value="y" /> Staff ID
            <input type="checkbox" name="first_name" value="y" /> First Name
            <input type="checkbox" name="last_name" value="y" /> Last Name
            <input type="checkbox" name="address_id" value="y" /> Address ID
            <input type="checkbox" name="picture" value="y" /> Picture
            <input type="checkbox" name="email" value="y" /> E-mail
            <input type="checkbox" name="store_id" value="y" /> Store ID
            <input type="checkbox" name="active" value="y" /> Active
            <input type="checkbox" name="username" value="y" /> Username
            <input type="checkbox" name="password" value="y" /> Password
            <input type="checkbox" name="last_update" value="y" /> Last Update
        <input type="submit" name="search2" class="button" value="filter"><br>
        </form>
    <?php
    }
    else if($filter_result=="store"){
    ?>
        <form action="store.php" method="post">
            <input type="checkbox" name="store_id" value="y" /> Store ID
            <input type="checkbox" name="manager_staff_id" value="y" /> Manager Staff ID
            <input type="checkbox" name="address_id" value="y" /> Address ID
            <input type="checkbox" name="last_update" value="y" /> Last Update
        <input type="submit" name="search2" class="button" value="filter"><br>
        </form>
    <?php
    }
    else {  //dont show anything; not an error, this 'if else' is always running even before option chosen
    } ?>
</div>
</body>
</html>