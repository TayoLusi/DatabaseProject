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
<h1>Search By Last Name</h1>

<?php





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
			
				Print"<p>Here is the name: '$ID' <p>";
			//************************************************************
			
			
			//$SQLstring = "select * from $TableName";
			$QueryResult = mysql_query($SQLstring, $DBConnect);
			if(mysql_num_rows($QueryResult) ==0)
				echo"<p>There are no entries in the database to show</p>";
			else
			{
				echo"<p>Here is some information about '$ID' in the database:</p>";
				print"<table width='100%' border ='1'>";
				print"<tr><th>Count as PK</th><th>Time Stamp</th>
				<th>First Name</th>
				<th>Last Name</th><th>Address</th></tr>";
				
				while(($Row = mysql_fetch_assoc($QueryResult)) !== false)
				{
				print"<td>{$Row['count']}</td>";
				print"<td>{$Row['TimeStamp']}</td>";
				print"<td>{$Row['First']}</td>";
				print"<td>{$Row['Last']}</td>";
				print"<td>{$Row['Address']}</td>";				
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