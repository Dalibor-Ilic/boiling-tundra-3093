<?
session_start(); // i start most if not all pages with this depending on what Im using it for.

    $dbconn = pg_connect("host=ec2-54-227-238-21.compute-1.amazonaws.com port=5432 dbname=d6acer1i0e0vju user=nrcjpdsjehazka password=EF2PrGtLyuahtCYdiAKh1bLTGb sslmode=require options='--client_encoding=UTF8'") or die('Could not connect: ' . pg_last_error());

//here you could add checks for any empty fields using (!($_POST['first_name']))
$first_name = $_POST['first_name']; // this line will collect our information from the field in our form that has the facebook first_name in it.
$last_name = $_POST['last_name']; // same as above
$email = $_POST ['email']; //same as above
$code = $_POST ['code']; //same as above
$query = mysql_query("INSERT INTO Facebook (first_name, last_name, email, code) VALUES ('$first_name','$last_name','$email','$code')") or die(mysql_error());
// The query will insert our fields in to the database as the above line shows, make sure your database table headers are exactly correct otherwise this will not work

// You can now either send an email or if you wanted header to a new page. 
if($query){
header('location: home.html');
}else {
echo 'error adding to database';  
}
?>
