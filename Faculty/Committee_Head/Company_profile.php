<?php 
  ob_start();
  $cid = $_GET["cid"];
  include('header.php');
  $datafaculty=$_SESSION['Userdata'];
?>

<?php
                $count=0;
                include('../../Files/PDO/dbcon.php');
                $id=$_SESSION['lid'];
                $type=$_SESSION['lut'];
                $stmt=$con->prepare("CALL GET_COMPANY(:cid);");
                $stmt->bindparam(":cid",$cid);
                $stmt->execute();
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
?>

    <div class="content-wrapper header-info">
      <div class="page-title">
      <div class="row">
          <div class="col-md-6">
            <h3 class="mb-15 text-white"> Welcome back, <?php echo $datafaculty['FACULTY_FIRST_NAME']; ?>! </h3>
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

                    <div style="width: 125px;height: 125px; position: relative; overflow: hidden;border-radius: 50%;">
                                                <img src="../../Company/com_logo/<?php echo $data['COMPANY_LOGO']; ?>"  id="profileDisplay" style="display: block;margin: -5px auto;" class="w-100 h-100">
                                            </div>
               
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
             <h4 class="card-title">Profile Company View</h4>
             <!-- action group -->
             <div class="btn-group info-drop">
                <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item text-white" href="#"><i class="text-danger ti-trash"></i>Clear All</a>
                </div>
              </div>
             <div class="scrollbar">
              <ul class="list-unstyled">
              
                  <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <input type="text" name="cname" class="form-control" placeholder="Company Name" value="<?php echo $data["COMPANY_NAME"]; ?>" disabled>
                    </div>
                  </div>
                </li>
                 <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <input type="email" name="cemail" placeholder="Company Email" class="form-control" value="<?php echo $data["COMPANY_EMAIL"]; ?>" disabled>
                    </div>
                  </div>
                </li> 
                 <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <input type="text" name="cnum" class="form-control" placeholder="Company Phone number" value="<?php echo $data["COMPANY_PHONE_NUMBER_1"]; ?>" disabled>
                    </div>
                  </div>
                </li> 
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <div class="input-group date" id="datepicker-top-left">
                        <input name="creg" class="form-control" type="text" placeholder="Company Registered Year" value="<?php echo $data["COMPANY_REGISTERED_YEAR"]; ?>" disabled>
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
                      <input type="text" name="hrname" placeholder="HR Name" class="form-control" value="<?php echo $data["COMPANY_HR_NAME"]; ?>" disabled>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <input type="text" name="hrnum" class="form-control" placeholder="HR Phone number" value="<?php echo $data["COMPANY_PHONE_NUMBER_2"]; ?>" disabled>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <input type="email" name="hremail" placeholder="HR Email" class="form-control" value="<?php echo $data["COMPANY_HR_EMAIL"]; ?>" disabled>
                    </div>
                  </div>
                </li>
                 <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <input type="text" name="cweb" placeholder="Company Website" class="form-control" value="<?php echo $data["COMPANY_WEBSITE"]; ?>" disabled>
                    </div>
                  </div>
                </li>

                <!--This is for Profile Pic Update-->

                 <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <textarea name="cabout" rows="3" disabled placeholder="Something about yourself........" class="form-control"><?php echo $data["COMPANY_ABOUT"]; ?>
                      </textarea>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <textarea name="caddress" rows="3" disabled placeholder="Address" class="form-control"><?php echo $data["COMPANY_ADDRESS"]; ?>
                      </textarea>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <input type="text" name="cemp"  class="form-control" placeholder="No. of Employess in Company" value="<?php echo $data["COMPANY_NO_OF_EMPLOYEES"]; ?>" disabled>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <input type="text" name="cmax" class="form-control" placeholder="Company's Maximum Package" value="<?php echo $data["COMPANY_MAXIMUM_PACKAGE"]; ?>" disabled>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <input type="text" name="cmin" class="form-control" placeholder="Company's Minimum Package" value="<?php echo $data["COMPANY_MINIMUM_PACKAGE"]; ?>" disabled>
                    </div>
                  </div>
                </li>
              </form>
                 <!--select2-->
    <script src="../Files/assets/vendor/select2/js/select2.min.js"></script>
    <!--init select2-->
    <script src="../Files/assets/vendor/js-init/init-select2.js"></script>
<script type="text/javascript" >
        
        function course(){
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.open("GET","degreebind.php?dept="+document.getElementById("dept").value,false);
            xmlhttp.send(null);
            //alert(xmlhttp.responseText);  
            document.getElementById("degree").innerHTML=xmlhttp.responseText;
        }
    </script>
<?php 
  include('footer.php');
  ob_flush();
?>      