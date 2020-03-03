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
<h1>Order By Last Name</h1>
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
			$SQLstring = "select * from $TableName order by Last ";
			$QueryResult = mysql_query($SQLstring, $DBConnect);
			if(mysql_num_rows($QueryResult)== 0)
				print "There are no enteries in the Database";
			else
			{
				echo"<p>Here is a list of the last names in the database in alphabetical order:</p>";
				echo"<table width='100%' border = '1'>";
				echo"<tr><th>Count (the PK)</th><th>Time Stamp</th><th>Last Name</th></tr>";
				
				while(($Row = mysql_fetch_assoc($QueryResult)) !== false)
				{
					echo"<tr><td>{$Row['count']}</td>";
					echo"<td>{$Row['TimeStamp']}</td>";
					echo"<td>{$Row['Last']}</td>";
					
					
				}//end while
			}//end inner if
			mysql_free_result($QueryResult);
		}//end middle if
		mysql_close($DBConnect);
	}

?>

</form>
</body>
</html>
</div>	