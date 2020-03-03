<!DOCTYPE html>
<html>
<head>
<title>Stored Names</title>
</head>
<body>
<body style="background-image:url('DatabaseBackground.jpg')">
	<div align="center">
<?php include 'include.htm';
echo "<body style='background-color:powderblue'>";?>
<h1>Stored Information</h1>
<h2>Accepted Data From The IT Conference Form and stored into DB.</h2>
<?php
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
			$PreConferece0 = "Yes";
$PreConferece1 = "No";
$Going0 = "Yes";
$Going1 = "No";
$Cost = 0;
$GoingC = array("$Going0", "$Going1");
$PreConferenceC = array("$PreConferece0", "$PreConferece1");




if ($attending == $GoingC[0]) {
	$Cost = $Cost + 50;
}
else {
	$Cost = 0;
}
if ($preconference == $PreConferenceC[0]) {
	$Cost = $Cost + 5;
}
else {
	$Cost = $Cost;
}

$ExtraTicket = 20*$tickets ;
$TotalBill = $Cost + $ExtraTicket;
			
			
			
			
if(empty($_POST['First']) || empty($_POST['Last']) || empty($_POST['Address']) || empty($_POST['City']) || empty($_POST['State']) || empty($_POST['Zip']) || empty($_POST['Email']) || empty($_POST['PhoneNumber']) || empty($_POST['Password']) || empty($_POST['Going']) || empty($_POST['Dinner']) || empty($_POST['PreConference']))
		print"Please enter all requested information!";
	else
	{
		
		/*
		this checks to see if the credientials you provide for the DB server 
		are correct and the DB is there.
		
		There are MANY MANY ways to validate a database is working ........ R E A D
		as i don't have enough time to teach them all
		
		*/
		$DBConnect = mysql_connect("itec315.frostburg.edu","amibijemilusi0","2954768");
		
		/*
		
		
		*/
		
		if($DBConnect === false)
			print"Unable to connect to the database. Error code: " . mysql_errno() .
		":".mysql_error(); 
		else
		{
			//this is the database we are going to use
			$DBName = "amibijemilusi0";
			//this is like the commade "use database" from straight SQL
			mysql_select_db($DBName,$DBConnect);
			
			//select the table we are going to use
			//this is the name of the table in the amibijemilusi0 database that i created in MySQL Workbench 
			$TableName = "itconferencedb";
			
			//always ensure data integrity by stripping slashed and placing the data into a variable first
			//NEVER EVER insert directly into your table
			

			
			
			//let's construst the SQL string
			/*
			insert into <table name> (colum, colum, colum) values (php variable from form x3)
			*/
			$SQLString = "insert into $TableName(First,Last,Address,City,State,Zip
			,Email,Phonenumber,Password,Attending,Tickets,PreConference,TotalBill) 
			values ('$firstname', '$lastname', '$address', '$city', '$state', '$zip', 
			'$email', '$phonenumber', '$password', '$attending', '$tickets', 
			'$preconference','$TotalBill')";
			
			
			//time to run the query
			
			$QueryResult = mysql_query($SQLString,$DBConnect);
			if($QueryResult === false)
				print"Unable to store your data in the table, error code: " . mysql_errno($DBConnect) .
			":".mysql_error($DBConnect);
			else
				//we can safely assume our data was stored
				print"Your data was stored in the database";
				//I wonder if we can output the true results of $QueryResult???
				
		}//close if-else
		//always close your connection to your database !!!
	mysql_close($DBConnect);
	}//end the very first if then-else
	


			
$TheRecord = <<<HERE
$firstname,$lastname,$address,$city,$state,$zip,$email,$phonenumber,$password,$attending,$tickets,$preconference,$TotalBill \n 
HERE;

//now we obtain a handle on our file
		
$fp = fopen("export.csv", "a");
		
//now we can put the data into the file 
fputs($fp,$TheRecord);
		
//always close your handle
fclose($fp);

chmod("export.csv", 0777);
			
			

?>

</body>
</html>
</div>	