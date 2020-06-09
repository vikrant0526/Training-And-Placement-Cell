<?php 
  ob_start();
  include('header.php');
  $data=$_SESSION['Userdata'];
  $_SESSION["broadcast_id"]=0;
?>

<?php
      include('../../Files/PDO/dbcon.php'); 
      $stmt=$con->prepare("CALL VIEW_COMPANY();");
      $stmt->execute();
  ?>

<div class="content-wrapper header-info">
    <!-- widgets -->
    <div class="mb-30">
        <div class="card h-100">
            <div class="card-body h-100">
                <h4 class="card-title">Placement Schedule</h4>
                <!-- action group -->
                <ul class="list-unstyled">
                    <form action="generate_placement_scheduele.php" method="post">
                        <li>
                            <table class="table text-dark table-responsive" style="table-layout: fixed;width: 100%;">
                                <tr class="font-weight-bold">
                                    <td></td>
                                    <td></td>
                                    <td>Name</td>
                                    <td>Email</td>
                                    <td>Phone Number</td>
                                    <td>Contact Person(CP)</td>
                                    <td>CP Email</td>
                                    <td>CP Phone Number</td>
                                    <td>Address</td>
                                    <td>Website</td>
                                </tr>
                                <?php 
                                $cnt=0;
                                $c=0;
                                while($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $cid=$data['COMPANY_ID'];
                                $check = 0;
                                $stmt3=$con->prepare("CALL GET_PLACEMENT_SCHEDULE_LIST()");
                                $stmt3->execute();
                                $stmt3=$con->prepare("CALL GET_PLACEMENT_SCHEDULE_LIST()");
                                $stmt3->execute();
                                
                                while ($y=$stmt3->fetch(PDO::FETCH_ASSOC)) {
                                    $b_cid=$y['COMPANY_ID'];
                                    if ($b_cid==$cid) {
                                        $check = 1;
                                        break;
                                    }
                                }
                                if ($check==1) {
                                    ?>
                                <tr>
                                    <td><input type="checkbox" id="company_check<?php echo $cid;?>"
                                            name="<?php echo $cid;?>" value="<?php echo $cid;?>"
                                            onClick="company_check_evnt(this.id)" checked></td>
                                    <td>
                                        <div style="height: 35px;width: 35px;border-radius: 50%;">
                                            <img src="../../Company/com_logo/<?php echo $data['COMPANY_LOGO'] ?>"
                                                alt="avatar" style="height: 100%;width: 100%;">
                                        </div>
                                    </td>
                                    <td><?php echo $data['COMPANY_NAME']; ?></td>
                                    <td><?php echo $data['COMPANY_EMAIL']; ?></td>
                                    <td><?php echo $data['COMPANY_PHONE_NUMBER_1']; ?></td>
                                    <td><?php echo $data['COMPANY_HR_NAME']; ?></td>
                                    <td><?php echo $data['COMPANY_HR_EMAIL']; ?></td>
                                    <td><?php echo $data['COMPANY_PHONE_NUMBER_2']; ?></td>
                                    <td><?php echo $data['COMPANY_ADDRESS']; ?></td>
                                    <td><?php echo $data['COMPANY_WEBSITE']; ?></td>
                                </tr>
                                <?php
                                $cnt+=1; 
                            }
                            else
                            {
                            ?>
                                <tr>
                                    <td><input type="checkbox" id="company_uncheck<?php echo $cid;?>"
                                            name="<?php echo $cid;?>" value="<?php echo $cid;?>"
                                            onClick="company_uncheck_evnt(this.id)"></td>
                                    <td>
                                        <div style="height: 35px;width: 35px;border-radius: 50%;">
                                            <img src="../../Company/com_logo/<?php echo $data['COMPANY_LOGO'] ?>"
                                                alt="avatar" style="height: 100%;width: 100%;">
                                        </div>
                                    </td>
                                    <td><?php echo $data['COMPANY_NAME']; ?></td>
                                    <td><?php echo $data['COMPANY_EMAIL']; ?></td>
                                    <td><?php echo $data['COMPANY_PHONE_NUMBER_1']; ?></td>
                                    <td><?php echo $data['COMPANY_HR_NAME']; ?></td>
                                    <td><?php echo $data['COMPANY_HR_EMAIL']; ?></td>
                                    <td><?php echo $data['COMPANY_PHONE_NUMBER_2']; ?></td>
                                    <td><?php echo $data['COMPANY_ADDRESS']; ?></td>
                                    <td><?php echo $data['COMPANY_WEBSITE']; ?></td>
                                </tr>
                                <?php
                            $c+=1;
                        }
                    } 
                   ?>
                            </table>
                        </li>
                        <li>
                            <div class="media">
                                <div class="media-body mb-2">
                                    <div class="input-group date" id="datepicker-top-left">
                                        <input name="sdate" class="form-control" type="text" placeholder="Event Date">
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
                                    <input type="text" name="gap" class="form-control"
                                        placeholder="No of Days Per Company">
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="media">
                                <div class="media-body mb-2">
                                    <input type="submit" name="submit" value="Generate Schedule"
                                        class="button button-border x-small">
                                </div>
                            </div>
                            </il>
                    </form>
                </ul>
            </div>
        </div>
    </div>
    <?php 
  include('footer.php');
  ob_flush();
?>
    <script type="text/javascript">
    function company_check_evnt(clicked) {
        if ($('#' + clicked).is(":checked")) {
            var val = $('#' + clicked).val();
            // alert("uncheck" + val);
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "Ex_company_add.php?cid=" + val, false);
            xmlhttp.send(null);
        } else {
            var val = $('#' + clicked).val();
            // alert(val);
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "delete_company.php?cid=" + val, false);
            xmlhttp.send(null);
        }
    }


    function company_uncheck_evnt(clicked) {
        if ($('#' + clicked).is(":checked")) {
            var val = $('#' + clicked).val();
            // alert("check" + val);
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "insert_company.php?cid=" + val, false);
            xmlhttp.send(null);
            //alert(xmlhttp.responseText);
        } else {
            var val = $('#' + clicked).val();
            // alert(val);
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "delete_company.php?cid=" + val, false);
            xmlhttp.send(null);
            //alert(xmlhttp.responseText);
        }
    }
    </script>