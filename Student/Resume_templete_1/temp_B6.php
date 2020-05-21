<?php
  include('../../Files/PDO/dbcon.php');
  session_start();
  $data5=$_SESSION['Userdata'];
  $sid=$data5["STUDENT_ID"];
  $stmt=$con->prepare("CALL CHECK_RESUME_DETAILS(:sid);");
  $stmt->bindParam(":sid",$sid);
  $stmt->execute();
  $data = $stmt->fetch(PDO::FETCH_ASSOC);
  $id = $data["aid"];
  if($data["aid"] == NULL){
      header('Location: ../academic_details.php');
  }elseif($data["rid"] == NULL){
      header('Location: ../resume_details.php');
  }else{
      $stmt1=$con->prepare("CALL GET_STUDENT_RESUME(:sid)");
      $stmt1->bindParam(":sid",$sid);
      $stmt1=$con->prepare("CALL GET_STUDENT_RESUME(:sid)");
      $stmt1->bindParam(":sid",$sid);
      $stmt1->execute();
      //print_r($stmt1->errorinfo());
      $data1 = $stmt1->fetch(PDO::FETCH_ASSOC);
      $fname = $data1['STUDENT_FIRST_NAME'];
  }  
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Resume</title>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link type="text/css" rel="stylesheet" href="css/blue.css" />
<link type="text/css" rel="stylesheet" href="css/print.css" media="print"/>
</head>
<body>
<!-- Begin Wrapper -->
<div id="wrapper">
  <div class="wrapper-top"></div>
  <div class="wrapper-mid">
    <!-- Begin Paper -->
    <div id="paper">
      <div class="paper-top"></div>
      <div id="paper-mid">
        <div class="entry">
          <!-- Begin Image -->
          <img class="portrait" src="../Profile_pic/<?php echo $data1['STUDENT_PROFILE_PIC'];?>" alt="<?php echo $data1['STUDENT_FIRST_NAME']." ".$data1['STUDENT_LAST_NAME']; ?>" />
          <!-- End Image -->
          <!-- Begin Personal Information -->
          <div class="self">
            <h1 class="name" style="line-height: 40px;"><?php echo $data1['STUDENT_FIRST_NAME']." ".$data1['STUDENT_LAST_NAME']; ?>
            </h1>
            <ul >
              <li><i class="fa fa-home" style="font-size: 20px;"></i> <?php echo $data1["STUDENT_ADDRESS"]; ?></li>
              <li><i class="fa fa-envelope" style="font-size: 16px;"></i> <?php echo $data1["STUDENT_EMAIL"]; ?></li>
              <li><i class="fa fa-phone" style="font-size: 18px;"></i> <?php echo $data1["STUDENT_PHONE_NUMBER"]; ?></li>
            </ul>
          </div>
          <!-- End Personal Information -->
          <!-- Begin Social -->
          <!-- End Social -->
        </div>
        <!-- Begin 1st Row -->
        <div class="entry">
          <h2>OBJECTIVE</h2>
          <p> <?php echo $data1["RESUME_CARRIER_OBJECTIVE"];?></p>
        </div>
        <!-- End 1st Row -->
        <!-- Begin 2nd Row -->
        <div class="entry">
          <h2>EDUCATION</h2>
          <div class="content">
              <p style="font-size: 16px;"><b>10th(S.S.C)</b></p>
              <br>
              <p style="font-size: 14px;"><?php echo round($data1['ACADEMIC_10TH_PERCENTAGE'], 1); ?><small>%</small></p>
              <p><?php echo $data1['ACADEMIC_10TH_SCHOOL']; ?> <br />
              <em><?php echo $data1['ACADEMIC_10TH_BOARD']; ?> </em>
            </p>
          </div>
          <div class="content">
            <p style="font-size: 16px;"><b>12th(H.S.S.C)</b></p>
           <p style="font-size: 14px;"><?php echo round($data1['ACADEMIC_12TH_PERCENTAGE'], 1); ?><small>%</small></p>
              <p><?php echo $data1['ACADEMIC_12TH_SCHOOL']; ?> <br />
              <em><?php echo $data1['ACADEMIC_12TH_BOARD']; ?> </em>
               <em><?php echo $data1['ACADEMIC_12TH_STREAM']; ?> </em>
            </p>
          </div>
          <div class="content">
            <p style="font-size: 16px;"><b>BACHELOR</b></p>
            <p  style="font-size: 14px;"><?php $total=$data1['ACADEMIC_BACHELOR_SEM_1'];
                         $total+=$data1['ACADEMIC_BACHELOR_SEM_2'];
                         $total+=$data1['ACADEMIC_BACHELOR_SEM_3'];
                         $total+=$data1['ACADEMIC_BACHELOR_SEM_4'];
                         $total+=$data1['ACADEMIC_BACHELOR_SEM_5'];
                         $total+=$data1['ACADEMIC_BACHELOR_SEM_6']; 
                         $total/=6;
                         $total*=10;
                         echo round($total, 1);
                    ?><small>%</small></p>
              <p><?php echo $data1['ACADEMIC_BACHELOR_INSTITUTE']; ?> <br />
              <em><?php echo $data1['ACADEMIC_BACHELOR_UNIVERSITY']; ?></em>
               <em><?php echo $data1['ACADEMIC_BACHELOR_DEGREE']; ?>
              (<?php echo $data1['ACADEMIC_BACHELOR_SPECIALIZATION']; ?>)</em>
            </p>
          </div>
        </div>
        <!-- End 2nd Row -->
        <!-- Begin 3rd Row -->
        <div class="entry">
          <h2>PROJECTS</h2>
          <?php 
                    $prj=$data1['RSEUME_PROJECTS'];
                    $prj=explode('#', $prj);
                    foreach ($prj as $prjs) {
                    $prjs=explode(',', $prjs);
                  ?>
          <div class="content">                  
            <h3><?php echo $prjs[0]; ?></h3>
            <p><?php echo $prjs[2];?> <br />
            <ul class="info">
              <li><?php echo $prjs[1]; ?></li>
            </ul>
          </div>
           <?php } ?>
            <div class="entry">
          <h2>Achivments</h2>
          <?php 
                    $prj=$data1['RESUME_ACHIVEMENTS'];
                    $prj=explode('#', $prj);
                    foreach ($prj as $prjs) {
                    $prjs=explode(',', $prjs);
                  ?>
          <div class="content">                  
            <h3><?php echo $prjs[0]; ?></h3>
            <p><?php echo $prjs[2];?> <br />
            <ul class="info">
              <li><?php echo $prjs[1]; ?></li>
            </ul>
          </div>
           <?php } ?> 
        <!-- End 3rd Row -->
        <!-- Begin 4th Row -->
        <div class="entry">
          <h2 style="line-height: 40px;">Personal Skills</h2>
          <div class="content">   
            <ul class="skills">
               <?php $ps=$data1["RESUME_PERSONAL_SKILLS"]; 
                 $ps = explode('#', $ps);
                 foreach ($ps as $value) {
                  ?>                          
              <li><?php echo $value;?></li>
                 <?php } ?>
            </ul>
          </div>
        </div>
         <div class="entry">
          <h2 style="line-height: 40px;">Technical Skills</h2>
          <div class="content">   
            <ul class="skills">
               <?php $ps=$data1["RESUME_TECHNICAL_SKILLS"]; 
                 $ps = explode('#', $ps);
                 foreach ($ps as $value) {
                  ?>                          
              <li><?php echo $value;?></li>
                 <?php } ?>
            </ul>
          </div>
        </div>
         <div class="entry">
          <h2 style="line-height: 40px;">Languages known</h2>
          <div class="content">   
            <ul class="skills">
               <?php $ps=$data1["RESUME_LANGUAGES"]; 
                 $ps = explode('#', $ps);
                 foreach ($ps as $value) {
                  ?>                          
              <li><?php echo $value;?></li>
                 <?php } ?>
            </ul>
          </div>
        </div>
        <!-- End 4th Row -->
      </div>
      <div class="clear"></div>
      <div class="paper-bottom"></div>
    </div>
    <!-- End Paper -->
  </div>
  <div class="wrapper-bottom"></div>
</div>
<div id="message"><a href="#top" id="top-link">Go to Top</a></div>
</body>
</html>
