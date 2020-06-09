<?php 
  ob_start();
  $fid = $_GET["fid"];
  include('header.php');
  $datahead=$_SESSION['Userdata'];
?>
     <?php
        $count=0;
        include('../../Files/PDO/dbcon.php');
        $id=$_SESSION['lid'];
        $type=$_SESSION['lut'];
        $stmt=$con->prepare("CALL GET_FACULTY(:fid)");
        $stmt->bindparam(":fid",$fid);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        ?>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>      
  <div class="content-wrapper header-info">
        <div class="row">
        <div class="col-lg-12 mb-30">
          <div class="card">
            <div class="card-body" oncontextmenu="return false;">
              <div class="user-bg" style="background: url(../Files/assets/images/user-bg.jpg);">
                <div class="user-info">
                  <div class="row">
                    <div class="col-lg-6 align-self-center">
                        <div style="width: 125px;height: 125px; position: relative; overflow: hidden;border-radius: 50%;">
                                                <img src="../img/<?php echo $data['FACULTY_PROFILE_PIC']; ?>" id="profileDisplay" style="display: block;margin: -5px auto;" class="w-100 h-100">

                                            </div>
                    </div>
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
             <h4 class="card-title">Faculty Profile</h4>
             <!-- action group -->
             <div class="btn-group info-drop">
                <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item text-white" href="#"><i class="text-danger ti-trash"></i>Clear All</a>
                </div>
              </div>
             <div class="scrollbar">
              <ul class="list-unstyled">
           
              <form action="#" method="POST">
              	  <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <label>First Name</label>
                    	<input type="text" name="fname" class="form-control" placeholder="First Name" value="<?php echo $data["FACULTY_FIRST_NAME"]; ?>" disabled>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <label>Last Name</label>
                    	<input type="text" name="lname" class="form-control" placeholder="Last Name" value="<?php echo $data["FACULTY_LAST_NAME"]; ?>" disabled>
                    </div>
                  </div>
                </li>
                <?php $gender = $data["FACULTY_GENDER"]; ?>
                <li>
					<?php if($gender == 'M'){ ?>
            <div class="row m-3">
          <label class="text-white">Gender&nbsp;: &nbsp;</label>
						Male
					</div>
					<?php }else{ ?>
					<div class="row m-3">
          <label class="text-white">Gender&nbsp;: &nbsp;</label>
            Female
					</div>
					<?php } ?>
                </li>  
                 <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    <label>Email</label>
                    	<input type="email" name="email" placeholder="Faculty email" class="form-control" value="<?php echo $data["FACULTY_EMAIL"]; ?>" disabled>
                    </div>
                  </div>
                </li>
                 <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    <label>Phone Number</label>
                    <input type="text" name="num" placeholder="Faculty Number" class="form-control" value="<?php echo $data["FACULTY_PHONE_NUMBER"]; ?>" disabled>
                    </div>
                  </div>
                </li>
                 <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <label>About</label>
                    	<textarea name="about" rows="3" placeholder="Something about yourself........" class="form-control" disabled><?php echo $data["FACULTY_ABOUT"]; ?>
                    	</textarea>
                    </div>
                  </div>
                </li>    
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                        <?php 
                            if ($data['FACULTY_ROLE'] == 'FC') {
                                ?>
                                    <select name="frole" onchange="update_role()" id="frole" class="form-control">
                                        <option value="FC" selected>Faculty</option>
                                        <option value="CM">Committee Member</option>
                                        <option value="CH">Committee Head</option>
                                    </select>
                                <?php
                            }elseif ($data['FACULTY_ROLE'] == 'CM') {
                                ?>
                                    <select name="frole" onchange="update_role()" id="frole" class="form-control">
                                        <option value="FC">Faculty</option>
                                        <option value="CM" selected>Committee Member</option>
                                        <option value="CH">Committee Head</option>
                                    </select>
                                <?php
                            }
                        ?>
                    </div>
                  </div>
                </li>   
              </form>         
<?php 
  include('footer.php');
  ob_flush();
?>      
<script>
    function update_role() {
        var frole = document.getElementById("frole").value;
        if (frole == 'CH') {
            var mypath="update_committee_head_role.php?fid=<?php echo $fid; ?>";
            window.location.href = mypath;
        }
        else{
            var mypath="update_faculty_role.php?fid=<?php echo $fid; ?>&frole="+frole;
            window.location.href = mypath;
        }
    }
</script>

<script language="JavaScript">
  window.onload = function() {
    document.addEventListener("contextmenu", function(e){
      e.preventDefault();
    }, false);
    document.addEventListener("keydown", function(e) {
    //document.onkeydown = function(e) {
      // "I" key
      if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
        disabledEvent(e);
      }
      // "J" key
      if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
        disabledEvent(e);
      }
      // "S" key + macOS
      if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
        disabledEvent(e);
      }
      // "U" key
      if (e.ctrlKey && e.keyCode == 85) {
        disabledEvent(e);
      }
      // "F12" key
      if (event.keyCode == 123) {
        disabledEvent(e);
      }
    }, false);
    function disabledEvent(e){
      if (e.stopPropagation){
        e.stopPropagation();
      } else if (window.event){
        window.event.cancelBubble = true;
      }
      e.preventDefault();
      return false;
    }
  };
</script>