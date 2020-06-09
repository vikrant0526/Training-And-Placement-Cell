<?php 
  ob_start();
  include('header.php');
  $data=$_SESSION['Userdata'];
?>
<div class="content-wrapper header-info">
        <?php 
            include('../Files/PDO/dbcon.php');
            $bid = $data["STUDENT_BATCH_ID"];
            $sid = $data["STUDENT_ID"];
            $stmt=$con->prepare("CALL GET_BATCH_INFO(:bid);");
            $stmt->bindParam(":bid",$bid);  
            $stmt->execute();
            $datauser = $stmt->fetch(PDO::FETCH_ASSOC);
            $degree = $datauser["BATCH_DEGREE"];
            $d2d = $datauser["BATCH_D2D"];
            $type = $datauser["BATCH_TYPE"]; 
            //echo "<script>alert('$type,$d2d,$degree')</script>"; 
            $stmt1=$con->prepare("CALL GET_STUDENT_DIPACADEMIC_12TH(:sid);");
            $stmt1->bindParam(":sid",$sid);  
            $stmt1->execute();
            $stmt1=$con->prepare("CALL GET_STUDENT_DIPACADEMIC_12TH(:sid);");
            $stmt1->bindParam(":sid",$sid);  
            $stmt1->execute();
            //print_r($stmt1->errorinfo());
            $data5 = $stmt1->fetch(PDO::FETCH_ASSOC);
            $dipid = $data5["_DETAILS_DIPLOMA_ID"];
            $twid = $data5["_DETAILSACADEMIC_12TH_ID"];
      

            $stmt5=$con->prepare("CALL GET_STUDENT_RESUME(:sid)");
            $stmt5->bindParam(":sid",$sid);
            $stmt5=$con->prepare("CALL GET_STUDENT_RESUME(:sid)");
            $stmt5->bindParam(":sid",$sid);
            $stmt5->execute();
            // print_r($stmt5->errorinfo());
            $dataresume = $stmt5->fetch(PDO::FETCH_ASSOC);
            // print_r($dataresume);

              if($d2d == 1){
                      $stmt5=$con->prepare("CALL CHECK_RESUME_DETAILS(:sid);");
                      $stmt5->bindParam(":sid",$sid);
                      $stmt5->execute();
                      $stmt5=$con->prepare("CALL CHECK_RESUME_DETAILS(:sid);");
                      $stmt5->bindParam(":sid",$sid);
                      $stmt5->execute();
                      $data8 = $stmt5->fetch(PDO::FETCH_ASSOC);
                      if($data8["aid"] == NULL){
                                header('Location: _details.php');
                      }elseif($data8["rid"] == NULL){
                                header('Location: resume_details.php');
                      }else{
                          if(isset($dipid)){
                              if($type=="BA"){
                                       ?>
                                        <div class="mb-30">
                                        <div class="card h-100">
                                        <div class="card-body h-100">
                                            <h4 class="card-title">View Resume Details</h4>
                                            <!-- action group -->
                                            <ul class="list-unstyled">
                                            <li>
                                                    <table class="table text-dark table-responsive">
                                                        <tr>
                                                            <td class="text-nowrap">10TH BOARD</td>
                                                            <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_10TH_BOARD']; ?></td>
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">10TH SCHOOL</td>
                                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_10TH_SCHOOL']; ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">10TH PERCENTAGE</td>
                                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_10TH_PERCENTAGE']; ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">DIPLOMA UNIVERSITY</td>
                                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_DIPLOMA_UNIVERSITY']; ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">DIPLOMA INSTITUTE</td>
                                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_DIPLOMA_INSTITUTE']; ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">DIPLOMA SPECIALIZATION</td>
                                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_DIPLOMA_SPECIALIZATION']; ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">DIPLOMA SEM 1</td>
                                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_DIPLOMA_SEM_1']; ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">DIPLOMA SEM 2</td>
                                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_DIPLOMA_SEM_2']; ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">DIPLOMA SEM 3</td>
                                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_DIPLOMA_SEM_3']; ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">DIPLOMA SEM 4</td>
                                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_DIPLOMA_SEM_4']; ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">DIPLOMA SEM 5</td>
                                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_DIPLOMA_SEM_5']; ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">DIPLOMA SEM 6</td>
                                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_DIPLOMA_SEM_6']; ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">BACHELOR UNIVERSITY</td>
                                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_UNIVERSITY']; ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">BACHELOR INSTITUTE</td>
                                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_INSTITUTE']; ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">BACHELOR SPECIALIZATION</td>
                                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SPECIALIZATION']; ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">BACHELOR DEGREE</td>
                                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_DEGREE']; ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">BACHELOR SEM 1</td>
                                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_1']; ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">BACHELOR SEM 2</td>
                                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_2']; ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">BACHELOR SEM 3</td>
                                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_3']; ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">BACHELOR SEM 4</td>
                                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_4']; ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">BACHELOR SEM 5</td>
                                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_5']; ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">BACHELOR SEM 6</td>
                                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_6']; ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">TECHNICAL SKILLS</td>
                                                        <td class="text-nowrap"><?php $ts=$dataresume["RESUME_TECHNICAL_SKILLS"]; 
                                                                                        $ts1 = explode('#', $ts);
                                                                                        foreach ($ts1 as $value) {
                                                                                        echo $value."<br>"; }
                                                                    ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">PERSONAL SKILLS</td>
                                                        <td class="text-nowrap"><?php $ps=$dataresume["RESUME_PERSONAL_SKILLS"]; 
                                                                                        $ps1 = explode('#', $ps);
                                                                                        foreach ($ps1 as $value) { 
                                                                                        echo $value."<br>"; }
                                                                    ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">LANGUAGES</td>
                                                        <td class="text-nowrap"><?php $lun=$dataresume["RESUME_LANGUAGES"]; 
                                                                                        $l1 = explode('#', $lun);
                                                                                foreach ($l1 as $value) {
                                                                                        echo $value."<br>"; }
                                                                    ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">PROJECTS</td>
                                                        <td class="text-nowrap"><?php
                                                            $prj=$dataresume['RSEUME_PROJECTS'];
                                                            $prj=explode('#', $prj);
                                                            $a=0;
                                                            foreach ($prj as $prjs) {
                                                                $a+=1;
                                                            $prjs=explode(',', $prjs);
                                                            echo "($a) ".$prjs[0]."<br>";
                                                            echo $prjs[1]."<br>";
                                                            echo $prjs[2]."<br>";
                                                            } ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">ACHIVEMENTS</td>
                                                        <td class="text-nowrap"><?php 
                                                            $ra=$dataresume['RESUME_ACHIVEMENTS'];
                                                            $ra1=explode('#', $ra);
                                                            $a=0;
                                                            foreach ($ra1 as $value) {
                                                                $a+=1;
                                                        echo "($a) ".$value; }
                                                        ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">CARRIER OBJECTIVE</td>
                                                        <td class=""><?php echo $dataresume['RESUME_CARRIER_OBJECTIVE']; ?></td>                               
                                                        </tr>
                                                        </table>
                                                </li>
                                            </ul>
                                            </div>
                                        </div>
                                        </div>
                                    <?php  

                              }elseif ($type == "MA") {
                                ?>
                                <div class="mb-30">
                                <div class="card h-100">
                                <div class="card-body h-100">
                                    <h4 class="card-title">View Resume Details</h4>
                                    <!-- action group -->
                                    <ul class="list-unstyled">
                                    <li>
                                            <table class="table text-dark table-responsive">
                                                <tr>
                                                    <td class="text-nowrap">10TH BOARD</td>
                                                    <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_10TH_BOARD']; ?></td>
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">10TH SCHOOL</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_10TH_SCHOOL']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">10TH PERCENTAGE</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_10TH_PERCENTAGE']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">DIPLOMA UNIVERSITY</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_DIPLOMA_UNIVERSITY']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">DIPLOMA INSTITUTE</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_DIPLOMA_INSTITUTE']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">DIPLOMA SPECIALIZATION</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_DIPLOMA_SPECIALIZATION']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">DIPLOMA SEM 1</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_DIPLOMA_SEM_1']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">DIPLOMA SEM 2</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_DIPLOMA_SEM_2']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">DIPLOMA SEM 3</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_DIPLOMA_SEM_3']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">DIPLOMA SEM 4</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_DIPLOMA_SEM_4']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">DIPLOMA SEM 5</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_DIPLOMA_SEM_5']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">DIPLOMA SEM 6</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_DIPLOMA_SEM_6']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">BACHELOR UNIVERSITY</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_UNIVERSITY']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">BACHELOR INSTITUTE</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_INSTITUTE']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">BACHELOR SPECIALIZATION</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SPECIALIZATION']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">BACHELOR DEGREE</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_DEGREE']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">BACHELOR SEM 1</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_1']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">BACHELOR SEM 2</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_2']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">BACHELOR SEM 3</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_3']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">BACHELOR SEM 4</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_4']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">BACHELOR SEM 5</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_5']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">BACHELOR SEM 6</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_6']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">MASTER UNIVERSITY</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_MASTER_UNIVERSITY']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">MASTER INSTITUTE</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_MASTER_INSTITUTE']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">MASTER SPECIALIZATION</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_MASTER_SPECIALIZATION']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">MASTER SEM 1</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_MASTER_SEM_1']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">MASTER SEM 2</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_MASTER_SEM_2']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">MASTER SEM 3</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_MASTER_SEM_3']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">MASTER SEM 4</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_MASTER_SEM_4']; ?></td>
                                        
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">TECHNICAL SKILLS</td>
                                                <td class="text-nowrap"><?php $ts=$dataresume["RESUME_TECHNICAL_SKILLS"]; 
                                                                                $ts1 = explode('#', $ts);
                                                                                foreach ($ts1 as $value) {
                                                                                echo $value."<br>"; }
                                                            ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">PERSONAL SKILLS</td>
                                                <td class="text-nowrap"><?php $ps=$dataresume["RESUME_PERSONAL_SKILLS"]; 
                                                                                $ps1 = explode('#', $ps);
                                                                                foreach ($ps1 as $value) { 
                                                                                echo $value."<br>"; }
                                                            ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">LANGUAGES</td>
                                                <td class="text-nowrap"><?php $lun=$dataresume["RESUME_LANGUAGES"]; 
                                                                                $l1 = explode('#', $lun);
                                                                        foreach ($l1 as $value) {
                                                                                echo $value."<br>"; }
                                                            ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">PROJECTS</td>
                                                <td class="text-nowrap"><?php
                                                    $prj=$dataresume['RSEUME_PROJECTS'];
                                                    $prj=explode('#', $prj);
                                                    $a=0;
                                                    foreach ($prj as $prjs) {
                                                        $a+=1;
                                                    $prjs=explode(',', $prjs);
                                                    echo "($a) ".$prjs[0]."<br>";
                                                    echo $prjs[1]."<br>";
                                                    echo $prjs[2]."<br>";
                                                    } ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">ACHIVEMENTS</td>
                                                <td class="text-nowrap"><?php 
                                                    $ra=$dataresume['RESUME_ACHIVEMENTS'];
                                                    $ra1=explode('#', $ra);
                                                    $a=0;
                                                    foreach ($ra1 as $value) {
                                                        $a+=1;
                                                echo "($a) ".$value; }
                                                ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">CARRIER OBJECTIVE</td>
                                                <td class=""><?php echo $dataresume['RESUME_CARRIER_OBJECTIVE']; ?></td>                               
                                                </tr>
                                                </table>
                                        </li>
                                    </ul>
                                    </div>
                                </div>
                                </div>
                            <?php  
                              }
                          }elseif (isset($twid)) {
                              if($type=="BA"){
                                                ?>
                                        <div class="mb-30">
                                        <div class="card h-100">
                                        <div class="card-body h-100">
                                            <h4 class="card-title">View Resume Details</h4>
                                            <!-- action group -->
                                            <ul class="list-unstyled">
                                            <li>
                                                    <table class="table text-dark table-responsive">
                                                        <tr>
                                                            <td class="text-nowrap">10TH BOARD</td>
                                                            <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_10TH_BOARD']; ?></td>
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">10TH SCHOOL</td>
                                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_10TH_SCHOOL']; ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">10TH PERCENTAGE</td>
                                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_10TH_PERCENTAGE']; ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">12TH BOARD</td>
                                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_12TH_BOARD']; ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">12TH SCHOOL</td>
                                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_12TH_SCHOOL']; ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">12TH STREAM</td>
                                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_12TH_STREAM']; ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">12TH PERCENTAGE</td>
                                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_12TH_PERCENTAGE']; ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">BACHELOR UNIVERSITY</td>
                                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_UNIVERSITY']; ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">BACHELOR INSTITUTE</td>
                                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_INSTITUTE']; ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">BACHELOR SPECIALIZATION</td>
                                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SPECIALIZATION']; ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">BACHELOR DEGREE</td>
                                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_DEGREE']; ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">BACHELOR SEM 1</td>
                                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_1']; ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">BACHELOR SEM 2</td>
                                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_2']; ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">BACHELOR SEM 3</td>
                                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_3']; ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">BACHELOR SEM 4</td>
                                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_4']; ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">BACHELOR SEM 5</td>
                                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_5']; ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">BACHELOR SEM 6</td>
                                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_6']; ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">BACHELOR SEM 7</td>
                                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_7']; ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">BACHELOR SEM 8</td>
                                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_8']; ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">TECHNICAL SKILLS</td>
                                                        <td class="text-nowrap"><?php $ts=$dataresume["RESUME_TECHNICAL_SKILLS"]; 
                                                                                        $ts1 = explode('#', $ts);
                                                                                        foreach ($ts1 as $value) {
                                                                                        echo $value."<br>"; }
                                                                    ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">PERSONAL SKILLS</td>
                                                        <td class="text-nowrap"><?php $ps=$dataresume["RESUME_PERSONAL_SKILLS"]; 
                                                                                        $ps1 = explode('#', $ps);
                                                                                        foreach ($ps1 as $value) { 
                                                                                        echo $value."<br>"; }
                                                                    ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">LANGUAGES</td>
                                                        <td class="text-nowrap"><?php $lun=$dataresume["RESUME_LANGUAGES"]; 
                                                                                        $l1 = explode('#', $lun);
                                                                                foreach ($l1 as $value) {
                                                                                        echo $value."<br>"; }
                                                                    ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">PROJECTS</td>
                                                        <td class="text-nowrap"><?php
                                                            $prj=$dataresume['RSEUME_PROJECTS'];
                                                            $prj=explode('#', $prj);
                                                            $a=0;
                                                            foreach ($prj as $prjs) {
                                                                $a+=1;
                                                            $prjs=explode(',', $prjs);
                                                            echo "($a) ".$prjs[0]."<br>";
                                                            echo $prjs[1]."<br>";
                                                            echo $prjs[2]."<br>";
                                                            } ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">ACHIVEMENTS</td>
                                                        <td class="text-nowrap"><?php 
                                                            $ra=$dataresume['RESUME_ACHIVEMENTS'];
                                                            $ra1=explode('#', $ra);
                                                            $a=0;
                                                            foreach ($ra1 as $value) {
                                                                $a+=1;
                                                        echo "($a) ".$value; }
                                                        ?></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <td class="text-nowrap">CARRIER OBJECTIVE</td>
                                                        <td class=""><?php echo $dataresume['RESUME_CARRIER_OBJECTIVE']; ?></td>                               
                                                        </tr>
                                                        </table>
                                                </li>
                                            </ul>
                                            </div>
                                        </div>
                                        </div>
                                    <?php
                              }elseif ($type == "MA") {
                                ?>
                                <div class="mb-30">
                                <div class="card h-100">
                                <div class="card-body h-100">
                                    <h4 class="card-title">View Resume Details</h4>
                                    <!-- action group -->
                                    <ul class="list-unstyled">
                                    <li>
                                            <table class="table text-dark table-responsive">
                                                <tr>
                                                    <td class="text-nowrap">10TH BOARD</td>
                                                    <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_10TH_BOARD']; ?></td>
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">10TH SCHOOL</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_10TH_SCHOOL']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">10TH PERCENTAGE</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_10TH_PERCENTAGE']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">12TH BOARD</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_12TH_BOARD']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">12TH SCHOOL</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_12TH_SCHOOL']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">12TH STREAM</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_12TH_STREAM']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">12TH PERCENTAGE</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_12TH_PERCENTAGE']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">BACHELOR UNIVERSITY</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_UNIVERSITY']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">BACHELOR INSTITUTE</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_INSTITUTE']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">BACHELOR SPECIALIZATION</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SPECIALIZATION']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">BACHELOR DEGREE</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_DEGREE']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">BACHELOR SEM 1</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_1']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">BACHELOR SEM 2</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_2']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">BACHELOR SEM 3</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_3']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">BACHELOR SEM 4</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_4']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">BACHELOR SEM 5</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_5']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">BACHELOR SEM 6</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_6']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">BACHELOR SEM 7</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_7']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">BACHELOR SEM 8</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_8']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">MASTER UNIVERSITY</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_MASTER_UNIVERSITY']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">MASTER INSTITUTE</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_MASTER_INSTITUTE']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">MASTER SPECIALIZATION</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_MASTER_SPECIALIZATION']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">MASTER SEM 1</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_MASTER_SEM_1']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">MASTER SEM 2</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_MASTER_SEM_2']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">MASTER SEM 3</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_MASTER_SEM_3']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">MASTER SEM 4</td>
                                                <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_MASTER_SEM_4']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">TECHNICAL SKILLS</td>
                                                <td class="text-nowrap"><?php $ts=$dataresume["RESUME_TECHNICAL_SKILLS"]; 
                                                                                  $ts1 = explode('#', $ts);
                                                                                  foreach ($ts1 as $value) {
                                                                                echo $value."<br>"; }
                                                            ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">PERSONAL SKILLS</td>
                                                <td class="text-nowrap"><?php $ps=$dataresume["RESUME_PERSONAL_SKILLS"]; 
                                                                                  $ps1 = explode('#', $ps);
                                                                                  foreach ($ps1 as $value) { 
                                                                                echo $value."<br>"; }
                                                            ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">LANGUAGES</td>
                                                <td class="text-nowrap"><?php $lun=$dataresume["RESUME_LANGUAGES"]; 
                                                                                  $l1 = explode('#', $lun);
                                                                          foreach ($l1 as $value) {
                                                                                echo $value."<br>"; }
                                                            ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">PROJECTS</td>
                                                <td class="text-nowrap"><?php
                                                    $prj=$dataresume['RSEUME_PROJECTS'];
                                                    $prj=explode('#', $prj);
                                                    $a=0;
                                                    foreach ($prj as $prjs) {
                                                        $a+=1;
                                                      $prjs=explode(',', $prjs);
                                                     echo "($a) ".$prjs[0]."<br>";
                                                     echo $prjs[1]."<br>";
                                                     echo $prjs[2]."<br>";
                                                     } ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">ACHIVEMENTS</td>
                                                <td class="text-nowrap"><?php 
                                                     $ra=$dataresume['RESUME_ACHIVEMENTS'];
                                                     $ra1=explode('#', $ra);
                                                     $a=0;
                                                    foreach ($ra1 as $value) {
                                                        $a+=1;
                                                 echo "($a) ".$value; }
                                                 ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td class="text-nowrap">CARRIER OBJECTIVE</td>
                                                <td class=""><?php echo $dataresume['RESUME_CARRIER_OBJECTIVE']; ?></td>                               
                                                </tr>
                                                </table>
                                        </li>
                                    </ul>
                                    </div>
                                </div>
                                </div>
                               <?php
                              }
                          }
                    }
                   }elseif($d2d == 0){
                      if($type == "BA"){
                        ?>
                        <div class="mb-30">
                        <div class="card h-100">
                        <div class="card-body h-100">
                            <h4 class="card-title">View Resume Details</h4>
                            <!-- action group -->
                            <ul class="list-unstyled">
                            <li>
                                    <table class="table text-dark table-responsive">
                                        <tr>
                                            <td class="text-nowrap">10TH BOARD</td>
                                            <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_10TH_BOARD']; ?></td>
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">10TH SCHOOL</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_10TH_SCHOOL']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">10TH PERCENTAGE</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_10TH_PERCENTAGE']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">12TH BOARD</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_12TH_BOARD']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">12TH SCHOOL</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_12TH_SCHOOL']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">12TH STREAM</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_12TH_STREAM']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">12TH PERCENTAGE</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_12TH_PERCENTAGE']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">BACHELOR UNIVERSITY</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_UNIVERSITY']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">BACHELOR INSTITUTE</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_INSTITUTE']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">BACHELOR SPECIALIZATION</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SPECIALIZATION']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">BACHELOR DEGREE</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_DEGREE']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">BACHELOR SEM 1</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_1']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">BACHELOR SEM 2</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_2']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">BACHELOR SEM 3</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_3']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">BACHELOR SEM 4</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_4']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">BACHELOR SEM 5</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_5']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">BACHELOR SEM 6</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_6']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">TECHNICAL SKILLS</td>
                                        <td class="text-nowrap"><?php $ts=$dataresume["RESUME_TECHNICAL_SKILLS"]; 
                                                                          $ts1 = explode('#', $ts);
                                                                          foreach ($ts1 as $value) {
                                                                        echo $value."<br>"; }
                                                    ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">PERSONAL SKILLS</td>
                                        <td class="text-nowrap"><?php $ps=$dataresume["RESUME_PERSONAL_SKILLS"]; 
                                                                          $ps1 = explode('#', $ps);
                                                                          foreach ($ps1 as $value) { 
                                                                        echo $value."<br>"; }
                                                    ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">LANGUAGES</td>
                                        <td class="text-nowrap"><?php $lun=$dataresume["RESUME_LANGUAGES"]; 
                                                                          $l1 = explode('#', $lun);
                                                                  foreach ($l1 as $value) {
                                                                        echo $value."<br>"; }
                                                    ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">PROJECTS</td>
                                        <td class="text-nowrap"><?php
                                            $prj=$dataresume['RSEUME_PROJECTS'];
                                            $prj=explode('#', $prj);
                                            $a=0;
                                            foreach ($prj as $prjs) {
                                                $a+=1;
                                              $prjs=explode(',', $prjs);
                                             echo "($a) ".$prjs[0]."<br>";
                                             echo $prjs[1]."<br>";
                                             echo $prjs[2]."<br>";
                                             } ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">ACHIVEMENTS</td>
                                        <td class="text-nowrap"><?php 
                                             $ra=$dataresume['RESUME_ACHIVEMENTS'];
                                             $ra1=explode('#', $ra);
                                             $a=0;
                                            foreach ($ra1 as $value) {
                                                $a+=1;
                                         echo "($a) ".$value; }
                                         ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">CARRIER OBJECTIVE</td>
                                        <td class=""><?php echo $dataresume['RESUME_CARRIER_OBJECTIVE']; ?></td>                               
                                        </tr>
                                        </table>
                                </li>
                            </ul>
                            </div>
                        </div>
                        </div>
                       <?php     
                      }elseif($type == "MA"){
                        ?>
                        <div class="mb-30">
                        <div class="card h-100">
                        <div class="card-body h-100">
                            <h4 class="card-title">View Resume Details</h4>
                            <!-- action group -->
                            <ul class="list-unstyled">
                            <li>
                                    <table class="table text-dark table-responsive">
                                        <tr>
                                            <td class="text-nowrap">10TH BOARD</td>
                                            <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_10TH_BOARD']; ?></td>
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">10TH SCHOOL</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_10TH_SCHOOL']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">10TH PERCENTAGE</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_10TH_PERCENTAGE']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">12TH BOARD</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_12TH_BOARD']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">12TH SCHOOL</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_12TH_SCHOOL']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">12TH STREAM</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_12TH_STREAM']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">12TH PERCENTAGE</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_12TH_PERCENTAGE']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">BACHELOR UNIVERSITY</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_UNIVERSITY']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">BACHELOR INSTITUTE</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_INSTITUTE']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">BACHELOR SPECIALIZATION</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SPECIALIZATION']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">BACHELOR DEGREE</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_DEGREE']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">BACHELOR SEM 1</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_1']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">BACHELOR SEM 2</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_2']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">BACHELOR SEM 3</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_3']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">BACHELOR SEM 4</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_4']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">BACHELOR SEM 5</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_5']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">BACHELOR SEM 6</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_6']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">MASTER UNIVERSITY</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_MASTER_UNIVERSITY']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">MASTER INSTITUTE</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_MASTER_INSTITUTE']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">MASTER SPECIALIZATION</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_MASTER_SPECIALIZATION']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">MASTER SEM 1</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_MASTER_SEM_1']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">MASTER SEM 2</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_MASTER_SEM_2']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">MASTER SEM 3</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_MASTER_SEM_3']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">MASTER SEM 4</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_MASTER_SEM_4']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">TECHNICAL SKILLS</td>
                                        <td class="text-nowrap"><?php $ts=$dataresume["RESUME_TECHNICAL_SKILLS"]; 
                                                                          $ts1 = explode('#', $ts);
                                                                          foreach ($ts1 as $value) {
                                                                        echo $value."<br>"; }
                                                    ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">PERSONAL SKILLS</td>
                                        <td class="text-nowrap"><?php $ps=$dataresume["RESUME_PERSONAL_SKILLS"]; 
                                                                          $ps1 = explode('#', $ps);
                                                                          foreach ($ps1 as $value) { 
                                                                        echo $value."<br>"; }
                                                    ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">LANGUAGES</td>
                                        <td class="text-nowrap"><?php $lun=$dataresume["RESUME_LANGUAGES"]; 
                                                                          $l1 = explode('#', $lun);
                                                                  foreach ($l1 as $value) {
                                                                        echo $value."<br>"; }
                                                    ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">PROJECTS</td>
                                        <td class="text-nowrap"><?php
                                            $prj=$dataresume['RSEUME_PROJECTS'];
                                            $prj=explode('#', $prj);
                                            $a=0;
                                            foreach ($prj as $prjs) {
                                                $a+=1;
                                              $prjs=explode(',', $prjs);
                                             echo "($a) ".$prjs[0]."<br>";
                                             echo $prjs[1]."<br>";
                                             echo $prjs[2]."<br>";
                                             } ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">ACHIVEMENTS</td>
                                        <td class="text-nowrap"><?php 
                                             $ra=$dataresume['RESUME_ACHIVEMENTS'];
                                             $ra1=explode('#', $ra);
                                             $a=0;
                                            foreach ($ra1 as $value) {
                                                $a+=1;
                                         echo "($a) ".$value; }
                                         ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">CARRIER OBJECTIVE</td>
                                        <td class=""><?php echo $dataresume['RESUME_CARRIER_OBJECTIVE']; ?></td>                               
                                        </tr>
                                        </table>
                                </li>
                            </ul>
                            </div>
                        </div>
                        </div>
                       <?php
                      }elseif($type == "IBM"){
                        ?>
                        <div class="mb-30">
                        <div class="card h-100">
                        <div class="card-body h-100">
                            <h4 class="card-title">View Resume Details</h4>
                            <!-- action group -->
                            <ul class="list-unstyled">
                            <li>
                                    <table class="table text-dark table-responsive">
                                        <tr>
                                            <td class="text-nowrap">10TH BOARD</td>
                                            <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_10TH_BOARD']; ?></td>
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">10TH SCHOOL</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_10TH_SCHOOL']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">10TH PERCENTAGE</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_10TH_PERCENTAGE']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">12TH BOARD</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_12TH_BOARD']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">12TH SCHOOL</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_12TH_SCHOOL']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">12TH STREAM</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_12TH_STREAM']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">12TH PERCENTAGE</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_12TH_PERCENTAGE']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">INTEGRATED SEM 1</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_1']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">INTEGRATED SEM 2</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_2']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">INTEGRATED SEM 3</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_3']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">INTEGRATED SEM 4</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_4']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">INTEGRATED SEM 5</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_5']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">INTEGRATED SEM 6</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_BACHELOR_SEM_6']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">INTEGRATED SEM 7</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_MASTER_SEM_1']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">INTEGRATED SEM 8</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_MASTER_SEM_2']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">INTEGRATED SEM 9</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_MASTER_SEM_3']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">INTEGRATED SEM 10</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_MASTER_SEM_4']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">INTEGRATED UNIVERSITY</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_MASTER_UNIVERSITY']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">INTEGRATED INSTITUTE</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_MASTER_INSTITUTE']; ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">INTEGRATED SPECIALIZATION</td>
                                        <td class="text-nowrap"><?php echo $dataresume['ACADEMIC_MASTER_SPECIALIZATION']; ?></td>
                                        
                                        </tr>
                                        
                                        <tr>
                                        <td class="text-nowrap">TECHNICAL SKILLS</td>
                                        <td class="text-nowrap"><?php $ts=$dataresume["RESUME_TECHNICAL_SKILLS"]; 
                                                                          $ts1 = explode('#', $ts);
                                                                          foreach ($ts1 as $value) {
                                                                        echo $value."<br>"; }
                                                    ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">PERSONAL SKILLS</td>
                                        <td class="text-nowrap"><?php $ps=$dataresume["RESUME_PERSONAL_SKILLS"]; 
                                                                          $ps1 = explode('#', $ps);
                                                                          foreach ($ps1 as $value) { 
                                                                        echo $value."<br>"; }
                                                    ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">LANGUAGES</td>
                                        <td class="text-nowrap"><?php $lun=$dataresume["RESUME_LANGUAGES"]; 
                                                                          $l1 = explode('#', $lun);
                                                                  foreach ($l1 as $value) {
                                                                        echo $value."<br>"; }
                                                    ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">PROJECTS</td>
                                        <td class="text-nowrap"><?php
                                            $prj=$dataresume['RSEUME_PROJECTS'];
                                            $prj=explode('#', $prj);
                                            $a=0;
                                            foreach ($prj as $prjs) {
                                                $a+=1;
                                              $prjs=explode(',', $prjs);
                                             echo "($a) ".$prjs[0]."<br>";
                                             echo $prjs[1]."<br>";
                                             echo $prjs[2]."<br>";
                                             } ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">ACHIVEMENTS</td>
                                        <td class="text-nowrap"><?php 
                                             $ra=$dataresume['RESUME_ACHIVEMENTS'];
                                             $ra1=explode('#', $ra);
                                             $a=0;
                                            foreach ($ra1 as $value) {
                                                $a+=1;
                                         echo "($a) ".$value; }
                                         ?></td>
                                        
                                        </tr>
                                        <tr>
                                        <td class="text-nowrap">CARRIER OBJECTIVE</td>
                                        <td class=""><?php echo $dataresume['RESUME_CARRIER_OBJECTIVE']; ?></td>                               
                                        </tr>
                                        </table>
                                </li>
                            </ul>
                            </div>
                        </div>
                        </div>
                       <?php
                      }
                   }    
                   ?>
           


<?php 
  include('footer.php');
  ob_flush();
?> 