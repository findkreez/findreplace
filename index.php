<!DOCTYPE html>
<html>
<head>
	<title>Search and Replace Application</title>
</head>
<body style="background-color:lightblue;">

<?php

	$offset = 0;
	
	if (isset($_POST['text']) && isset($_POST['searchfor']) && isset($_POST['replacewith'])) {
		
		$text = htmlentities($_POST['text']);
		$search =htmlentities($_POST['searchfor']);
		$replace =htmlentities($_POST['replacewith']);

		$search_length = strlen($search);

		if (!empty($text) && !empty($search) && !empty($replace)) {
			
			while ($strpos = strpos($text, $search, $offset)) {
				$offset = $strpos + $search_length;
				$text = substr_replace($text, $replace, $strpos, $search_length);
			}

			echo $text;

		}else{

			echo "All fields are required";
		}
	}
	
?>	
<hr>
<form action="index.php" method="POST">
	<textarea name="text" cols="30" rows="7" style="margin-left:400px; margin-top:150px;"></textarea><br><br>

	<label style="margin-left:440px;">Search For<strong>:</strong></label><br>
	<input type="text" name="searchfor" style="margin-left:440px;"><br><br>

	<label style="margin-left:440px;">Replace With<strong>:</strong></label><br>
	<input type="text" name="replacewith" style="margin-left:440px;"><br><br>

	<input type="submit" value="Find and Replace" style="margin-left:460px;">
</form>
	
</body>
</html>
