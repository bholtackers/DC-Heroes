

<nav id="main-nav">
  <ul>
    <?php
                $result6 = $conn->query($sql6);

                if ($result6->num_rows > 0) {
                    while ($row6 = $result6->fetch_assoc()) {
                        ?>
    <li><a href="index.php?teamId=<?php echo $row6['teamId'] ?>"><?php echo $row6['teamName']?> - <?php echo $row6['teamMembers']?></a></li>
    <?php
                    }
                } else {
                    echo "Bamboozeled";
                } ?>
  </ul>
</nav>
