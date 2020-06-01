<?php 
    include('../../Files/PDO/dbcon.php');	
    $dept=$_GET['dept'];
    $degree=$_GET['degree'];
    $stmt=$con->prepare("CALL VIEW_DOCUMENTS(:dept,:degree)");
    $stmt->bindparam(":dept", $dept);
    $stmt->bindparam(":degree", $degree);
    $stmt->execute();

?>
<table class="table text-dark table-responsive" style="table-layout: fixed;width: 100%;">
    <tr class="font-weight-bold">
        <td>Document Title</td>
        <td>Document Type</td>
        <td>Document Name</td>
    </tr>
    <?php while($x = $stmt->fetch(PDO::FETCH_ASSOC)) {

            if($x["DOCUMENT_TYPE"] == "PL"){
                $doc_type = "Practical List";
            }else if($x["DOCUMENT_TYPE"] == "RL"){
                $doc_type = "Referance Material";  
            }else if($x["DOCUMENT_TYPE"] == "SP"){
                $doc_type = "Sample Paper";  
            }

        ?>
    <tr>
        <td><?php echo $x["DOCUMENT_TITLE"]; ?></td>
        <td><?php echo $doc_type; ?></td>
        <td><a href="MATERIAL/<?php echo $x['DOCUMENT_NAME']; ?>" download><button class="btn btn-outline-warning"><i class="fa fa-download"></i>Download</button></a></td>
        <td><a href="delete_material.php?did=<?php echo $x['DOCUMENT_ID']; ?>"><button class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button></a></td>
    </tr>
    <?php } ?>
</table>