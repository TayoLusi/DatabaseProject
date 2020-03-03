<!DOCTYPE html>
<head>
<title>Show Songs in the database</title>
<meta http-equiv="content-type" content="text/html; charset-iso-8859-1" />
</head>
<body>
<body style="background-image:url('DatabaseBackground.jpg')">
	<div align="center">
<?php include 'include.htm';
echo "<body style='background-color:powderblue'>";?>
<?php

$firstname = isset($_POST['First']) ? $_POST['First'] : '';
$lastname = isset($_POST['Last']) ? $_POST['Last'] : '';
$address = isset($_POST['Address']) ? $_POST['Address'] : '';
$city = isset($_POST['City']) ? $_POST['City'] : '';
$street = isset($_POST['Street']) ? $_POST['Street'] : '';
$zip = isset($_POST['Zip']) ? $_POST['Zip'] : '';
$email = isset($_POST['Email']) ? $_POST['Email'] : '';
$phonenumber = isset($_POST['PhoneNumber']) ? $_POST['PhoneNumber'] : '';
$password = isset($_POST['Password']) ? $_POST['Password'] : '';
$attending = isset($_POST['Going']) ? $_POST['Going'] : '';
$tickets = isset($_POST['Dinner']) ? $_POST['Dinner'] : '';
$preconference = isset($_POST['PreConference']) ? $_POST['PreConference'] : '';

// 3 parameters
$last = stripslashes($_POST['LastName']);
$DBConnect = mysql_connect("itec315.frostburg.edu", "amibijemilusi0", "2954768");
	if($DBConnect === false)
		echo"<p>Unable to conenct to the database server.</p>"
		. "<p>Error code " . mysql_errno()
		. ": " . mysql_error() . "</p>";
	else
	{
		$DBName = "amibijemilusi0";
		if(!@mysql_select_db($DBName, $DBConnect))
			echo"<p>There are no entries to be found by that name.</p>";
		else
		{
			$TableName = "itconferencedb";
			//**********************************************************
			$ID = stripslashes($_POST['LastName']);
			
			$SQLstring = "select * from $TableName where Last like '$last' ";
			
			$QueryResult = mysql_query($SQLstring, $DBConnect);
			
			//************************************************************
			
			
			//$SQLstring = "select * from $TableName";
			$QueryResult = mysql_query($SQLstring, $DBConnect);
			if(mysql_num_rows($QueryResult) ==0)
				echo"<p>There are no entries in the database to show</p>";
			else
			{
				while(($Row = mysql_fetch_assoc($QueryResult)) !== false)
					{
					$FirstName = "{$Row['First']}";
					$LastName = "{$Row['Last']}";
					$Address = "{$Row['Address']}";
					$City = "{$Row['City']}";
					$State = "{$Row['State']}";
					$Zip = "{$Row['Zip']}";
					$Conference = "{$Row['Attending']}";
					$ExTickets = "{$Row['Tickets']}";
					$Preconference = "{$Row['PreConference']}";
					$TotalBill = "{$Row['TotalBill']}";
					
				print"<h2>IT Annual Conference</h2></br>";
			
				print"Conference Date: 5/21/18</br>";
				
				print"Full Name: $FirstName $LastName</br>"; 
				print"Address: $Address</br>";
				print"City: $City</br>";
				print"State: $State</br>";
				print"Zip: $Zip</br>";
				print"Cost of conference($50):$Conference</br>";
				print"Total Cost of extra dinner tickets($20 per ticket): $ExTickets</br>";
				print"Cost of preconference:($5)$Preconference</br>";
				print"Total Cost:$TotalBill</br>";
				
				}//end inner if
			mysql_free_result($QueryResult);
		}//end middle if
		mysql_close($DBConnect);
	}
}

		
		


?>
</body>
</html>
</div>	