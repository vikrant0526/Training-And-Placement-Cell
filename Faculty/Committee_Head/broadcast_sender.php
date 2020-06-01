<?php 
  ob_start();
  include('header.php');
  $data=$_SESSION['Userdata'];

  require '../../mail/PHPMailer-master/includes/PHPMailer.php';
  require '../../mail/PHPMailer-master/includes/SMTP.php';
  require '../../mail/PHPMailer-master/includes/Exception.php';
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  $blid = $_REQUEST['blid'];
  $msg_copy = $_REQUEST['editor'];

  include('../../Files/PDO/dbcon.php'); 
  $stmt=$con->prepare("CALL GET_BORADCAST_LIST(:blid);");
  $stmt->bindparam(":blid", $blid);
  $stmt->execute();
?>
<script src="../../Files/ckeditor/ckeditor.js"></script>
<!-- <script src="../../Files/ckeditor5/build/ckeditor.js"></script> -->
<div class="content-wrapper header-info">
    <!-- widgets -->
    <div class="mb-30">
        <div class="card h-100 ">
            <div class="card-body h-100">
                <h4 class="card-title">Send Broadcast</h4>
                <!-- action group -->
                <div class="scrollbar">
                    <ul class="list-unstyled">
                        <div id="sent_1">
                            <li>
                                <div class="media">
                                    <div class="media-body mb-2">
                                        <div id="sent_1"></div>
                                    </div>
                                </div>
                            </li>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php 
  include('footer.php');
  $cnt = 0;
  while ($data1 = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $cnt += 1;
    $msg = $_REQUEST['editor'];

    $msg = str_replace("@REP_NAME",$data1['COMPANY_HR_NAME'],$msg);
    $msg = str_replace("@CMPNY_NAME",$data1['COMPANY_NAME'],$msg);
    $msg = str_replace("@SENDER",$data['FACULTY_FIRST_NAME']." ".$data['FACULTY_LAST_NAME'],$msg);
    
    $email = $data1['COMPANY_EMAIL'];

    setcookie($cnt, $msg, time() + (10), "/");
    setcookie("subject".$cnt, $_REQUEST['subject'], time() + (10), "/");
    setcookie("email".$cnt, $data1['COMPANY_EMAIL'], time() + (10), "/");

    ?>
    <script type="text/javascript">
    function send() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "message_send.php?id=<?php echo $data1['COMPANY_ID']; ?>&cnt=<?php echo $cnt; ?>", false);
        xmlhttp.send(null);
        var i = <?php echo json_encode($cnt); ?>;
        var div_id = "sent_".concat(i);
        document.getElementById(div_id).innerHTML = xmlhttp.responseText;
    }
    send();
    </script>
    <?php
  }
?>