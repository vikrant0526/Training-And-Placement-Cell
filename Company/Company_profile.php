<?php 
  ob_start();
  include('header.php');
  $data=$_SESSION['Userdata'];
?>
<!--=================================
 Main content -->

 <!--=================================
wrapper -->
    <div class="content-wrapper header-info">
      <div class="page-title">
      <div class="row">
          <div class="col-md-6">
            <h3 class="mb-15 text-white"> Welcome back, <?php echo $data['COMPANY_NAME']; ?>! </h3>
            <span class="mb-10 mb-md-30 text-white d-block">Hope you are having a good day.</span>
          </div>
          <div class="col-md-6">
          <div class="card">
            </div>
           </div>
          </div>
        </div>
                    <form action="#" method="POST" enctype="multipart/form-data">
        <div class="row">
        <div class="col-lg-12 mb-30">
          <div class="card">
            <div class="card-body">
              <div class="user-bg" style="background: url(../Files/assets/images/user-bg.jpg);">
                <div class="user-info">
                  <div class="row">
                    <div class="col-lg-6 align-self-center">
                     
                    <div id="vikTest"></div>
                    <!-- <div class="col-lg-6 text-right align-self-center">
                        <button type="button" class="btn btn-sm btn-danger"><i class="ti-user pr-1"></i>Follow</button>
                        <button type="button" class="btn btn-sm btn-success"><i class="ti-email pr-1"></i>Message</button>
                    </div> -->  
                  </div>              
                </div>              
              </div>
            </div>
          </div>
        </div>
      </div>
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
                      <input type="text" name="cname" class="form-control" placeholder="Company Name" value="<?php echo $data["COMPANY_NAME"]; ?>">
                    </div>
                  </div>
                </li>
                 <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <input type="email" name="cemail" placeholder="Company Email" class="form-control" value="<?php echo $data["COMPANY_EMAIL"]; ?>">
                    </div>
                  </div>
                </li> 
                 <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <input type="text" name="cnum" class="form-control" placeholder="Company Phone number" value="<?php echo $data["COMPANY_PHONE_NUMBER_1"]; ?>">
                    </div>
                  </div>
                </li> 
                <!-- <li>

                  <div class="media">
                    <div class="media-body mb-2">
                        <select class="form-control select2-hidden-accessible" style="width: 100%" id="option_s3" name="param[]" multiple="" required="">
                            <optgroup label="Desktop Software">
                                <option value="CShrap">C#(.net)</option>
                                <option value="Java">JAVA</option>
                                <option value="C+">C++</option> 
                                <option value="Python">Python</option> 
                            </optgroup>
                            <optgroup label="Website">
                                <option value="php">PHP</option>
                                <option value="nodejs">Node JS</option>
                                <option value="angjs">Angular JS</option>
                                <option value="ruby">Ruby</option>
                                <option value="django">Django</option>
                                <option value="mj">Magento</option>
                            </optgroup>
                            <optgroup label="Mobile App">
                                <option value="Android">Android(Java)(Kotlin)</option>
                                <option value="IOS">IOS(Swift)</option>
                            </optgroup>
                            <optgroup label="Others">
                                <option value="wp">Wordpress</option>
                                <option value="laravel">Laravel(PHP)</option>
                                <option value="CakePHP">CakePHP</option>
                                <option value="CodeIgniter">CodeIgniter</option>
                            </optgroup>
                        </select>
                    </div>
                  </div>
                </li> -->
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <div class="input-group date" id="datepicker-top-left">
                        <input name="creg" class="form-control" type="text" placeholder="Company Registered Year" value="<?php echo $data["COMPANY_REGISTERED_YEAR"]; ?>">
                        <span class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </span>
                    </div>
                    </div>
                  </div>
                </li>  
                 <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <input type="text" name="hrname" placeholder="HR Name" class="form-control" value="<?php echo $data["COMPANY_HR_NAME"]; ?>">
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <input type="text" name="hrnum" class="form-control" placeholder="HR Phone number" value="<?php echo $data["COMPANY_PHONE_NUMBER_2"]; ?>">
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <input type="email" name="hremail" placeholder="HR Email" class="form-control" value="<?php echo $data["COMPANY_HR_EMAIL"]; ?>">
                    </div>
                  </div>
                </li>
                 <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <input type="text" name="cweb" placeholder="Company Website" class="form-control" value="<?php echo $data["COMPANY_WEBSITE"]; ?>">
                    </div>
                  </div>
                </li>

                <!--This is for Profile Pic Update-->

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
                      <input type="text" name="cemp" class="form-control" placeholder="No. of Employess in Company" value="<?php echo $data["COMPANY_NO_OF_EMPLOYEES"]; ?>">
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <input type="text" name="cmax" class="form-control" placeholder="Company's Maximum Package" value="<?php echo $data["COMPANY_MAXIMUM_PACKAGE"]; ?>">
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <input type="text" name="cmin" class="form-control" placeholder="Company's Minimum Package" value="<?php echo $data["COMPANY_MINIMUM_PACKAGE"]; ?>">
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
    // print_r($stmt->errorinfo());
    if($stmt == TRUE){
      echo "<script>alert('Update Company Data')</script>";
    }else{
      echo "<script>alert('Company Data Not Update')</script>";
    }

   // print_r($stmt->errorinfo());

    // $stmt1=$con->prepare("CALL SELECT_COMPANY_PROFILE(:cid)");
    // $stmt1->bindParam(":cid",$cid);
    // $stmt1=$con->prepare("CALL SELECT_COMPANY_PROFILE(:cid)");
    // $stmt1->bindParam(":cid",$cid);
    // $stmt1->execute();
    // $userdata = $stmt1->fetch(PDO::FETCH_ASSOC);
    // $_SESSION["Userdata"]=$userdata;
    // // header("sendback.php");
    // header("Refresh: 0");
  }
 ?>
<?php 
  include('footer.php');
  ob_flush();
?>      