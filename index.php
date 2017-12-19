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
				<p id="hero-desc1"> <?php echo $row['heroDescription']; ?></p> </br>
        <a href="index.php?heroId=<?php echo $row['heroId']; ?>">
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
                          <p class="hero-desc2"> <?php echo $row2['heroDescription']; ?></p>
                          <h3>Powers</h3>
                          <p class="hero-desc2"> <?php echo $row2['heroPower']; ?></p>
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
