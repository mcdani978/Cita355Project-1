<?php
session_start();
require 'database-connection.php';

$start = date('Y-m-d H:i:s', $_POST['timeTaken']);
$startDate = date('Y-m-d', $_POST['timeTaken']);
$startTime = new DateTime($start);
$endTime = new DateTime();
$timeDiff = $endTime->diff($startTime)->format('%H%I%S');
$time = date('H:i:s');
$correct = 0;
$incorrect = 0;
$end = date('H:i:s', time() -  $_POST['timeTaken']);

if ($_POST['q1'] == 'b')
{
	$correct += 1;
}
else
{
	$incorrect += 1;
}
if ($_POST['q2'] == 'a')
{
	$correct += 1;
}
else
{
	$incorrect += 1;
}
if ($_POST['q3'] == 'c')
{
	$correct += 1;
}
else
{
	$incorrect += 1;
}
if (isset($_POST['q4']))
{
	if($_POST['q4'] == ['1','4'])
	{
		$correct += 1;
	}
	else
	{
		$incorrect += 1;
	}
}
else
{
	$incorrect += 1;
}
if ($_POST['q5'] == 'b')
{
	$correct += 1;
}
else
{
	$incorrect += 1;
}
$score = ($correct / ($correct + $incorrect)) * 100;

$sql = "INSERT INTO examResult(studentID, dateTaken, time, score, correct, incorrect)
		VALUES('$_SESSION[studentID]', '$startDate', $timeDiff,
			$score, $correct, $incorrect);";
$statement = $pdo->query($sql);
$members = $statement->fetchAll();
$sql2 = "SELECT *
	FROM examResult
	WHERE studentID = '$_SESSION[studentID]';";
$statement = $pdo->query($sql2);
$members = $statement->fetchAll();
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Exam Submitted. Viewing results.</title>
	<link rel="stylesheet" href="testStyle.css">
</head>
	<body>
		<h2>Student Information</h2>
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Date Taken</th>
					<th>Time</th>
					<th>Score</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($members as $member) { ?>
					<tr>
						<td><?= $member['studentID'] ?></td>
						<td><?= $member['dateTaken'] ?></td>
						<td><?= $member['time'] ?></td>
						<td><?= $member['score'] ?>%</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<p><a href="Homepage.php">Return to Home Page</a></p>
	</body>
</html>