<?php
include 'inc/Connection.php';

$hero = $_POST['heroId'];
$team = $_POST['teamId'];
$rating = $_POST['rating'];
$review = $_POST['review'];
$date  = time();
$timestamp = strtotime($date);
$sql5 =  "INSERT INTO rating (heroId, rating, ratingDate, ratingReview) VALUES ('$hero', '$rating','$date', '$review')";

if ($conn->query($sql5) === true) {
    echo "";
} else {
    echo "Error: " . $sql5 . "<br>" . $conn->error;
    die();
}


header("refresh:2; url=index.php?teamId=$team&heroId=$hero");
?>

<html>
<?php include 'inc/Head.php';?>
<body>
  <?php include 'inc/Header.php'; ?>
    <h1>The hero has been rated succesfully!</h1>
  <?php include 'inc/Footer.php'; ?>
</body>
</html>
