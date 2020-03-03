<html>
<head>
<title>Show names in the database</title>
<meta http-equiv="content-type" content="text/html; charset-iso-8859-1" />
</head>
<body>
<body style="background-image:url('DatabaseBackground.jpg')">
	<div align="center">
<?php include 'include.htm';
echo "<body style='background-color:powderblue'>";?>
<h1>Number of Participants</h1>
<?php

//$Count = stripslashes($_POST['Count']);
//where $Count = Count
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
		
			
			$SQLstring = "select * from $TableName";
			
			$QueryResult = mysql_query($SQLstring, $DBConnect);
			
			
			
				
			//************************************************************
			if($QueryResult === FALSE)
				echo "<p>Unable to execute the quantity of rows.</p>"
				. "<p>Error code" . mysql_errno($DBConnect)
				. ": " . mysql_error($DBConnect) . "</p>";
			else 
				echo "<p>Successfully executed the query.</p>";
			$NumRows = mysql_num_rows($QueryResult);
			if($NumRows != 0)
				echo "<p>There are " . mysql_num_rows($QueryResult) . " amount of rows in the table.</p>";
			else 
				echo "<p>There are no rows within the table.</p>";
				
					if(mysql_num_rows($QueryResult) ==0)
			print"There are no records in the table.";
			else{
				print"Here is list of all entry from the IT Conference Form:</br>";
				//here is the header of the table
				print"<table width='100%' border ='1'>";
				print"<tr><th>Count as PK</th><th>Time Stamp</th>
				<th>First Name</th>
				<th>Last Name</th><th>Address</th>
				<th>City</th><th>State</th>
				<th>Zip</th><th>Email</th>
				<th>Phone Number</th><th>Password</th>
				<th>Attending</th><th>Tickets</th>
				<th>PreConference</th><th>Total Bill</th></tr>";
				//the rest of the table will dynamically draw based on the number of
				//rows in the table
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
				}//end of the while loop
			}//end the else for number of rows
			
		}
		mysql_close($DBConnect);
	}


?>
</body>
</html>
</body>
</html>
</div>	