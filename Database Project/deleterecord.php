<!DOCTYPE html>
<html>
<head>
<title>Delete Names from the Database</title>
<meta http-equiv="content-type" content ="text/html; charset=iso-8859-1" />
</head>
<body>
<body style="background-image:url('DatabaseBackground.jpg')">
	<div align="center">
<?php include 'include.htm';
echo "<body style='background-color:powderblue'>";?>
<h1>DeleteRecord.php</h1>
<h2>Select Record to delete by ID</h2>
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
		$SQLstring = "select * from $TableName";
		$QueryResult =  mysql_query($SQLstring, $DBConnect);
		if(mysql_num_rows($QueryResult) ==0)
			print"There are no records in the table.";
			else{
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
<form method="POST" action = "Gone.php">
<p>Record to Delete(Input Count Number): <input type = "text" name = "record" /></p>
<p><input type="submit" value="Submit" /></p>
</form>
</body>
</html>
</div>	
