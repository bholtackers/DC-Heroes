<?php include 'inc/Connection.php';

if (isset($_GET['teamId'])) {
    $teamId = $_GET['teamId'];
    $sql ="SELECT * FROM hero Where teamId='".$teamId."'";
} else {
    $sql ="SELECT * FROM hero where teamId=1";
}

if (isset($_GET['heroId'])) {
    $heroId = $_GET['heroId'];
    $sql2 ="SELECT * FROM hero Where heroId='".$heroId."'";
} else {
    $sql2 ="SELECT * FROM hero where heroId=0";
}

if (isset($_GET['teamId'])) {
    $teamId = $_GET['teamId'];
    $sql3 ="SELECT * FROM team Where teamId='".$teamId."'";
} else {
    $sql3 ="SELECT * FROM team where teamId=1";
}

if (isset($_GET['heroId'])) {
    $heroId = $_GET['heroId'];
    $sql4 ="SELECT * FROM rating Where heroId='".$heroId."'";
} else {
    $sql4 ="SELECT * FROM rating where teamId=1";
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="DC Heroes">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>DC Heroes</title>
</head>
<body>
	<?php include 'inc/Header.php'; ?>
	<div id="main-container">

		<div id="menu-container">
			<h2>Teams</h2>
				<?php include 'inc/Menu.php'; ?>
        <?php
                    $result3 = $conn->query($sql3);

                    if ($result3->num_rows > 0) {
                        while ($row3 = $result3->fetch_assoc()) {
                            ?>
  			<img id="teamImage" src= <?php echo $row3['teamImage']; ?> >
        <?php
                        }
                    } else {
                        echo "Bamboozeled";
                    } ?>
		</div>

		<div id="hero-container">
						<?php
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>
			<div id="heroes">
				<img id="hero-image" src= <?php echo $row['heroImage']; ?> >
				<p id="hero-name"> <?php echo $row['heroName']; ?></p>
				<p id="hero-1"> <?php echo $row['heroDescription']; ?></p> </br>
        <a href="index.php?teamId=<?php echo $row['teamId']; ?>&heroId=<?php echo $row['heroId']; ?>">
        <nav id="info">info</nav>
      </a>
			</div>
			<?php
                            }
                        } else {
                            echo "0 results";
                        } ?>
		</div>

		<div id="info-container">
      <?php
                  $result2 = $conn->query($sql2);

                  if ($result2->num_rows > 0) {
                      while ($row2 = $result2->fetch_assoc()) {
                          ?>
                          <h2> <?php echo $row2['heroName']; ?></h2> </br>
                          <h3>Info</h3>
                          <p class="hero-2"> <?php echo $row2['heroInfo']; ?></p>
                          <h3>Powers</h3>
                          <p class="hero-2"> <?php echo $row2['heroPower']; ?></p>
                          <form action="inc/Insert.php?heroId=<?php echo $row2['heroId']; ?>" method="POST" class="form-rate">
    <div class="rate">
      <input required type="radio" id="rating10" name="rating" value="10" /><label class="lblRating" for="rating10" title="5 stars"></label>
        <input type="radio" id="rating9" name="rating" value="9" /><label class="lblRating half" for="rating9" title="4 1/2 stars"></label>
      <input type="radio" id="rating8" name="rating" value="8" /><label class="lblRating" for="rating8" title="4 stars"></label>
        <input type="radio" id="rating7" name="rating" value="7" /><label class="lblRating half" for="rating7" title="3 1/2 stars"></label>
      <input type="radio" id="rating6" name="rating" value="6" /><label class="lblRating" for="rating6" title="3 stars"></label>
        <input type="radio" id="rating5" name="rating" value="5" /><label class="lblRating half" for="rating5" title="2 1/2 stars"></label>
      <input type="radio" id="rating4" name="rating" value="4" /><label class="lblRating" for="rating4" title="2 stars"></label>
        <input type="radio" id="rating3" name="rating" value="3" /><label class="lblRating half" for="rating3" title="1 1/2 stars"></label>
      <input type="radio" id="rating2" name="rating" value="2" /><label class="lblRating" for="rating2" title="1 star"></label>
        <input type="radio" id="rating1" name="rating" value="1" /><label class="lblRating half" for="rating1" title="1/2 star"></label>
      <input type="radio" id="rating0" name="rating" value="0" /><label class="lblRating" for="rating0" title="No star"></label>
    </div>
    <div class="review">
      <textarea class="formMessage" name="review" placeholder="Please write a review for the hero" required></textarea>
    </div>
    <div class="rate-submit">
      <input class="submit-btn" type="submit" name="submitRating" value="Rate Hero" required/>
      <input type="hidden" name="heroId" value="<?php echo $row2['heroId']; ?>" required/>
    </div>
</form>

<div id="reviews">
  <?php
              $result4 = $conn->query($sql4);

                          if ($result4->num_rows > 0) {
                              while ($row4 = $result4->fetch_assoc()) {
                                  ?>
  <div id="text-review">
    <p class="hero-3"> <?php echo $row4['ratingReview'] ?> </p>
  </div>
  <div id="date-review">
        <p class="hero-3"> -<?php echo $row4['ratingDate'] ?> </p>
  </div>
  <?php
                              }
                          } else {
                              ?>
                          <p class="hero-3"> <?php echo "No reviews have been written yet for this hero. Be the first one to do so by writing one now!"; ?> </p> <?php
                          } ?>
</div>
<?php
                      }
                  } else {
                      ?>
                    <h2> <?php echo "Please select a superhero." ?></h2> <?php
                  } ?>
		</div>

	</div>
	<?php include 'inc/Footer.php'; ?>
</body>
</html>
