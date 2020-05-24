<?php
  ob_start();
  include('header.php');
  include('../Files/PDO/dbcon.php');
  session_start();
  $data=$_SESSION['Userdata'];
  $cid = $data["COMPANY_ID"];
  $cname= $data["COMPANY_NAME"];
?>

<div class="content-wrapper header-info">
      <div class="page-title">
      <div class="row">
          <div class="col-md-6">
            <h3 class="mb-15 text-white">Welcome Back, <?php echo $cname; ?>! </h3><span class="mb-10 mb-md-30 text-white d-block">A something new is about to happen.</span>
          </div>
          <div class="col-md-6">
          <div class="card">
            <div class="btn-group info-drop header-info-button">
              </div>
            </div>
           </div>
          </div>
        </div>
      <!-- widgets -->
      <div class="mb-30">
           <div class="card h-100 ">
           <div class="card-body h-100">
             <h4 class="card-title">Title</h4>
             <!-- action group -->
             <div class="scrollbar">
              <ul class="list-unstyled">
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                      <?php
                        $id_count=sizeof($_SESSION['req']);
                        $ids=$_SESSION['req'];
                        $i=1;
                        foreach ($ids as $a) {
                          if ($i<$id_count) {
                            $stmt=$con->prepare("CALL GET_STUDENT_DETAILS(:sid)");
                            $stmt->bindParam(":sid",$a);
                            $stmt->execute();
                            $stmt=$con->prepare("CALL GET_STUDENT_DETAILS(:sid)");
                            $stmt->bindParam(":sid",$a);
                            $stmt->execute();
                            $x=$stmt->fetch(PDO::FETCH_ASSOC);
                            ?>
                              <div class="row">
                                <label for="" class="m-2 mt-3 col-2"><?php echo $x['STUDENT_ENROLLMENT_NUMBER']; ?></label>
                                <label for="" class="m-2 mt-3 col-2"><?php echo $x['STUDENT_FIRST_NAME']." ".$x['STUDENT_LAST_NAME']; ?></label>
                                <input type="text" name="<?php echo $x['STUDENT_ID']; ?>" class="col-6 m-2 form-control">
                              </div>
                            <?php 
                          }
                          $i++;
                        }
                      ?>
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
?>
