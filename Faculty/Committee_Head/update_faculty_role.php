    <?php
    $fid = $_GET["fid"];
    $frole = $_GET["frole"];
    include('../../Files/PDO/dbcon.php');
    $stmt=$con->prepare("CALL UPDATE_FACULTY_ROLE(:fid,:frole)");
    $stmt->bindparam(":fid",$fid);
    $stmt->bindparam(":frole",$frole);
    $stmt->execute();
    header("location: view_faculty_profile.php?fid=$fid");
?>