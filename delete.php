<?php

require "index.php";

if(isset($_GET['id']) && empty($_GET['id']) == false) {

    $id = ($_GET['id']);

    $stmt = "DELETE FROM comentarios WHERE id = '$id'";
    $conn->query($stmt);

    header("Location: index.php");


} else {
    header("Location: index.php");
}

