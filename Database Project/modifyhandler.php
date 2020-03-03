<html>
<head>
<title></title>
<meta http-equiv="content-type" content ="text/html; charset=iso-8859-1" />
</head>
<body>
<body style="background-image:url('DatabaseBackground.jpg')">
	<div align="center">
<?php include 'include.htm';
echo "<body style='background-color:powderblue'>";?>
<h1>Record has been modified</h1>
<?php
$DBConnect = mysql_connect("itec315.frostburg.edu", "amibijemilusi0", "2954768");
	if($DBConnect === false)
		echo"<p>Unable to conenct to the database server.</p>"
		. "<p>Error code " . mysql_errno()
		. ": " . mysql_error() . "</p>";
	else
	{
		$DBName = "amibijemilusi0";
		if(!@mysql_select_db($DBName, $DBConnect))
			echo"<p>There was an connection error</p>";
		else
		{
			$TableName = "itconferencedb";
			//**********************************************************
			$ROWNUM = stripslashes($_POST['Count']);
			
			$firstname = stripslashes($_POST['First']);
			$lastname = stripslashes($_POST['Last']);
			$address = stripslashes($_POST['Address']);
			$city = stripslashes($_POST['City']);
			$state = stripslashes($_POST['State']);
			$zip = stripslashes($_POST['Zip']);
			$email = stripslashes($_POST['Email']);
			$phonenumber = stripslashes($_POST['PhoneNumber']);
			$password = stripslashes($_POST['Password']);
			$attending = stripslashes($_POST['Going']);
			$tickets = stripslashes($_POST['Dinner']);
			$preconference = stripslashes($_POST['PreConference']);
	
			
			//page 465 in book 
			$SQLstring = "UPDATE $TableName SET First = '$firstname', Last = '$lastname',
												Address = '$address', City = '$city', 
												State = '$state', Zip = '$zip',
												Email = '$email', PhoneNumber = '$phonenumber', 
												Attending = '$attending', Tickets = '$tickets',
												PreConference = '$preconference'
											    WHERE Count = $ROWNUM ";
			
			$QueryResult = @mysql_query($SQLstring, $DBConnect);
			if($QueryResult === FALSE)
				echo "<p>Error code " . mysql_errno($DBConnect) . ": " . mysql_error($DBConnect) . "</p>";
			
			
			//************************************************************
			
			
			$SQLstring = "select * from $TableName";
			$QueryResult = mysql_query($SQLstring, $DBConnect);
			if(mysql_num_rows($QueryResult) ==0)
				echo"<p>There are no entries in the database to show</p>";
			else
			{
				echo"<p>Here is your list:</p>";
				print"<table width='100%' border ='1'>";
				print"<tr><th>Count as PK</th>
				<th>First Name</th>
				<th>Last Name</th><th>Address</th>
				<th>City</th><th>State</th>
				<th>Zip</th><th>Email</th>
				<th>Phone Number</th><th>Password</th>
				<th>Attending</th><th>Tickets</th>
				<th>PreConference</th><th>Total Bill</th></tr>";
				while(($Row = mysql_fetch_assoc($QueryResult)) !==false)
				{
					print"<tr><td>{$Row['count']}</td>";
					print"<td>{$Row['First']}</td>";
					print"<td>{$Row['Last']}</td>";
					print"<td>{$Row['Address']}</td>";
					print"<td>{$Row['City']}</td>";
					print"<td>{$Row['State']}</td>";
					print"<td>{$Row['Zip']}</td>";
					print"<td>{$Row['Email']}</td>";
					print"<td>{$Row['PhoneNumber']}</td>";
					print"<td>{$Row['Password']}</td>";
					print"<td>{$Row['Attending']}</td>";
					print"<td>{$Row['Tickets']}</td>";
					print"<td>{$Row['PreConference']}</td>";	
					print"<td>{$Row['TotalBill']}</td>";				
				}
			}
			mysql_free_result($QueryResult);
		}
		mysql_close($DBConnect);
	}


?>
</body>
</html>
</div>	