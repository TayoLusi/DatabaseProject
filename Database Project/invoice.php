<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Last name search</title>
<meta http-equiv="content-type" content="text/html; charset-iso-8859-1" />
</head>
<body>
<body style="background-image:url('DatabaseBackground.jpg')">
<div align="center">
<?php include 'include.htm';
?>
<h1>Printable Invoice</h1>
	
<?php

$DBConnect = mysql_connect("itec315.frostburg.edu", "amibijemilusi0", "2954768");
	
	//if we dont connect, we need to know so set up an error message
	if ($DBConnect === false)
		echo"<p>Unable to connect to the database server. Error Code:</p>". mysql_errno().":".mysql_error()."</p>";
	else
	{
		//set up the DB name...
		$DBName = "amibijemilusi0";
		
		//select our DB, this statement is like the use insode of mysql_affected_rows
		if(!mysql_select_db($DBName, $DBConnect))
		print "There isnt a DB called $DBName";
		else{
			$TableName = "itconferencedb";
			$SQLstring = "select * from $TableName";
			$QueryResult = mysql_query($SQLstring, $DBConnect);
			if(mysql_num_rows($QueryResult)== 0)
				print "There are no enteries in the Database";
			else
			{
				print"<table width='100%' border ='1'>";
				print"<tr><th>Count as PK</th><th>Time Stamp</th>
				<th>First Name</th>
				<th>Last Name</th><th>Address</th>
				<th>City</th><th>State</th>
				<th>Zip</th><th>Email</th>
				<th>Phone Number</th><th>Password</th>
				<th>Attending</th><th>Tickets</th>
				<th>PreConference</th><th>Total Bill</th></tr>";
				
				while(($Row = mysql_fetch_assoc($QueryResult)) !== false)
				{
					print"<tr><td>{$Row['count']}</td>";
					print"<td>{$Row['TimeStamp']}</td>";
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
					
				}//end while
			}//end inner if
			mysql_free_result($QueryResult);
		}//end middle if
		mysql_close($DBConnect);
	}
?>

<form method="POST" action = "invoicehandlercopy1.php">
<p>Please Select By Last Name: <input type = "text" name = "LastName" /></p>
<p><input type="submit" value="Submit" /></p>

</body>
</html>
</div>	