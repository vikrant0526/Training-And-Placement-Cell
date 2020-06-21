<?php 
  ob_start();
  include('header.php');
  $data=$_SESSION['Userdata'];
?>
  <script>
    function isInputNumber(evt) {

        var ch = String.fromCharCode(evt.which);

        if (!(/[0-9]/.test(ch))) {
            evt.preventDefault();
        }

    }

    
    function isInputChar(evt) {

        var ch = String.fromCharCode(evt.which);

        if (!(/[A-Za-z]/.test(ch))) {
            evt.preventDefault();
        }

    }

    function isInputCharSpace(evt) {

        var ch = String.fromCharCode(evt.which);

        if (!(/^[a-zA-Z ]*$/.test(ch))) {
            evt.preventDefault();
        }

    }
  </script>
  <div class="content-wrapper header-info">
        <form action="#" method="POST" enctype="multipart/form-data">
      <!-- widgets -->
      <div class="mb-30">
           <div class="card h-100 ">
           <div class="card-body h-100">
             <h4 class="card-title">Profile Update</h4>
             <!-- action group -->
             <div class="btn-group info-drop">
                <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item text-white" href="#"><i class="text-danger ti-trash"></i>Clear All</a>
                </div>
              </div>
             <div class="scrollbar">
              <ul class="list-unstyled">
                <?php
                $count=0;
                include('../Files/PDO/dbcon.php');
                $id=$_SESSION['lid'];
                $type=$_SESSION['lut'];
                $stmt=$con->prepare("CALL GET_COMPANY(:cid);");
                $stmt->bindparam(":cid",$id);
                $stmt->execute();
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
              ?>
                  <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <input type="text" name="cname" maxlength="30" class="form-control" placeholder="Company Name" value="<?php echo $data["COMPANY_NAME"]; ?>">
                    </div>
                  </div>
                </li>
                 <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <input type="email" name="cemail" maxlength="255" pattern=(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])
                      placeholder="Company Email"  class="form-control" value="<?php echo $data["COMPANY_EMAIL"]; ?>">
                    </div>
                  </div>
                </li> 
                 <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <input type="text" name="cnum" onkeyup="check1(); return false;" id="mobile1" maxlength="10" onkeypress="isInputNumber(event)" class="form-control" placeholder="Company Phone number" value="<?php echo $data["COMPANY_PHONE_NUMBER_1"]; ?>">
                      <span id="message1"></span>
                    </div>
                  </div>
                </li> 
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                        <input type="text" name="creg" class="form-control" maxlength="4" onkeypress="isInputNumber(event)" type="text" placeholder="Company Registered Year" value="<?php echo $data["COMPANY_REGISTERED_YEAR"]; ?>">
                    </div>
                  </div>
                </li>  
                 <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <input type="text" name="hrname" placeholder="HR Name" onkeypress="isInputCharSpace(event)" maxlength="50" class="form-control" value="<?php echo $data["COMPANY_HR_NAME"]; ?>">
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <input type="text" name="hrnum" id="mobile" onkeyup="check(); return false;" maxlength="10" onkeypress="isInputNumber(event)" class="form-control" placeholder="HR Phone number" value="<?php echo $data["COMPANY_PHONE_NUMBER_2"]; ?>">
                      <span id="message"></span>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <input type="email" name="hremail" pattern=(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])
                      maxlength="255" placeholder="HR Email" class="form-control" value="<?php echo $data["COMPANY_HR_EMAIL"]; ?>">
                    </div>
                  </div>
                </li>
                 <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <input type="url" maxlength="100" name="cweb" placeholder="https: or http:/www.yourcompanywebsite.domains" class="form-control" value="<?php echo $data["COMPANY_WEBSITE"]; ?>">
                    </div>
                  </div>
                </li>
                 <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <textarea name="cabout" rows="3" placeholder="Something about yourself........" class="form-control"><?php echo $data["COMPANY_ABOUT"]; ?>
                      </textarea>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <textarea name="caddress" rows="3" placeholder="Address" class="form-control"><?php echo $data["COMPANY_ADDRESS"]; ?>
                      </textarea>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <input type="text" name="cemp" onkeypress="isInputNumber(event)" class="form-control" placeholder="No. of Employess in Company" value="<?php echo $data["COMPANY_NO_OF_EMPLOYEES"]; ?>">
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <input type="text" name="cmax" id="maxval" minlength="5" onkeyup="packagecheck(); return false;" onkeypress="isInputNumber(event)" class="form-control" placeholder="Company's Maximum Package" value="<?php echo $data["COMPANY_MAXIMUM_PACKAGE"]; ?>">
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <input type="text" name="cmin" id="minval" minlength="5" onkeyup="packagecheck(); return false;" onkeypress="isInputNumber(event)" class="form-control" placeholder="Company's Minimum Package" value="<?php echo $data["COMPANY_MINIMUM_PACKAGE"]; ?>">
                      <span id="packagemessage"></span>
                    </div>
                  </div>
                </li>
                <li class="">
                        <div class="media">
                          <div class="media-body">
                            <center>
                               <input type="submit" name="Update" id="submit" value="Update" class="btn btn-xs btn-outline-warning ml-2 mb-2">
                               <div>
                                 <hr style="border-top: 1px solid #495057">
                               </div>
                          </center>      
                          </div>
                        </div>
                      </li>   
              </form>
                 <!--select2-->
    <script src="../Files/assets/vendor/select2/js/select2.min.js"></script>
    <!--init select2-->
    <script src="../Files/assets/vendor/js-init/init-select2.js"></script>
<script type="text/javascript" >
        function triggerClick() {
            document.querySelector('#profileImage').click();
        }
        function displayImage(e) {
                if(e.files[0]){
                var reader = new FileReader();

                reader.onload = function(e){
                    document.querySelector('#profileDisplay').setAttribute('src',e.target.result);
                }
                reader.readAsDataURL(e.files[0]);
            }
              /*var img_data=document.getElementById('profileImage').value;
              img_data=img_data.split('\\');
              var xmlhttp=new XMLHttpRequest();
              xmlhttp.open("GET","update_dp.php?a="+img_data[0]+"&b="+img_data[1]+"&c="+img_data[2],false);
              xmlhttp.send(null);
              */document.getElementById('vikTest').innerHTML=xmlhttp.responseText;
            
        }
        
        function course(){
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.open("GET","degreebind.php?dept="+document.getElementById("dept").value,false);
            xmlhttp.send(null);
            //alert(xmlhttp.responseText);  
            document.getElementById("degree").innerHTML=xmlhttp.responseText;
        }
        function check()
    {
        // alert("ff");
        var pass1 = document.getElementById('mobile');
        var message = document.getElementById('message');
        var badColor = "#84BA3F";
        if(mobile.value.length!=10){
            // alert("ffrr");
            message.style.color = badColor;
            message.innerHTML = "required 10 digits, match requested format!"
        }    
        if(mobile.value.length=='10'){
            message.style.color = badColor;
            message.innerHTML = ""
        }
    }


    function check1()
    {
        var pass1 = document.getElementById('mobile1');
        var message = document.getElementById('message1');
        var badColor = "#84BA3F";
        if(mobile1.value.length!=10){
            message.style.color = badColor;
            message.innerHTML = "required 10 digits, match requested format!"
        }    
        if(mobile1.value.length=='10'){
            message.style.color = badColor;
            message.innerHTML = ""
        }
    }

    
    function packagecheck()
    {
        // alert("This");
        var min = document.getElementById('minval');
        var max = document.getElementById('maxval');
        var message = document.getElementById('packagemessage');
        var badColor = "#84BA3F";
        if(parseInt(min.value) > parseInt(max.value)){
            // alert('This if');    
            message.style.color = badColor;
            message.innerHTML = "Min Package must be less than Max Package";
        }else{
            message.style.color = badColor;
            message.innerHTML = "";
        }    
    }
    </script>

<?php 

  if(isset($_REQUEST['Update']))
  {
    $cid=$data["COMPANY_ID"]; 
    $cname=$_REQUEST["cname"];
    $cnum=$_REQUEST["cnum"];
    $creg=$_REQUEST["creg"];
    $caddress=$_REQUEST["caddress"];
    $cemail=$_REQUEST["cemail"];
    $cweb=$_REQUEST["cweb"];
    $cabout=$_REQUEST["cabout"];
    $cemp=$_REQUEST["cemp"];
    $cmax=$_REQUEST["cmax"];
    $cmin=$_REQUEST["cmin"];
    $hrname=$_REQUEST["hrname"];
    $hrnum=$_REQUEST["hrnum"];
    $hremail=$_REQUEST["hremail"];
    $fdate=strtotime($creg);
    $creg=date('Y-m-d',$fdate); 
    $ppic="This";
    $imgname=$data['COMPANY_LOGO'];



    $company_email = $data["COMPANY_EMAIL"];
    $company_pnum = $data["COMPANY_PHONE_NUMBER_1"];


    $stmt=$con->prepare("CALL CHECK_USER(:email)");
    $stmt->bindParam(':email',$cemail);
    $stmt->execute();
    $rowsdata = $stmt->fetch(PDO::FETCH_ASSOC);
    $email_user="";
    if(isset($rowsdata)){
    $email_user = $rowsdata['LOGIN_USER_EMAIL'];
    }
    

    $stmt1=$con->prepare("CALL CHECK_USER_PHONE(:pnum)");
    $stmt1->bindParam(':pnum',$cnum);
    $stmt1->execute();
    $stmt1=$con->prepare("CALL CHECK_USER_PHONE(:pnum)");
    $stmt1->bindParam(':pnum',$cnum);
    $stmt1->execute();
    $rowsdata1 = $stmt1->fetch(PDO::FETCH_ASSOC);
    $phone_user="";
    if(isset($rowsdata1)){
    $phone_user = $rowsdata1['LOGIN_USER_PHONE_NUMBER'];
    }
  

    if($email_user == $cemail && $company_email != $cemail){
      echo "<script>alert('Email Exist')</script>";      
    }elseif($phone_user == $cnum && $company_pnum != $cnum){
      echo "<script>alert('Phone Number Exist')</script>";      
    }else{
      $stmt=$con->prepare("CALL UPDATE_COMPANY_PROFILE(:cid,:cname,:creg,:caddress,:cweb,:cabout,:cemp,:cmax,:cmin,:hrname,:hremail,:cemail,:cnum,:hrnum)");
      $stmt->bindParam(":cid",$cid);
      $stmt->bindParam(":cname",$cname);
      $stmt->bindParam(":creg",$creg);
      $stmt->bindParam(":caddress",$caddress);
      $stmt->bindParam(":cweb",$cweb);
      $stmt->bindParam(":cabout",$cabout);
      $stmt->bindParam(":cemp",$cemp);
      $stmt->bindParam(":cmax",$cmax);
      $stmt->bindParam(":cmin",$cmin);
      $stmt->bindParam(":hrname",$hrname);
      $stmt->bindParam(":hremail",$hremail);
      $stmt->bindParam(":cemail",$cemail);
      $stmt->bindParam(":cnum",$cnum);
      $stmt->bindParam(":hrnum",$hrnum);
      $stmt->execute();
      header('Refresh:0');
      
      $stmt5=$con->prepare("CALL GET_COMPANY(:cid);");
      $stmt5->bindparam(":cid",$cid);
      $stmt5->execute();
      $stmt5=$con->prepare("CALL GET_COMPANY(:cid);");
      $stmt5->bindparam(":cid",$cid);
      $stmt5->execute();
      $companydata = $stmt5->fetch(PDO::FETCH_ASSOC);
      $_SESSION['Userdata'] = $companydata;
    }
  }
 ?>
<?php 
  include('footer.php');
  ob_flush();
?>      