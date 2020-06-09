<?php 
  ob_start();
  include('header.php');
  $data=$_SESSION['Userdata'];
?>
    <div class="content-wrapper header-info">
      <!-- widgets -->
      <div class="mb-30">
           <div class="card h-100 ">
           <div class="card-body h-100">
             <h4 class="card-title">Resume Details</h4>
             <!-- action group -->
             <div class="scrollbar">
              <ul class="list-unstyled">
              <form action="#" method="Post">
                  <li>
                    <h5 class="mb-3">Technical Skills<button class="btn btn-outline-success pull-right" type="button" onclick="addskill()"><i class="fa fa-plus"></i></button></h5>
                    <div id="technical_skills_0"></div>
                    <hr style="border-top: 1px solid #495057">
                  </li>
                  <li>
                    <h5 class="mb-3">Personal Skills<button class="btn btn-outline-success pull-right" type="button" onclick="addpersonalskill()"><i class="fa fa-plus"></i></button></h5>
                    <div id="personal_skills_0"></div>
                    <hr style="border-top: 1px solid #495057">
                  </li>
                  <li>
                    <h5 class="mb-3">Languages Known<button class="btn btn-outline-success pull-right" type="button" onclick="addlanguage()"><i class="fa fa-plus"></i></button></h5>
                    <div id="language_0"></div>
                    <hr style="border-top: 1px solid #495057">
                  </li>
                  <li>
                    <h5 class="mb-3">Projects<button class="btn btn-outline-success pull-right" type="button" onclick="addproject()"><i class="fa fa-plus"></i></button></h5>
                    <p style="font-size: 12px;" class="ml-3 mb-2">Enter Project Name, Description, Period(X years OR Y months)</p>
                    <div id="project_0"></div>
                    <hr style="border-top: 1px solid #495057">
                  </li>
                  <li>
                    <h5 class="mb-3">Achivements<button class="btn btn-outline-success pull-right" type="button" onclick="addachivement()"><i class="fa fa-plus"></i></button></h5>
                    <p style="font-size: 12px;" class="ml-3 mb-2">Enter Achivement, Description,Period(X years OR Y months)</p>
                    <div id="achivement_0"></div>
                    <hr style="border-top: 1px solid #495057">
                  </li>
                  <li>
                    <h5 class="mb-3">Carrier Objective</h5>
                    <textarea class="form-control" name="carrier_objective" placeholder="How do you wanna build your carrier" rows="6"></textarea>
                    <div id="achivement_0"></div>
                    <hr style="border-top: 1px solid #495057">
                  </li>
                  <li>
                    <div class="d-flex justify-content-center">
                      <input type="submit" name="submit"  class="btn btn-lg btn-outline-success text-uppercase" value="submit">
                    </div>
                  </li>
              </form>
              </ul>
             </div>
            </div>
          </div>
        </div>
        <script type="text/javascript">
          var skill=0;
          var personalSkill=0;
          var language=0;
          var project=0;
          var achivement=0;
          function addskill()
          {
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.open("GET","addskill.php?a="+skill,false);
            xmlhttp.send(null);
            document.getElementById("technical_skills_"+skill).innerHTML=xmlhttp.responseText;
            skill+=1;
          }
          function addpersonalskill()
          {
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.open("GET","addpersonalskill.php?a="+personalSkill,false);
            xmlhttp.send(null);
            document.getElementById("personal_skills_"+personalSkill).innerHTML=xmlhttp.responseText;
            personalSkill+=1;
          }
          function addlanguage()
          {
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.open("GET","addlanguage.php?a="+language,false);
            xmlhttp.send(null);
            document.getElementById("language_"+language).innerHTML=xmlhttp.responseText;
            language+=1;
          }
          function addproject()
          {
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.open("GET","addproject.php?a="+project,false);
            xmlhttp.send(null);
            document.getElementById("project_"+project).innerHTML=xmlhttp.responseText;
            project+=1;
          }
          function addachivement()
          {
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.open("GET","addachivement.php?a="+achivement,false);
            xmlhttp.send(null);
            document.getElementById("achivement_"+achivement).innerHTML=xmlhttp.responseText;
            achivement+=1;
          }
        </script>
<?php
  if (isset($_REQUEST['submit'])) {
      $sid=$data["STUDENT_ID"];
      $technical_skills="";
      $person_skills="";
      $language="";
      $project="";
      $achivement="";  
      $carrier_objective=$_REQUEST['carrier_objective'];


    if (isset($_REQUEST['t'])) {
      $technical_skills=implode('#', $_REQUEST['t']);
    }
    else{
      $technical_skills=null;
    }


    if (isset($_REQUEST['p'])) {
      $person_skills=implode('#', $_REQUEST['p']);
    }
    else{
      $person_skills=null;
    }


    if (isset($_REQUEST['l'])) {
      $language=implode('#', $_REQUEST['l']);
     // echo '-----------------------------------------'."$lunguage";
    }
    else{
      $language=null;
    }


    if (isset($_REQUEST['pr'])) {
      $project=implode('#', $_REQUEST['pr']);
      //echo '-----------------------------------------'."$project";
    }
    else{
      $project=null;
    }


    if (isset($_REQUEST['ac'])) {
      $achivement=implode('#', $_REQUEST['ac']);
      //echo '-----------------------------------------'."$achivement";
    }
    else{
      $achivement=null;
    }

    // $sid="1";
    // $technical_skills="1";
    // $person_skills="1";
    // $language="1";
    // $project="1";
    // $achivement="1";  
    // $carrier_objective="1";

    include('../Files/PDO/dbcon.php');
    $stmt=$con->prepare("CALL INSERT_UPDATE_RESUME(:sid,:tskill,:pskills,:language,:project,:achivement,:cob);");
    $stmt->bindparam(':sid',$sid);
    $stmt->bindparam(':tskill',$technical_skills);
    $stmt->bindparam(':pskills',$person_skills);
    $stmt->bindparam(':language',$language);
    $stmt->bindparam(':project',$project);
    $stmt->bindparam(':achivement',$achivement);
    $stmt->bindparam(':cob',$carrier_objective);
    $stmt->execute();
    // print_r($stmt->errorinfo());
    if($stmt  == TRUE){
        echo "<script>alert('Data inserted')</script>";
    }else{
        echo "<script>alert('Data Not inserted')</script>";
    }

  }
?>
<?php 
  include('footer.php');
  ob_flush();
?> 