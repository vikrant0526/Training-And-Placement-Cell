<?php
   ob_start();
   include('header.php');
   $data=$_SESSION['Userdata'];
   $cid = $data["COMPANY_ID"];
   $cname= $data["COMPANY_NAME"];
   include('../Files/PDO/dbcon.php');
   $selection_list_id=$_GET["sid"];
   $_SESSION["selection_list_id"]=$_GET["sid"]; 
?>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
   <div class="content-wrapper header-info">
      <!-- widgets -->
      <div class="mb-30">
           <div class="card h-100 ">
           <div class="card-body h-100">
             <h4 class="card-title">Add Student</h4>
             <!-- action group -->
             <div class="scrollbar">
              <ul class="list-unstyled">
                    <form action="#" method="Post">
                 <h5 class="mb-3">Select Event</h5>
               
                      <select class="form-control" id="ename" onchange="student_details()" name="event_name">
                        <option>Select Event</option>
                            <?php
                              $stmt1=$con->prepare("CALL GET_EVENT_BY_COMPANY(:cid);");
                              $stmt1->bindParam(":cid",$cid);  
                              $stmt1->execute();
                              $stmt1=$con->prepare("CALL GET_EVENT_BY_COMPANY(:cid);");
                              $stmt1->bindParam(":cid",$cid);  
                              $stmt1->execute();
                              while($eventdata = $stmt1->fetch(PDO::FETCH_ASSOC))
                              {
                            ?>
                              <option value="<?php echo $eventdata["EVENT_ID"]; ?>"><?php echo $eventdata["EVENT_NAME"]; ?></option>
                           <?php
                              } 
                            ?>
                       </select>
                     <br>
                      <li>
                        <div class="media">
                          <div class="media-body mb-2">
                            <div id="test"></div>
                          </div>
                        </div>
                      </li>
              </form>
              </ul>
             </div>
            </div>
          </div>
        </div>
        <script type="text/javascript">
          function student_details(){ 
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.open("GET","student_bind.php?eid="+document.getElementById("ename").value,false);
            xmlhttp.send(null);
            document.getElementById("test").innerHTML=xmlhttp.responseText;
        } 
        </script>
        

<?php 
  include('footer.php');
?>      

<script type="text/javascript">
        function get_click(clicked){
            if ($('#'+clicked).is(":checked")) {
                var val=$('#'+clicked).val();
                //alert("data checked");
                var xmlhttp=new XMLHttpRequest();
                xmlhttp.open("GET","Ex_student_add.php?sid="+val,false);
                xmlhttp.send(null);
            } else {
                var val=$('#'+clicked).val();
                var xmlhttp=new XMLHttpRequest();
                xmlhttp.open("GET","delete_stud.php?sid="+val,false);
                xmlhttp.send(null);
            }
        }


         function ins_click(clicked){
            if ($('#'+clicked).is(":checked")) {
                var val=$('#'+clicked).val();
                //alert('checked');
                var xmlhttp=new XMLHttpRequest();
                xmlhttp.open("GET","insert_stud.php?sid="+val,false);
                xmlhttp.send(null);
                //alert(xmlhttp.responseText);
            } else {
                var val=$('#'+clicked).val();
                //alert("unchecked");
                var xmlhttp=new XMLHttpRequest();
                xmlhttp.open("GET","delete_stud.php?sid="+val,false);
                xmlhttp.send(null);
                //alert(xmlhttp.responseText);
            }
        }
</script>


