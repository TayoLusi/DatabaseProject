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
<h1>Modifify Your Data Entry</h1>

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
			if(mysql_num_rows($QueryResult) ==0)
				print "There are no enteries in the Database";
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

<h2>Please enter your information below</h2>
<form method="post" action="modifyhandler.php">
<fieldset>

<p>Enter Row Number: <input type = "text" name = "Count" /></p>

<label>FirstName</label>
	<input type="text" name="First"/></br>
			
<label>LastName</label>
	<input type="text" name="Last" /></br>
			
<label>Address</label>
	<input type="text" name="Address" /></br>
			
<label>City</label>
	<input type="text" name="City"/></br>
			
<label>Street</label>
	<input type="text" name="State"/></br>
	
<label>Zip</label>
	<input type="number" name="Zip"/></br>
			
<label>Email</label>
	<input type="text" name="Email"/></br>
			
<label>PhoneNumber</label>
	<input type="tel" name="PhoneNumber"/></br>
		
<label>Password</label>
	<input type="text" name="Password"/></br>

<p>
		
		<label>Will you be attending the conference?:</label>
		<select name = "Going">
			<option value="">Select...</option>
			<option value="Yes">Yes</option>
			<option value="No">No</option>
			
		</select>
		
		</p>
		
		
<p>
		
		<label>How Many Extra Dinner Tickets Would You Like To Purchase?:</label>
		<select name = "Dinner">
			<option value="">Select...</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			
		</select>
		
		</p>
		
		
		
		
<p>
		
		<label>Will you be attending the Pre-Conference:</label>
		<select name = "PreConference">
			<option value="">Select...</option>
			<option value="Yes">Yes</option>
			<option value="No">No</option>
			
		</select>
		
		</p>
		
		
<p>

</fieldset>
	<button type="submit">Submit to Handler</button>

</body>
</html>
</body>
</div>	