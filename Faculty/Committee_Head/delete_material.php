<?php
    include('../../Files/PDO/dbcon.php');	
    $did = $_GET["did"];
    $stmt=$con->prepare("CALL DELETE_MATERIAL(:did)");
    $stmt->bindparam(":did", $did);
    $stmt->execute();
    header("Location: view_material.php");
 ?>