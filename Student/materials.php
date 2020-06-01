<?php 
  ob_start();
  include('header.php');
  $userdata=$_SESSION['Userdata'];
  $bid=$userdata['STUDENT_BATCH_ID'];
    include('../Files/PDO/dbcon.php');	
    $stmt=$con->prepare("CALL GET_BATCH_INFO(:bid)");
    $stmt->bindparam(":bid", $bid);
    $stmt->execute();
    $batch=$stmt->fetch(PDO::FETCH_ASSOC);
    // print_r($batch);
    $dept=$batch['BATCH_DEPARTMENT'];
    $degree=$batch['BATCH_DEGREE'];
    $stmt2=$con->prepare("CALL VIEW_DOCUMENTS(:dept,:degree)");
    $stmt2->bindparam(":dept", $dept);
    $stmt2->bindparam(":degree", $degree);
    $stmt2->execute();
    $stmt2=$con->prepare("CALL VIEW_DOCUMENTS(:dept,:degree)");
    $stmt2->bindparam(":dept", $dept);
    $stmt2->bindparam(":degree", $degree);
    $stmt2->execute();
    // print_r($stmt2->errorinfo());
?>


<div class="content-wrapper header-info">
    <div class="page-title">
        <div class="row">
            <div class="col-md-6">
                <h3 class="mb-15 text-white"> Welcome back, <?php echo $userdata['STUDENT_FIRST_NAME']; ?>! </h3>
                <span class="mb-10 mb-md-30 text-white d-block">Hope you are having a good day.</span>
            </div>
            <div class="col-md-6">
                <div class="card">
                </div>
            </div>
        </div>
    </div>
    <!-- widgets -->
    <div class="mb-30">
        <div class="card h-100 ">
            <div class="card-body h-100">
                <h4 class="card-title">Notifications</h4>
                <!-- action group -->
                <div class="btn-group info-drop">
                    <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item text-white" href="#"><i class="text-danger ti-trash"></i>Clear All</a>
                    </div>
                </div>
                <div class="scrollbar">
                    <ul class="list-unstyled">
                        <li class="">
                            <div class="media">
                                <div class="media-body">
                                    <table class="table text-dark table-responsive" style="table-layout: fixed;width: 100%;">
                                        <tr class="font-weight-bold">
                                            <td>Document Title</td>
                                            <td>Document Type</td>
                                            <td>Document Name</td>
                                        </tr>
                                        <?php while($x = $stmt2->fetch(PDO::FETCH_ASSOC)) {

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
                                            <td><a href="../Faculty/Committee_Head/MATERIAL/<?php echo $x['DOCUMENT_NAME']; ?>" download><button class="btn btn-outline-warning"><i class="fa fa-download"></i>Download</button></a></td>
                                        </tr>
                                        <?php } ?>
                                    </table>
                                    </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php 
  include('footer.php');
  ob_flush();
?>