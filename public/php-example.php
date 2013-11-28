<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>PHP Example Page</title>
	</head>

	<body>
		<div id="content">

		This is a PHP example page. <br/><br/>

		<?php 
			echo('echo puts text in its place when served to the client.<br/><br/>'); 
			echo('single quotes (\')' . " and double quotes (\") are used interchangebly. Periods are used to concatenate<br/><br/>" );
			echo('loops and if/then statements are similar to c++<br/><br/>');

			// for loop
			echo('For Loop:<br/>');
			for($i = 0; $i < 10; ++$i) {
				echo($i . "<br/>");
			}

			// if / then
			echo('<br/>If / Then:<br/>');
			if (true) { 
				echo('TRUE');
			} else {
				echo('FALSE');
			}

			// variables
			$var = "<br/><br/>variables do not need a type.  their name starts with a dollar sign ($).<br/><br/>";
			echo($var);

			// mysql connection
			$dbhost = "tunnel.pagodabox.com";
			// $dbhost = "127.0.0.1";
			$dbuser = "leeanna";
			$dbpass = "aRLCZKgz";
			$dbname = "citm";

			$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, 3306);

			// Check connection
			if (mysqli_connect_errno($con)) {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error() . "<br/><br/>";
			}

			// print users into html table using echo and while loop.
			$result = mysqli_query($con, "SELECT * FROM team");

			echo "<u>TEAM</u><br/>";

			echo "<table border='1'>
					<tr>
						<th>Firstname</th><th>Lastname</th><th>Assignment</th>
					</tr>";

			while($row = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>" . $row['fname'] . "</td>";
				echo "<td>" . $row['lname'] . "</td>";
				echo "<td>" . $row['assignment'] . "</td>";
				echo "</tr>";
			}

			echo "</table><br/>";

			mysqli_close($con);

			// example of functions
			echo functionExample( "sentValue" );
		?>

		<?php
			function functionExample( $val ) {
				echo "The value sent to function: " . $val . "<br/>";
				$val = "And I was returned.<br/><br/>";
				return $val;
			}
		?>

		<?php 
			// php can be sprinkled into html which makes for some cool uses.
			// for instance, an if then statement can be used to use or ignore different divs.

			$num = rand();
		?>

		<?php if ($num % 2 == 0) { ?>

			<div id="even">
				The number <?php echo $num; ?> is even.<br/>
			</div>
		
		<?php } else { ?>

			<div id="odd">
				The number <?php echo $num; ?> is odd.<br/>
			</div>

		<?php } ?> 

		</div>
	</body>
</html>