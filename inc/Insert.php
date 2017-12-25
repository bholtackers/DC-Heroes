<?php
include 'Connection.php';

$rating = $_POST['rating'];
$review = $_POST['review'];
$date = date('Y-m-d H:i:s');


$sql5 = "INSERT INTO rating (heroId, rating, ratingDate, ratingReview) VALUES ('1', '$rating', '$date', '$review')";

header("refresh:2; url=../index.php");
