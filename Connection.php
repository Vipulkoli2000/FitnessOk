<?php
$server = "fitnessok-sql.mysql.database.azure.com";
$user = "azure";
$password = "Vkoli@1949";
$database = "fitnessok";
$ssl_mode = MYSQLI_CLIENT_SSL;

// Establishing a connection to the database
$conn = mysqli_init();
mysqli_ssl_set($conn, NULL, NULL, NULL, NULL, NULL);
mysqli_real_connect($conn, $server, $user, $password, $database, 3306, NULL, $ssl_mode);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['save'])) {
   $First_Name = mysqli_real_escape_string($conn, $_POST['First_Name']);
   $Last_Name = mysqli_real_escape_string($conn, $_POST['Last_Name']);
   $Email = mysqli_real_escape_string($conn, $_POST['Email']);
   $Mobile = mysqli_real_escape_string($conn, $_POST['Mobile']);
   $Address = mysqli_real_escape_string($conn, $_POST['Address']);

   $sql_query = "INSERT INTO register_db (First_Name, Last_Name, Email, Mobile, Address)
                 VALUES ('$First_Name', '$Last_Name', '$Email', '$Mobile', '$Address')";

   if (mysqli_query($conn, $sql_query)) {
      include 'successful.html';
   } else {
      echo "Error: " . $sql_query . "<br>" . mysqli_error($conn);
   }
   
   mysqli_close($conn);
}
?>