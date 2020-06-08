<?php 
  ob_start();
  include('header.php');
  $data=$_SESSION['Userdata'];
  include('../../Files/PDO/dbcon.php'); 
  $stmt=$con->prepare("CALL VIEW_COMPANY();");
  $stmt->execute();
?>
<script src="../../Files/ckeditor/ckeditor.js"></script>
<!-- <script src="../../Files/ckeditor5/build/ckeditor.js"></script> -->
<div class="content-wrapper header-info">
    <!-- widgets -->
    <div class="mb-30">
        <div class="card h-100 ">
            <div class="card-body h-100">
                <h4 class="card-title">Send Recomendation</h4>
                <!-- action group -->
                <div class="scrollbar">
                    <ul class="list-unstyled">
                        <form action="#" method="POST">
                        <li>
                            <div class="media">
                                <div class="media-body mb-2">
                                    <select name="cid" class="form-control p-1 pl-3" id="cid" onchange="get_event()" autofocus>
                                        <option>Select Comapny</option>
                                        <?php 
                                            while ($x = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                    <option value="<?php echo $x['COMPANY_ID']; ?>"><?php echo $x['COMPANY_NAME']; ?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="media">
                                <div class="media-body mb-2">
                                    <select name="event" class="form-control p-1 pl-3" id="event" onchange="get_student()">
                                        <option>Select Event</option>
                                    </select>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="media">
                                <div class="media-body mb-2">
                                    <div id="student"></div>
                                </div>
                            </div>
                        </li>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php 
  include('footer.php');
?>
<script type="text/javascript">	
		function get_event(){
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.open("GET","get_company_event.php?cid="+document.getElementById("cid").value,false);
            xmlhttp.send(null);
            document.getElementById("event").innerHTML=xmlhttp.responseText;
        }
        function get_student(){ 
            var xmlhttp=new XMLHttpRequest();
            // alert(document.getElementById("event").value);
            xmlhttp.open("GET","student_bind.php?eid="+document.getElementById("event").value+"&"+"cid="+document.getElementById("cid").value,false);
            xmlhttp.send(null);
            // alert(xmlhttp.responseText);
            document.getElementById("student").innerHTML=xmlhttp.responseText;
        }
        </script>