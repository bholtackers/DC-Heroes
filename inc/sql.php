<?php
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

if (isset($_GET['teamId'])) {
    $teamId = $_GET['teamId'];
    $sql6 ="SELECT * FROM team";
} else {
    $sql6 ="SELECT * FROM team where teamId=0";
}