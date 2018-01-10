<?php
include 'Connection.php';

$hero = $_POST['heroId'];
$team = $_POST['teamId'];
$rating = $_POST['rating'];
$review = $_POST['review'];
$date  = time();
$timestamp = strtotime($date);
$sql5 =  "INSERT INTO rating (heroId, rating, ratingDate, ratingReview) VALUES ('$hero', '$rating','$date', '$review')";

if ($conn->query($sql5) === true) {
    echo "The hero has been rated sucesfully";
} else {
    echo "Error: " . $sql5 . "<br>" . $conn->error;
}

header("refresh:1; url=../index.php?teamId=$team&heroId=$hero");
