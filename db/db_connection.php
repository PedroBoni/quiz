<?php
$serverName = "35.198.53.248";
$database = "quiz";
$username = "quizAdmin2";
$password = "mr4yHHxq8GMpsK4M";
// Create connection
$conn = mysqli_connect($serverName, $username, $password, $database);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
