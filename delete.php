<?php

require "index.php";

if(isset($_POST['id']) && empty($_POST['id']) == false) {

    $id = ($_POST['id']);

    $stmt = "DELETE FROM comentarios WHERE id = '$id'";
    $conn->query($stmt);

    header("Location: index.php");


} else {
    header("Location: index.php");
}

