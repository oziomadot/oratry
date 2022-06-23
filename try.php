<?php 
require_once 'backend/authController.php';
        //require_once 'backend/getjson.php';

if(!isset($_SESSION['Staff_id'])) {
	header('location: about.php');
	die();
}


?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Customers Details</title>
		<meta charset ="UTF-8">
		<meta name="keywords" content="rent, flats, rooms,apartments,house">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<meta name="author" content="Ezeomeke Ozioma">
		<meta name="description" content="rent a home at your finger tip">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<link rel="icon" type="image/x-icon" href="favicon.ico">
		<link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

		
	</head>

	<body>
   







<div id="rent" style="display:none">

<p>I am working</p> -->
<table border="1">
  <tbody id="mytab">
  </tbody>
</table> 
</div>

<div><a href="index.php?logout=1" class="logout"> logout</a></div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript">




// Simple htmlentities leveraging JQuery
function htmlentities(str) {
   return $('<div/>').text(str).html();
}
 </script>

<script type="text/javascript">
// Do this *after* the table tag is rendered


$(document).ready(function() {




$( "#ntb" ).click(function() {
    $("#rent").toggle()
});

});
</script> 
<script type="text/javascript">
$.getJSON('getjson.php', function(rows) {
    $("#mytab").empty();
    console.log(rows);
    found = false;
    
    for (var i = 0; i < rows.length; i++) {
        row = rows[i];
        found = true;
        window.console && console.log('Row: '+i+' '+row.agent_id);
        $("#mytab").append("<tr><td>"+htmlentities(row.agent_id)+'</td><td>'
            + htmlentities(row.Bank_name)+'</td><td>'
			+ htmlentities(row.Account_number)+'</td><td>'
            + htmlentities(row.Govt_id)+'</td><td>'
            + htmlentities(row.passport)+"</td><td>\n"
            + '<form action="customerdetails.php" method="post"><button id= "verifiedbtn" type="submit" name="verifiedbtn"><a href="authController.php?id='+htmlentities(row.user_id)+'">'
            + 'Verified</a></button></form>\n</td></tr>');
    }
    if (! found) {
        $("#mytab").append("<tr><td>No entries found</td></tr>\n");
    }
});

</script>















</body>
</html>