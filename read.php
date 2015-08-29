<?php
$servername = "localhost";
$username = "root";
$password = "12345";
$dbname = "sat-calculator";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$mathRawScore = $_GET["math_score"];
$readingRawScore = $_GET["reading_score"];
$writingRawScore = $_GET["writing_score"];
$writingEssayScore = $_GET["essay_score"];

$resultMath = $conn->query("SELECT scaled_score FROM math WHERE raw_score='$mathRawScore'");
$resultReading = $conn->query("SELECT scaled_score from reading WHERE raw_score='$readingRawScore'");
$resultWriting = $conn->query("SELECT scaled_score from writing WHERE raw_score='$writingRawScore' and essay_score='$writingEssayScore'");

if($resultReading->num_rows >0) {
   while($row = $resultReading-> fetch_assoc()) {
     echo $row["scaled_score"]. "-";
   }
}
if ($resultMath->num_rows > 0) {
    while($row = $resultMath-> fetch_assoc()) {
      echo $row["scaled_score"]. "-";
    }
}
if($resultWriting->num_rows >0) {
   while($row = $resultWriting-> fetch_assoc()) {
     echo $row["scaled_score"];
   }
}
$conn->close();
?>
