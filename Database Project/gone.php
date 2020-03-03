<!DOCTYPE html>
<html>
<head>
<title>Record Removed</title>
<meta http-equiv="content-type" content ="text/html; charset=iso-8859-1" />
</head>
<body>
<body style="background-image:url('DatabaseBackground.jpg')">
	<div align="center">
<?php include 'include.htm';
echo "<body style='background-color:powderblue'>";?>
<h1>Record Deleted</h1>
<?php
$DBConnect = mysql_connect("itec315.frostburg.edu","amibijemilusi0","2954768");
if($DBConnect === false)
			print"Unable to connect to the database. Error code: " . mysql_errno() .
		":".mysql_error(); 
		else
		{
		$DBName = "amibijemilusi0";

		if(!mysql_select_db($DBName,$DBConnect))
			print"There is not a database called $DBName";
		else{
		$TableName = "itconferencedb";
	//****************************************************************
	$ID = stripslashes($_POST['record']);
	$SQLstring = "delete from $TableName where Count = '$ID'";
	$QueryResult = mysql_query($SQLstring, $DBConnect);
	
	//I'm going off script, I hope this works !!!
	if($QueryResult === true)
		print"The record was deleted<br />";
	else
	//end going off script
	print"the record was not deleted!<br />";
	//****************************************************************
	
	//here we will reprint the table for the user to see it was
	//deleted - DO NOT DO THIS IN PRODUCTION!!
	
	$SQLstring = "select * from $TableName";
		$QueryResult =  mysql_query($SQLstring, $DBConnect);
		if(mysql_num_rows($QueryResult) ==0)
			print"There are no records in the table.";
			else{
				print"Here is a list of people attending the IT Conference in your table:</br>";
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
			mysql_free_result($QueryResult);
		}//end outer if
		mysql_close($DBConnect);
		
		}//end connection test if statement

?>
</body>
</html>
</div>	