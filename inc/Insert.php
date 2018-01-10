<?php
include 'Connection.php';

$hero = $_POST['heroId'];
$rating = $_POST['rating'];
$review = $_POST['review'];
$date = (strftime("%Y. %B %d. %A. %X"));

$date  = time();

$timestamp = strtotime($date);


$sql5 =  "INSERT INTO rating (heroId, rating, ratingDate, ratingReview) VALUES ('$hero', '$rating','$date', '$review')";

if ($conn->query($sql5) === true) {
    echo "The hero has been rated sucesfully";
} else {
    echo "Error: " . $sql5 . "<br>" . $conn->error;
}


header("refresh:1; url=../index.php");
