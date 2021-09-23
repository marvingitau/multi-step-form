<?php
/**
 * CREATE TABLE `multi_step_form_data` (
 * `id` int(11) NOT NULL,
 * `firstname` varchar(256) NOT NULL,
 * `lastname` varchar(256) NOT NULL,
 * `gender` varchar(256) NOT NULL,
 * `email` varchar(256) NOT NULL,
 * `mobilenumber` varchar(256) NOT NULL,
 * `address` varchar(256) NOT NULL,
 * `postalcode` varchar(256) NOT NULL,
 * `cityname` varchar(256) NOT NULL,
 * `filename` varchar(256) NOT NULL,
 * ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
 */

require_once "database.php";

// save data in database

// prepare and bind
$stmt = $link->prepare("INSERT INTO multi_step_form_data (firstname, lastname, gender, email, mobilenumber, address, postalcode, cityname, filename) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssss", $firstname, $lastname, $gender, $email, $mobilenumber, $address, $postalcode, $cityname, $DOBFileDocname);

    /* Set the parameters values and execute
    the statement again to insert another row */
    $firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$mobilenumber = $_POST['mobilenumber'];
	$address = $_POST['address'];
	$postalcode = $_POST['postalcode'];
	$cityname = $_POST['cityname'];

	$thirdntarget_dir = "uploadedFiles/";
	$DOBFileDocname =  $_FILES["uploadFile"]["name"];
	$thirdntarget_dir = $thirdntarget_dir.$DOBFileDocname;
	move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $thirdntarget_dir);
	
   //$stmt->execute();
   
//echo "New records created successfully";

   if($stmt->execute()) 
   {
	   echo "success";
   }
   else
   {
        echo "error";
   }
   
   $stmt->close();
   $link->close();

?>