<?php include 'inc/Connection.php';

if (isset($_GET['teamId'])) {
    $teamId = $_GET['teamId'];
    $sql ="SELECT * FROM hero Where teamId='".$teamId."'";
} else {
    $sql ="SELECT * FROM hero where teamId=1";
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
				<p id="hero-desc"> <?php echo $row['heroDescription']; ?></p>
			</div>
			<?php
                            }
                        } else {
                            echo "0 results";
                        } ?>
		</div>

		<div id="info-container">
		</div>

	</div>
	<?php include 'inc/Footer.php'; ?>
</body>
</html>
