<?php
include("connection.php");
/*$pass = sha1("admin");
if(mysqli_query($con,"ALTER TABLE restaurant ADD rest_description varchar(300)"))
	echo "nice";*/
function getCoordinates($address){
 
	$address = str_replace(" ", "+", $address); // replace all the white space with "+" sign to match with google search pattern
	 
	$url = "https://maps.googleapis.com/maps/api/geocode/json?address=$address&key=AIzaSyB-NlGrDie3iFGlmhn8jDARFDCFHTGEhno";
	 
	$response = file_get_contents($url);
	$json = json_decode($response,TRUE); //generate array object from the response from the web
	 
	return ($json['results'][0]['geometry']['location']['lat'].",".$json['results'][0]['geometry']['location']['lng']);
	 
}
echo getCoordinates("Hung Hom");
?>