<?php 
session_start();
$timeTaken = time();
$_SESSION['studentID'] = 'dummy';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CITA 355 Exam</title>
</head>
<body>
	<form action="testResults.php" method="post">
		<input type="hidden" name="timeTaken" value=<?= $timeTaken ?> >
		<h3> Question 1: </h3><p>
			<br><br>
			Math<input type ="radio" name="q1" value="a"> <br>
			CIT<input type ="radio" name="q1" value="b"> <br>
			Physics<input type ="radio" name="q1" value="c"> <br>
			Automotive<input type ="radio" name="q1" value="d"> <br><br></p>
		<h3> Question 2: </h3><p>
			<br><br>
			Math<input type ="radio" name="q2" value="a"> <br>
			CIT<input type ="radio" name="q2" value="b"> <br>
			Physics<input type ="radio" name="q2" value="c"> <br>
			Automotive<input type ="radio" name="q2" value="d"> <br><br></p>
		<h3>Question 3: </h3><p>
			Select the php data type that would be the best option to hold the value of the calculated average of a set of test scores.<br><br>
			<select name="q3">
				<option value="">Select</option>
				<option value="a">Integer</option>
				<option value="b">String</option>
				<option value="c">Float</option>
				<option value="d">Boolean</option>
				<option value="e">NULL</option>
			</select>
		<br><br></p>
		<h3> Question 4: </h3><p>
			What are actions you must take when a browser sends data. (Check all that apply)<br><br>
			<input type="checkbox" name="q4[]" value="1">
			Validate it
			<input type="checkbox" name="q4[]" value="2">
			Modify it
			<input type="checkbox" name="q4[]" value="3">
			Upload it
			<input type="checkbox" name="q4[]" value="4">
			Collect it
		<br></p>
		 <h3>Question 5: </h3><p>
		 	You can use session_unset() to remove all session data and destroy the current session.<br><br>
			True<input type ="radio" name="q5" value="a">
			False<input type ="radio" name="q5" value="b"> </p>
		<p> <input type ="submit" name = "Submit" value = "Send Form" />
		<br></p>
	</form>
</body>
</html>