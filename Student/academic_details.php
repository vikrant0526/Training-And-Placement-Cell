<?php 
  ob_start();
  include('header.php');
  $data=$_SESSION['Userdata'];
?>
    <div class="content-wrapper header-info">
      <div class="page-title">
      <div class="row">
          <div class="col-md-6">
            <h3 class="mb-15 text-white"> Welcome Back, <?php echo $data['STUDENT_FIRST_NAME']; ?>! </h3><span class="mb-10 mb-md-30 text-white d-block">A something new is about to happen.</span>
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
             <h4 class="card-title">Academic Details</h4>
             <!-- action group -->
             <div class="scrollbar">
              <ul class="list-unstyled">
              <form action="#" method="Post">
                
                <h4 class="card-title">10TH</h4>
                <li>
                    <select name="10thBoard" class="form-control">
                        <option value="">-- Select Board --</option>
                        <option value="AISSCE">AISSCE</option>
                        <option value="Andaman &amp; Nicobar State Board">Andaman &amp; Nicobar State Board</option>
                        <option value="Andhra Pradesh State Board">Andhra Pradesh State Board</option>
                        <option value="Arunachal Pradesh State Board">Arunachal Pradesh State Board</option>
                        <option value="Assam State Board">Assam State Board</option>
                        <option value="Bihar State Board">Bihar State Board</option>
                        <option value="CBSE">CBSE</option>
                        <option value="Chandigarh State Board">Chandigarh State Board</option>
                        <option value="Chhattisgarh State Board">Chhattisgarh State Board</option>
                        <option value="Dadar &amp; Nagar Haveli State Board">Dadar &amp; Nagar Haveli State Board</option>
                        <option value="Daman and Diu State Board">Daman and Diu State Board</option>
                        <option value="Delhi State Board">Delhi State Board</option>
                        <option value="Goa State Board">Goa State Board</option>
                        <option value="Gujarat State Board">Gujarat State Board</option>
                        <option value="Haryana State Board">Haryana State Board</option>
                        <option value="Himachal Pradesh State Board">Himachal Pradesh State Board</option>
                        <option value="HSCE">HSCE</option>
                        <option value="ICSE">ICSE</option>
                        <option value="Jammu and Kashmir State Board">Jammu and Kashmir State Board</option>
                        <option value="Jharkhand State Board">Jharkhand State Board</option>
                        <option value="Karnataka State Board">Karnataka State Board</option>
                        <option value="Kerala State Board">Kerala State Board</option>
                        <option value="Lakshadweep State Board">Lakshadweep State Board</option>
                        <option value="Madhya Pradesh State Board">Madhya Pradesh State Board</option>
                        <option value="Maharashtra State Board">Maharashtra State Board</option>
                        <option value="Manipur State Board">Manipur State Board</option>
                        <option value="Meghalaya State Board">Meghalaya State Board</option>
                        <option value="Mizoram State Board">Mizoram State Board</option>
                        <option value="Nagaland State Board">Nagaland State Board</option>
                        <option value="Orissa State Board">Orissa State Board</option>
                        <option value="Pondicherry State Board">Pondicherry State Board</option>
                        <option value="Punjab State Board">Punjab State Board</option>
                        <option value="Rajasthan State Board">Rajasthan State Board</option>
                        <option value="Sikkim State Board">Sikkim State Board</option>
                        <option value="SSCE">SSCE</option>
                        <option value="Tamil Nadu State Board">Tamil Nadu State Board</option>
                        <option value="Telangana State Board">Telangana State Board</option>
                        <option value="Tripura State Board">Tripura State Board</option>
                        <option value="Uttar Pradesh State Board">Uttar Pradesh State Board</option>
                        <option value="Uttaranchal State Board">Uttaranchal State Board</option>
                        <option value="West Bengal State Board">West Bengal State Board</option>
                        <option value="Others">Others</option>
                   </select>
                   <input type="text" name="10thper" class="form-control mt-2" placeholder="10th Percentage">
                  <input type='text' name='10thschool' class='form-control mt-2' placeholder='10th School Name'>
                </li>
                <div>
                  <hr style="border-top: 1px solid #495057">
                </div>

                <?php 
                    include('../Files/PDO/dbcon.php');
                    $bid = $data["STUDENT_BATCH_ID"];
                    $stmt=$con->prepare("CALL GET_BATCH_INFO(:bid);");
                    $stmt->bindParam(":bid",$bid);  
                    $stmt->execute();
                    $datauser = $stmt->fetch(PDO::FETCH_ASSOC);
                    //$sem = $datauser["BATCH_SEMESTER"];  
                    $degree = $datauser["BATCH_DEGREE"];
                    $d2d = $datauser["BATCH_D2D"];
                    $type = $datauser["BATCH_TYPE"];

                    if($d2d == "1"){
                       ?>
                          <div class="row m-3">
                            <label class="col-2 text-light font-weight-bold text-nowrap">D2D:</label>
                            <input onchange="y()" id="d2d1" class="col-1 mt-1" type="radio" name="de2dep" class="form-control" value="Y">
                            <label class="col-2">YES</label>
                            <input onchange="n()" id="d2d2" class="col-1 mt-1" type="radio" name="de2dep" class="form-control" value="N">
                            <label class="col-2">NO</label>
                          </div>
                          <div id="d2dtext"></div>
                       <?php 
                    }
                    elseif($d2d == "0"){
                      ?>
                        <h4 class="card-title">12TH</h4>
                         <li>
                              <select name='12thBoard' class='form-control mb-2'>
                                  <option value=''>-- Select Board --</option>
                                  <option value='AISSCE'>AISSCE</option>
                                  <option value='Andaman &amp; Nicobar State Board'>Andaman &amp; Nicobar State Board</option>
                                  <option value='Andhra Pradesh State Board'>Andhra Pradesh State Board</option>
                                  <option value='Arunachal Pradesh State Board'>Arunachal Pradesh State Board</option>
                                  <option value='Assam State Board'>Assam State Board</option>
                                  <option value='Bihar State Board'>Bihar State Board</option>
                                  <option value='CBSE'>CBSE</option>
                                  <option value='Chandigarh State Board'>Chandigarh State Board</option>
                                  <option value='Chhattisgarh State Board'>Chhattisgarh State Board</option>
                                  <option value='Dadar &amp; Nagar Haveli State Board'>Dadar &amp; Nagar Haveli State Board</option>
                                  <option value='Daman and Diu State Board'>Daman and Diu State Board</option>
                                  <option value='Delhi State Board'>Delhi State Board</option>
                                  <option value='Goa State Board'>Goa State Board</option>
                                  <option value='Gujarat State Board'>Gujarat State Board</option>
                                  <option value='Haryana State Board'>Haryana State Board</option>
                                  <option value='Himachal Pradesh State Board'>Himachal Pradesh State Board</option>
                                  <option value='HSCE'>HSCE</option>
                                  <option value='ICSE'>ICSE</option>
                                  <option value='Jammu and Kashmir State Board'>Jammu and Kashmir State Board</option>
                                  <option value='Jharkhand State Board'>Jharkhand State Board</option>
                                  <option value='Karnataka State Board'>Karnataka State Board</option>
                                  <option value='Kerala State Board'>Kerala State Board</option>
                                  <option value='Lakshadweep State Board'>Lakshadweep State Board</option>
                                  <option value='Madhya Pradesh State Board'>Madhya Pradesh State Board</option>
                                  <option value='Maharashtra State Board'>Maharashtra State Board</option>
                                  <option value='Manipur State Board'>Manipur State Board</option>
                                  <option value='Meghalaya State Board'>Meghalaya State Board</option>
                                  <option value='Mizoram State Board'>Mizoram State Board</option>
                                  <option value='Nagaland State Board'>Nagaland State Board</option>
                                  <option value='Orissa State Board'>Orissa State Board</option>
                                  <option value='Pondicherry State Board'>Pondicherry State Board</option>
                                  <option value='Punjab State Board'>Punjab State Board</option>
                                  <option value='Rajasthan State Board'>Rajasthan State Board</option>
                                  <option value='Sikkim State Board'>Sikkim State Board</option>
                                  <option value='SSCE'>SSCE</option>
                                  <option value='Tamil Nadu State Board'>Tamil Nadu State Board</option>
                                  <option value='Telangana State Board'>Telangana State Board</option>
                                  <option value='Tripura State Board'>Tripura State Board</option>
                                  <option value='Uttar Pradesh State Board'>Uttar Pradesh State Board</option>
                                  <option value='Uttaranchal State Board'>Uttaranchal State Board</option>
                                  <option value='West Bengal State Board'>West Bengal State Board</option>
                                  <option value='Others'>Others</option>
                             </select>
                              <select name='12thspecialization' id='12sp' class='form-control' onchange='others1()'>
                                <option value=''>-- Select Specialization--</option>
                                <option value='COMMERCE'>COMMERCE</option>
                                <option value='SCIENCE'>SCIENCE</option>
                                <option value='ARTS'>ARTS</option>
                                <option value='COMPUTER SCIENCE'>COMPUTER SCIENCE</option>
                                <option value='OTHERS'>OTHERS</option>
                              </select>
                               <div id='sptext'></div>
                                <input type='text' name='12thper' class='form-control mt-2' placeholder='12th Percentage'>
                               <input type='text' name='12thpassschool' class='form-control mt-2' placeholder='12th School Name'>
                             </li>      
                        <div>
                          <hr style="border-top: 1px solid #495057">
                        </div>
                      <?php
                      if($type == "BA"){
                        ?>        
                        <h4 class="card-title">BACHELOR</h4>
                        <li>
                            <input type='text' name='bach1semba' class='form-control mt-2' placeholder='Sem 1'>  
                            <input type='text' name='bach2semba' class='form-control mt-2' placeholder='Sem 2'>  
                            <input type='text' name='bach3semba' class='form-control mt-2' placeholder='Sem 3'>  
                            <input type='text' name='bach4semba' class='form-control mt-2' placeholder='Sem 4'>  
                            <input type='text' name='bach5semba' class='form-control mt-2' placeholder='Sem 5'>  
                            <input type='text' name='bach6semba' class='form-control mt-2' placeholder='Sem 6'>  
                          </li>
                            <select name='bunamema' class='form-control mt-2'>
                          <?php include('university.php'); ?>
                      </select>
                       <select onchange="othersforbach1()" id="bdgree" name="bdgree" class='form-control mt-2'>
                           <option>--Select Degree--</option>
                           <option value="BCA">BCA</option>
                           <option value="B.Sc(IT)">B.Sc(IT)</option>
                           <option value="B.Sc(CS)">B.Sc(CS)</option>
                           <option value="B.Sc(CA)">B.Sc(CA)</option>
                           <option value="OTHERS">Other</option>
                       </select>
                        <div id="bsptext"></div>
                        <input type='text' name='degreesp' class='form-control mt-2' placeholder='Degree Specialization'>
                       <input type='text' name='bmainstitute' class='form-control mt-2' placeholder='Institute / College Name'>
                          <div>
                          <hr style="border-top: 1px solid #495057">
                        </div>
                      <?php
                      }
                      elseif($type == "MA"){
                        ?>        
                        <h4 class="card-title">BACHELOR</h4>
                        <div>
                          <hr style="border-top: 1px solid #495057">
                        </div>
                         <li>
                            <input type='text' name='b1semma' class='form-control mt-2' placeholder='Sem 1'>  
                            <input type='text' name='b2semma' class='form-control mt-2' placeholder='Sem 2'>  
                            <input type='text' name='b3semma' class='form-control mt-2' placeholder='Sem 3'>  
                            <input type='text' name='b4semma' class='form-control mt-2' placeholder='Sem 4'>  
                            <input type='text' name='b5semma' class='form-control mt-2' placeholder='Sem 5'>  
                            <input type='text' name='b6semma' class='form-control mt-2' placeholder='Sem 6'>  
                          </li>
                       <select name='bunamema' class='form-control mt-2'>
                          <?php include('university.php'); ?>
                      </select>
                       <select onchange="othersforbach1()" id="bdgree" name="bdgree" class='form-control mt-2'>
                           <option>--Select Degree--</option>
                           <option value="BCA">BCA</option>
                           <option value="B.Sc(IT)">B.Sc(IT)</option>
                           <option value="B.Sc(CS)">B.Sc(CS)</option>
                           <option value="B.Sc(CA)">B.Sc(CA)</option>
                           <option value="OTHERS">Other</option>
                       </select>
                        <div id="bsptext"></div>
                        <input type='text' name='degreesp' class='form-control mt-2' placeholder='Degree Specialization'>
                       <input type='text' name='bmainstitute' class='form-control mt-2' placeholder='Institute / College Name'>
                        <div>
                          <hr style="border-top: 1px solid #495057">
                        </div>
                         <h4 class="card-title">MASTER</h4>
                         <li>
                            <input type='text' name='m1sem' class='form-control mt-2' placeholder='Sem 1'>  
                            <input type='text' name='m2sem' class='form-control mt-2' placeholder='Sem 2'>  
                            <input type='text' name='m3sem' class='form-control mt-2' placeholder='Sem 3'>  
                            <input type='text' name='m4sem' class='form-control mt-2' placeholder='Sem 4'>    
                          </li>
                        <select name='masteruname' class='form-control mt-2'>
                          <?php include('university.php'); ?>
                        </select>
                         <select onchange="othersformaster1()" id="masterdegree" name="masterdegree" class='form-control mt-2'>
                             <option>--Select Degree--</option>
                             <option value="MCA">MCA</option>
                             <option value="M.Sc(IT)">M.Sc(IT)</option>
                             <option value="M.Sc(CS)">M.Sc(CS)</option>
                             <option value="M.Sc(CA)">M.Sc(CA)</option>
                             <option value="OTHERS">Other</option>
                         </select>
                          <div id="mastertext"></div>
                          <input type='text' name='mastersp' class='form-control mt-2' placeholder='Degree Specialization'>
                         <input type='text' name='masterins' class='form-control mt-2' placeholder='Institute / College Name'>
                         <div>
                            <hr style="border-top: 1px solid #495057">
                          </div>
                      <?php 
                      }
                      else if($type == "IBM"){
                        ?>
                          <h4 class="card-title">INTEGRATED</h4>
                          <div>
                            <hr style="border-top: 1px solid #495057">
                          </div>
                           <li>
                              <input type='text' name='i1sem' class='form-control mt-2' placeholder='Sem 1'>  
                              <input type='text' name='i2sem' class='form-control mt-2' placeholder='Sem 2'>  
                              <input type='text' name='i3sem' class='form-control mt-2' placeholder='Sem 3'>  
                              <input type='text' name='i4sem' class='form-control mt-2' placeholder='Sem 4'>
                              <input type='text' name='i5sem' class='form-control mt-2' placeholder='Sem 5'>
                              <input type='text' name='i6sem' class='form-control mt-2' placeholder='Sem 6'>
                              <input type='text' name='i7sem' class='form-control mt-2' placeholder='Sem 7'>
                              <input type='text' name='i8sem' class='form-control mt-2' placeholder='Sem 8'>
                              <input type='text' name='i9sem' class='form-control mt-2' placeholder='Sem 9'>
                              <input type='text' name='i10sem' class='form-control mt-2' placeholder='Sem 10'>    
                            </li>
                         <select name='masteruname' class='form-control mt-2'>
                          <?php include('university.php'); ?>
                        </select>
                         <select onchange="othersformaster1()" id="masterdegree" name="masterdegree" class='form-control mt-2'>
                             <option>--Select Degree--</option>
                             <option value="IMCA">IMCA</option>
                             <option value="Int. M.Sc(IT)">Int. M.Sc(IT)</option>
                             <option value="Int. M.Sc(CS)">Int. M.Sc(CS)</option>
                             <option value="Int. M.Sc(CA)">Int. M.Sc(CA)</option>
                             <option value="OTHERS">Other</option>
                         </select>
                          <div id="mastertext"></div>
                          <input type='text' name='mastersp' class='form-control mt-2' placeholder='Degree Specialization'>
                         <input type='text' name='masterins' class='form-control mt-2' placeholder='Institute / College Name'>
                          <div>
                            <hr style="border-top: 1px solid #495057">
                          </div>
                      <?php  
                      }  
                    }
                 ?> 
                <div class="d-flex justify-content-center">
                    <input type="submit" name="submit"  class="btn btn-lg btn-outline-success text-uppercase" value="submit">
                </div>     
                </form>
              </ul>
             </div>
            </div>
          </div>
        </div>
        <script type="text/javascript">
          function others(){
            var sp = document.getElementById("sp").value;
            if(sp == "OTHERS")
            {
              var xmlhttp=new XMLHttpRequest();
              document.getElementById("sptext").innerHTML='<input type="text" name="others_sp_d2d_n_12th" class="form-control mt-2" placeholder="Specify Your Specialzation">';
            }
            else{
              var xmlhttp=new XMLHttpRequest();
              document.getElementById("sptext").innerHTML='';  
            }
          }
          function others1(){
            var sp = document.getElementById("12sp").value;
            if(sp == "OTHERS")
            {
              var xmlhttp=new XMLHttpRequest();
              document.getElementById("sptext").innerHTML='<input type="text" name="others_sp_ba_12th" class="form-control mt-2" placeholder="Specify Your Specialzation">';
            }
            else{
              var xmlhttp=new XMLHttpRequest();
              document.getElementById("sptext").innerHTML='';  
            }
          }
          function othersforbach1(){
            var sp = document.getElementById("bdgree").value;
            if(sp == "OTHERS")
            {
              var xmlhttp=new XMLHttpRequest();
              document.getElementById("bsptext").innerHTML='<input type="text" name="others_sp_bach_ma" class="form-control mt-2" placeholder="Specify Your Degree">';
            }
            else{
              var xmlhttp=new XMLHttpRequest();
              document.getElementById("bsptext").innerHTML='';  
            }
          }

          function othersformaster1(){
            var sp = document.getElementById("masterdegree").value;
            if(sp == "OTHERS")
            {
              var xmlhttp=new XMLHttpRequest();
              document.getElementById("mastertext").innerHTML='<input type="text" name="others_sp_master_type_ma" class="form-control mt-2" placeholder="Specify Your Degree">';
            }
            else{
              var xmlhttp=new XMLHttpRequest();
              document.getElementById("mastertext").innerHTML='';  
            }
          }

            function othersformaster(){
            var sp = document.getElementById("msp").value;
            if(sp == "OTHERS")
            {
              var xmlhttp=new XMLHttpRequest();
              document.getElementById("msptext").innerHTML='<input type="text" name="others_sp_master" class="form-control mt-2" placeholder="Specify Your Specialzation">';
            }
            else{
              var xmlhttp=new XMLHttpRequest();
              document.getElementById("msptext").innerHTML='';  
            }
          } 
          function y(){
              var xmlhttp=new XMLHttpRequest();
              xmlhttp.open("GET","d2d.php?d2d=y",false);
              xmlhttp.send(null);
              document.getElementById("d2dtext").innerHTML=xmlhttp.responseText;
          }
          function n(){
              var xmlhttp=new XMLHttpRequest();
              xmlhttp.open("GET","d2d.php?d2d=n",false);
              xmlhttp.send(null);
              document.getElementById("d2dtext").innerHTML=xmlhttp.responseText;
          }
          function othersfordip(){
                    var sp = document.getElementById("dsp").value;
                    if(sp == "OTHERS")
                    {
                      var xmlhttp=new XMLHttpRequest();
                      document.getElementById("dsptext").innerHTML='<input type="text" name="others_sp_dip" class="form-control mt-2" placeholder="Specify Your Specialzation">';
                    }
                    else{
                      var xmlhttp=new XMLHttpRequest();
                      document.getElementById("dsptext").innerHTML='';  
                    }
                  }

              
               function othersfordipspyba(){
                    var sp = document.getElementById("diplomasp").value;
                    if(sp == "OTHERS")
                    {
                      var xmlhttp=new XMLHttpRequest();
                      document.getElementById("dsptext").innerHTML='<input type="text" name="others_sp_dip_y_ba" class="form-control mt-2" placeholder="Specify Your Specialzation">';
                    }
                    else{
                      var xmlhttp=new XMLHttpRequest();
                      document.getElementById("dsptext").innerHTML='';  
                    }
                  }    


                function othersforbach(){
                    var sp = document.getElementById("bbdegree").value;
                    if(sp == "OTHERS")
                    {
                      var xmlhttp=new XMLHttpRequest();
                      document.getElementById("bachsptext").innerHTML='<input type="text" name="others_sp_bach_n_d2d_ba" class="form-control mt-2" placeholder="Specify Your Degree">';
                    }
                    else{
                      var xmlhttp=new XMLHttpRequest();
                      document.getElementById("bachsptext").innerHTML='';  
                    }
                  }
                  function othersforbachforMAandd2dY(){
                    var sp = document.getElementById("bbdegree").value;
                    if(sp == "OTHERS")
                    {
                      var xmlhttp=new XMLHttpRequest();
                      document.getElementById("bachsptext").innerHTML='<input type="text" name="others_sp_bach_d2dY" class="form-control mt-2" placeholder="Specify Your Degree">';
                    }
                    else{
                      var xmlhttp=new XMLHttpRequest();
                      document.getElementById("bachsptext").innerHTML='';  
                    }
                  }
                  function otherfordipmastertypey(){
                    var sp = document.getElementById("masterdegree").value;
                    if(sp == "OTHERS")
                    {
                      var xmlhttp=new XMLHttpRequest();
                      document.getElementById("mastersptext").innerHTML='<input type="text" name="other_for_master_dip_y" class="form-control mt-2" placeholder="Specify Your Degree">';
                    }
                    else{
                      var xmlhttp=new XMLHttpRequest();
                      document.getElementById("mastersptext").innerHTML='';  
                    }
                  }  

                function othersformaster(){
                    var sp = document.getElementById("mastersp").value;
                    if(sp == "OTHERS")
                    {
                      var xmlhttp=new XMLHttpRequest();
                      document.getElementById("mastersptext").innerHTML='<input type="text" name="others_sp_master" class="form-control mt-2" placeholder="Specify Your Specialzation">';
                    }
                    else{
                      var xmlhttp=new XMLHttpRequest();
                      document.getElementById("mastersptext").innerHTML='';  
                    }
                  }              
        </script>
<?php 
  include('footer.php');
  ob_flush();
?>      






<?php 
  if(isset($_REQUEST["submit"])){
    if(isset($_REQUEST["de2dep"])){
      $d2dradio = $_REQUEST["de2dep"];  
  if($d2d == "1"){
        if($d2dradio == "Y")
        {
                if($type == "MA"){

                            $sid = $data["STUDENT_ID"];
                            $tenthBoard = $_REQUEST["10thBoard"];
                            $tenthschool = $_REQUEST["10thschool"];
                            $tenper=$_REQUEST["10thper"];
                            $dipsem1=$_REQUEST["d1sem"];
                            $dipsem2=$_REQUEST["d2sem"];
                            $dipsem3=$_REQUEST["d3sem"];
                            $dipsem4=$_REQUEST["d4sem"];
                            $dipsem5=$_REQUEST["d5sem"];
                            $dipsem6=$_REQUEST["d6sem"]; 
                            $dipuni=$_REQUEST["duniversity"];
                            $dsp=$_REQUEST["dsp"];
                            if($dsp == "OTHERS"){
                              $dsp=$_REQUEST["others_sp_dip"];
                            }
                           $dins=$_REQUEST["diplomainstitute"];
                           $bachsem3=$_REQUEST["bach3sem"];
                           $bachsem4=$_REQUEST["bach4sem"];
                           $bachsem5=$_REQUEST["bach5sem"];
                           $bachsem6=$_REQUEST["bach6sem"];
                           $bachsem7=$_REQUEST["bach7sem"];
                           $bachsem8=$_REQUEST["bach8sem"];
                           $bachuni=$_REQUEST["bachuniversity"];
                           $bachdegree = $_REQUEST["bbdegree"];
                           if($bachdegree == "OTHERS"){
                            $bachdegree=$_REQUEST["others_sp_bach_d2dY"];
                           }
                           $bashsp=$_REQUEST["sp_b_b_d2dY"];
                           $bachcname=$_REQUEST["bachd2dYMAinstitute"];
                           $mastersem1=$_REQUEST["master1sem"];
                           $mastersem2=$_REQUEST["master2sem"];
                           $mastersem3=$_REQUEST["master3sem"];
                           $mastersem4=$_REQUEST["master4sem"];
                           $uname_m=$_REQUEST["masterdipuname"];
                           $ist_m=$_REQUEST["masterins"];
                           $sp_m=$_REQUEST["mastersp"];
                           $degree_m=$_REQUEST["masterdegree"];
                           if($degree_m == "OTHERS"){
                             $degree_m=$_REQUEST["other_for_master_dip_y"];
                           }

                           $stmt2=$con->prepare("CALL D6B6M4(:sid,:10board,:10school,:per10,:duniversity,:diplomainstitute,:dsp,:d1,:d2,:d3,:d4,:d5,:d6,:bachuni,:bachinstitute,:bsp,:bdegree,:b3,:b4,:b5,:b6,:b7,:b8,:m1,:m2,:m3,:m4,:university_m,:institution_m,:specialization_m,:degree_m);");
                           $stmt2->bindParam(":sid",$sid);
                           $stmt2->bindParam(":10board",$tenthBoard);
                           $stmt2->bindParam(":10school",$tenthschool);
                           $stmt2->bindParam(":per10",$tenper);
                           $stmt2->bindParam(":duniversity",$dipuni);
                           $stmt2->bindParam(":diplomainstitute",$dins);
                           $stmt2->bindParam(":dsp",$dsp);
                           $stmt2->bindParam(":d1",$dipsem1);
                           $stmt2->bindParam(":d2",$dipsem2);
                           $stmt2->bindParam(":d3",$dipsem3);
                           $stmt2->bindParam(":d4",$dipsem4);
                           $stmt2->bindParam(":d5",$dipsem5);
                           $stmt2->bindParam(":d6",$dipsem6);
                           $stmt2->bindParam(":bachuni",$bachuni);
                           $stmt2->bindParam(":bachinstitute",$bachcname);
                           $stmt2->bindParam(":bsp",$bashsp);
                           $stmt2->bindParam(":bdegree",$bachdegree);
                           $stmt2->bindParam(":b3",$bachsem3);
                           $stmt2->bindParam(":b4",$bachsem4);
                           $stmt2->bindParam(":b5",$bachsem5);
                           $stmt2->bindParam(":b6",$bachsem6);
                           $stmt2->bindParam(":b7",$bachsem7);
                           $stmt2->bindParam(":b8",$bachsem8);
                           $stmt2->bindParam(":m1",$mastersem1);
                           $stmt2->bindParam(":m2",$mastersem2);
                           $stmt2->bindParam(":m3",$mastersem3);
                           $stmt2->bindParam(":m4",$mastersem4);
                           $stmt2->bindParam(":university_m",$uname_m);
                           $stmt2->bindParam(":institution_m",$ist_m);
                           $stmt2->bindParam(":specialization_m",$sp_m);
                           $stmt2->bindParam(":degree_m",$degree_m);
                           $stmt2->execute();
                           $stmt2=$con->prepare("CALL D6B6M4(:sid,:10board,:10school,:per10,:duniversity,:diplomainstitute,:dsp,:d1,:d2,:d3,:d4,:d5,:d6,:bachuni,:bachinstitute,:bsp,:bdegree,:b3,:b4,:b5,:b6,:b7,:b8,:m1,:m2,:m3,:m4,:university_m,:institution_m,:specialization_m,:degree_m);");
                           $stmt2->bindParam(":sid",$sid);
                           $stmt2->bindParam(":10board",$tenthBoard);
                           $stmt2->bindParam(":10school",$tenthschool);
                           $stmt2->bindParam(":per10",$tenper);
                           $stmt2->bindParam(":duniversity",$dipuni);
                           $stmt2->bindParam(":diplomainstitute",$dins);
                           $stmt2->bindParam(":dsp",$dsp);
                           $stmt2->bindParam(":d1",$dipsem1);
                           $stmt2->bindParam(":d2",$dipsem2);
                           $stmt2->bindParam(":d3",$dipsem3);
                           $stmt2->bindParam(":d4",$dipsem4);
                           $stmt2->bindParam(":d5",$dipsem5);
                           $stmt2->bindParam(":d6",$dipsem6);
                           $stmt2->bindParam(":bachuni",$bachuni);
                           $stmt2->bindParam(":bachinstitute",$bachcname);
                           $stmt2->bindParam(":bsp",$bashsp);
                           $stmt2->bindParam(":bdegree",$bachdegree);
                           $stmt2->bindParam(":b3",$bachsem3);
                           $stmt2->bindParam(":b4",$bachsem4);
                           $stmt2->bindParam(":b5",$bachsem5);
                           $stmt2->bindParam(":b6",$bachsem6);
                           $stmt2->bindParam(":b7",$bachsem7);
                           $stmt2->bindParam(":b8",$bachsem8);
                           $stmt2->bindParam(":m1",$mastersem1);
                           $stmt2->bindParam(":m2",$mastersem2);
                           $stmt2->bindParam(":m3",$mastersem3);
                           $stmt2->bindParam(":m4",$mastersem4);
                           $stmt2->bindParam(":university_m",$uname_m);
                           $stmt2->bindParam(":institution_m",$ist_m);
                           $stmt2->bindParam(":specialization_m",$sp_m);
                           $stmt2->bindParam(":degree_m",$degree_m);
                           $stmt2->execute();
                           //print_r($stmt2->errorinfo());
                           if($stmt2 == TRUE){
                            echo "<script>alert('Data Insert')</script>";
                           }
                           else{
                            echo "<script>alert('Data Are Not Insert')</script>";
                           }

                }elseif ($type == "BA") {
                  
                            $sid = $data["STUDENT_ID"];
                            $tenthBoard = $_REQUEST["10thBoard"];
                            $tenthschool = $_REQUEST["10thschool"];
                            $tenper=$_REQUEST["10thper"];
                            $dipuy = $_REQUEST["dipuniversityba"];
                            $dipinsyba = $_REQUEST["dipinsbay"];
                            $dspyba = $_REQUEST["diplomasp"];
                            if($dspyba == "OTHERS"){
                                $dspyba = $_REQUEST["others_sp_dip_y_ba"];
                            }
                            $dsem1=$_REQUEST["Yd2dd1sem"];
                            $dsem2=$_REQUEST["Yd2dd2sem"];
                            $dsem3=$_REQUEST["Yd2dd3sem"];
                            $dsem4=$_REQUEST["Yd2dd4sem"];
                            $dsem5=$_REQUEST["Yd2dd5sem"];
                            $dsem6=$_REQUEST["Yd2dd6sem"];
                            $bachsem1forbay=$_REQUEST["bach3sembay"];
                            $bachsem2forbay=$_REQUEST["bach4sembay"];
                            $bachsem3forbay=$_REQUEST["bach5sembay"];
                            $bachsem4forbay=$_REQUEST["bach6sembay"];
                            $bachsem5forbay=$_REQUEST["bach7sembay"];
                            $bachsem6forbay=$_REQUEST["bach8sembay"];
                            $university_b=$_REQUEST["bachuniversity"];
                            $institute_b=$_REQUEST["bachd2dYMAinstitute"];
                            $specialization_b=$_REQUEST["sp_b_b_d2dY"];
                            $degree_b=$_REQUEST["bbdegree"];
                            if($degree_b == "OTHERS"){
                              $degree_b=$_REQUEST["others_sp_bach_d2dY"];
                            }

                           $stmt3=$con->prepare("CALL D6B6(:sid,:10board,:10school,:per10,:duniversity,:diplomainstitute,:dsp,:d1,:d2,:d3,:d4,:d5,:d6,:b3,:b4,:b5,:b6,:b7,:b8,:university_b,:institute_b,:specialization_b,:degree_b);");
                           $stmt3->bindParam(":sid",$sid);
                           $stmt3->bindParam(":10board",$tenthBoard);
                           $stmt3->bindParam(":10school",$tenthschool);
                           $stmt3->bindParam(":per10",$tenper);
                           $stmt3->bindParam(":duniversity",$dipuy);
                           $stmt3->bindParam(":diplomainstitute",$dipinsyba);
                           $stmt3->bindParam(":dsp",$dspyba);
                           $stmt3->bindParam(":d1",$dsem1);
                           $stmt3->bindParam(":d2",$dsem2);
                           $stmt3->bindParam(":d3",$dsem3);
                           $stmt3->bindParam(":d4",$dsem4);
                           $stmt3->bindParam(":d5",$dsem5);
                           $stmt3->bindParam(":d6",$dsem6);
                           $stmt3->bindParam(":b3",$bachsem1forbay);
                           $stmt3->bindParam(":b4",$bachsem2forbay);
                           $stmt3->bindParam(":b5",$bachsem3forbay);
                           $stmt3->bindParam(":b6",$bachsem4forbay);
                           $stmt3->bindParam(":b7",$bachsem5forbay);
                           $stmt3->bindParam(":b8",$bachsem6forbay);
                           $stmt3->bindParam(":university_b",$university_b);
                           $stmt3->bindParam(":institute_b",$institute_b);
                           $stmt3->bindParam(":specialization_b",$specialization_b);
                           $stmt3->bindParam(":degree_b",$degree_b);
                           $stmt3->execute();
                             $stmt3=$con->prepare("CALL D6B6(:sid,:10board,:10school,:per10,:duniversity,:diplomainstitute,:dsp,:d1,:d2,:d3,:d4,:d5,:d6,:b3,:b4,:b5,:b6,:b7,:b8,:university_b,:institute_b,:specialization_b,:degree_b);");
                           $stmt3->bindParam(":sid",$sid);
                           $stmt3->bindParam(":10board",$tenthBoard);
                           $stmt3->bindParam(":10school",$tenthschool);
                           $stmt3->bindParam(":per10",$tenper);
                           $stmt3->bindParam(":duniversity",$dipuy);
                           $stmt3->bindParam(":diplomainstitute",$dipinsyba);
                           $stmt3->bindParam(":dsp",$dspyba);
                           $stmt3->bindParam(":d1",$dsem1);
                           $stmt3->bindParam(":d2",$dsem2);
                           $stmt3->bindParam(":d3",$dsem3);
                           $stmt3->bindParam(":d4",$dsem4);
                           $stmt3->bindParam(":d5",$dsem5);
                           $stmt3->bindParam(":d6",$dsem6);
                           $stmt3->bindParam(":b3",$bachsem1forbay);
                           $stmt3->bindParam(":b4",$bachsem2forbay);
                           $stmt3->bindParam(":b5",$bachsem3forbay);
                           $stmt3->bindParam(":b6",$bachsem4forbay);
                           $stmt3->bindParam(":b7",$bachsem5forbay);
                           $stmt3->bindParam(":b8",$bachsem6forbay);
                           $stmt3->bindParam(":university_b",$university_b);
                           $stmt3->bindParam(":institute_b",$institute_b);
                           $stmt3->bindParam(":specialization_b",$specialization_b);
                           $stmt3->bindParam(":degree_b",$degree_b);
                           $stmt3->execute(); 
                           //print_r($stmt3 ->errorinfo());
                           if($stmt3 == TRUE){
                            echo "<script>alert('Data Insert')</script>";
                           }
                           else{
                            echo "<script>alert('Data Are Not Insert')</script>";
                           }
                }
              }elseif ($d2dradio == "N") {
                if($type == "MA"){

                            $sid = $data["STUDENT_ID"];
                            $tenthBoard = $_REQUEST["10thBoard"];
                            $tenthschool = $_REQUEST["10thschool"];
                            $tenper=$_REQUEST["10thper"];
                            $twboard=$_REQUEST["12thBoard"];
                            $twschool=$_REQUEST["12thpassschool"];
                            $twper=$_REQUEST["12thper"];
                            $twsp=$_REQUEST["12thspecialization"];  
                            if($twsp == "OTHERS"){
                              $twsp=$_REQUEST["others_sp_d2d_n_12th"];  
                            }
                            $bachnd2duni=$_REQUEST["bunind2d"];
                            $bachinstitutend2d=$_REQUEST["binstitutend2d"];
                            $bachsp=$_REQUEST["sp_b_n_d2d"];
                            $bachdegree=$_REQUEST["bbdegree"];   
                            if($bachdegree == "OTHERS"){
                              $bachdegree=$_REQUEST["others_sp_bach_n_d2d_ba"];   
                            }
                            $bachsem1nd2dma=$_REQUEST["b1semnd2d"];
                            $bachsem2nd2dma=$_REQUEST["b2semnd2d"];
                            $bachsem3nd2dma=$_REQUEST["b3semnd2d"];
                            $bachsem4nd2dma=$_REQUEST["b4semnd2d"];
                            $bachsem5nd2dma=$_REQUEST["b5semnd2d"];
                            $bachsem6nd2dma=$_REQUEST["b6semnd2d"];
                            $bachsem7nd2dma=$_REQUEST["b7semnd2d"];
                            $bachsem8nd2dma=$_REQUEST["b8semnd2d"]; 
                            $mastersem1nd2dma=$_REQUEST["msem1nd2dma"];
                            $mastersem2nd2dma=$_REQUEST["msem2nd2dma"];
                            $mastersem3nd2dma=$_REQUEST["msem3nd2dma"];
                            $mastersem4nd2dma=$_REQUEST["msem4nd2dma"];
                            $uname_m=$_REQUEST["masterdipuname"];
                            $ist_m=$_REQUEST["masterins"];
                            $sp_m=$_REQUEST["mastersp"];
                            $degree_m=$_REQUEST["masterdegree"];
                            if($degree_m == "OTHERS"){
                              $degree_m=$_REQUEST["other_for_master_dip_y"];
                            }
  
                            $stmt4=$con->prepare("CALL B8M4(:sid,:10board,:10school,:per10,:12board,:12school,:12stream,:12per,:bachuni,:bachinstitute,:bsp,:bdegree,:b1,:b2,:b3,:b4,:b5,:b6,:b7,:b8,:m1,:m2,:m3,:m4,:university_m,:institute_m,:specialization_m,:degree_m);");
                            $stmt4->bindParam(":sid",$sid);    
                            $stmt4->bindParam(":10board",$tenthBoard);
                            $stmt4->bindParam(":10school",$tenthschool);
                            $stmt4->bindParam(":per10",$tenper); 
                            $stmt4->bindParam(":12board",$twboard);    
                            $stmt4->bindParam(":12school",$twschool);      
                            $stmt4->bindParam(":12stream",$twsp);      
                            $stmt4->bindParam(":12per",$twper);      
                            $stmt4->bindParam(":bachuni",$bachnd2duni);      
                            $stmt4->bindParam(":bachinstitute",$bachinstitutend2d);  
                            $stmt4->bindParam(":bsp",$bachsp);      
                            $stmt4->bindParam(":bdegree",$bachdegree);      
                            $stmt4->bindParam(":b1",$bachsem1nd2dma);      
                            $stmt4->bindParam(":b2",$bachsem2nd2dma);      
                            $stmt4->bindParam(":b3",$bachsem3nd2dma);      
                            $stmt4->bindParam(":b4",$bachsem4nd2dma);      
                            $stmt4->bindParam(":b5",$bachsem5nd2dma);      
                            $stmt4->bindParam(":b6",$bachsem6nd2dma);      
                            $stmt4->bindParam(":b7",$bachsem7nd2dma);      
                            $stmt4->bindParam(":b8",$bachsem8nd2dma);      
                            $stmt4->bindParam(":m1",$mastersem1nd2dma);      
                            $stmt4->bindParam(":m2",$mastersem2nd2dma);      
                            $stmt4->bindParam(":m3",$mastersem3nd2dma);      
                            $stmt4->bindParam(":m4",$mastersem4nd2dma);
                            $stmt4->bindParam(":university_m",$uname_m);
                            $stmt4->bindParam(":institute_m",$ist_m);
                            $stmt4->bindParam(":specialization_m",$sp_m);
                            $stmt4->bindParam(":degree_m",$degree_m);
                            $stmt4->execute();
                           $stmt4=$con->prepare("CALL B8M4(:sid,:10board,:10school,:per10,:12board,:12school,:12stream,:12per,:bachuni,:bachinstitute,:bsp,:bdegree,:b1,:b2,:b3,:b4,:b5,:b6,:b7,:b8,:m1,:m2,:m3,:m4,:university_m,:institute_m,:specialization_m,:degree_m);");
                            $stmt4->bindParam(":sid",$sid);    
                            $stmt4->bindParam(":10board",$tenthBoard);
                            $stmt4->bindParam(":10school",$tenthschool);
                            $stmt4->bindParam(":per10",$tenper); 
                            $stmt4->bindParam(":12board",$twboard);    
                            $stmt4->bindParam(":12school",$twschool);      
                            $stmt4->bindParam(":12stream",$twsp);      
                            $stmt4->bindParam(":12per",$twper);      
                            $stmt4->bindParam(":bachuni",$bachnd2duni);      
                            $stmt4->bindParam(":bachinstitute",$bachinstitutend2d);  
                            $stmt4->bindParam(":bsp",$bachsp);      
                            $stmt4->bindParam(":bdegree",$bachdegree);      
                            $stmt4->bindParam(":b1",$bachsem1nd2dma);      
                            $stmt4->bindParam(":b2",$bachsem2nd2dma);      
                            $stmt4->bindParam(":b3",$bachsem3nd2dma);      
                            $stmt4->bindParam(":b4",$bachsem4nd2dma);      
                            $stmt4->bindParam(":b5",$bachsem5nd2dma);      
                            $stmt4->bindParam(":b6",$bachsem6nd2dma);      
                            $stmt4->bindParam(":b7",$bachsem7nd2dma);      
                            $stmt4->bindParam(":b8",$bachsem8nd2dma);      
                            $stmt4->bindParam(":m1",$mastersem1nd2dma);      
                            $stmt4->bindParam(":m2",$mastersem2nd2dma);      
                            $stmt4->bindParam(":m3",$mastersem3nd2dma);      
                            $stmt4->bindParam(":m4",$mastersem4nd2dma);
                            $stmt4->bindParam(":university_m",$uname_m);
                            $stmt4->bindParam(":institute_m",$ist_m);
                            $stmt4->bindParam(":specialization_m",$sp_m);
                            $stmt4->bindParam(":degree_m",$degree_m);
                            $stmt4->execute();
                            //print_r($stmt4 ->errorinfo());
                             if($stmt4 == TRUE){
                              echo "<script>alert('Data Insert')</script>";
                             }
                             else{
                              echo "<script>alert('Data Are Not Insert')</script>";
                             }

                }elseif ($type == "BA") {

                            $sid = $data["STUDENT_ID"];
                      
                            $tenthBoard = $_REQUEST["10thBoard"];
                            $tenthschool = $_REQUEST["10thschool"];
                            $tenper=$_REQUEST["10thper"];
                            $twboard=$_REQUEST["12thBoard"];
                            $twschool=$_REQUEST["12thpassschool"];
                            $twper=$_REQUEST["12thper"];
                            $twsp=$_REQUEST["12thspecialization"];  
                            if($twsp == "OTHERS"){
                              $twsp=$_REQUEST["others_sp_d2d_n_12th"];  
                            }
                            $bachsem1nd2dma=$_REQUEST["b1semnd2dba"];
                            $bachsem2nd2dma=$_REQUEST["b2semnd2dba"];
                            $bachsem3nd2dma=$_REQUEST["b3semnd2dba"];
                            $bachsem4nd2dma=$_REQUEST["b4semnd2dba"];
                            $bachsem5nd2dma=$_REQUEST["b5semnd2dba"];
                            $bachsem6nd2dma=$_REQUEST["b6semnd2dba"];
                            $bachsem7nd2dma=$_REQUEST["b7semnd2dba"];
                            $bachsem8nd2dma=$_REQUEST["b8semnd2dba"];
                            $university_b=$_REQUEST["bachuniversity"];
                            $institute_b=$_REQUEST["bachd2dYMAinstitute"];
                            $specialization_b=$_REQUEST["sp_b_b_d2dY"];
                            $degree_b=$_REQUEST["bbdegree"];
                            if($degree_b == "OTHERS"){
                              $degree_b=$_REQUEST["others_sp_bach_d2dY"];
                            }
                            $stmt5=$con->prepare("CALL B8(:sid,:10board,:10school,:per10,:12board,:12school,:12stream,:12per,:b1,:b2,:b3,:b4,:b5,:b6,:b7,:b8,:university_b,:institute_b,:specialization_b,:degree_b);");  
                            $stmt5->bindParam(":sid",$sid);    
                            $stmt5->bindParam(":10board",$tenthBoard);
                            $stmt5->bindParam(":10school",$tenthschool);
                            $stmt5->bindParam(":per10",$tenper); 
                            $stmt5->bindParam(":12board",$twboard);    
                            $stmt5->bindParam(":12school",$twschool);      
                            $stmt5->bindParam(":12stream",$twsp);      
                            $stmt5->bindParam(":12per",$twper);      
                            $stmt5->bindParam(":b1",$bachsem1nd2dma);      
                            $stmt5->bindParam(":b2",$bachsem2nd2dma);      
                            $stmt5->bindParam(":b3",$bachsem3nd2dma);      
                            $stmt5->bindParam(":b4",$bachsem4nd2dma);      
                            $stmt5->bindParam(":b5",$bachsem5nd2dma);      
                            $stmt5->bindParam(":b6",$bachsem6nd2dma);      
                            $stmt5->bindParam(":b7",$bachsem7nd2dma);      
                            $stmt5->bindParam(":b8",$bachsem8nd2dma);
                            $stmt5->bindParam(":university_b",$university_b);
                            $stmt5->bindParam(":institute_b",$institute_b);
                            $stmt5->bindParam(":specialization_b",$specialization_b);
                            $stmt5->bindParam(":degree_b",$degree_b);
                            $stmt5->execute();
                            $stmt5=$con->prepare("CALL B8(:sid,:10board,:10school,:per10,:12board,:12school,:12stream,:12per,:b1,:b2,:b3,:b4,:b5,:b6,:b7,:b8,:university_b,:institute_b,:specialization_b,:degree_b);");  
                            $stmt5->bindParam(":sid",$sid);    
                            $stmt5->bindParam(":10board",$tenthBoard);
                            $stmt5->bindParam(":10school",$tenthschool);
                            $stmt5->bindParam(":per10",$tenper); 
                            $stmt5->bindParam(":12board",$twboard);    
                            $stmt5->bindParam(":12school",$twschool);      
                            $stmt5->bindParam(":12stream",$twsp);      
                            $stmt5->bindParam(":12per",$twper);      
                            $stmt5->bindParam(":b1",$bachsem1nd2dma);      
                            $stmt5->bindParam(":b2",$bachsem2nd2dma);      
                            $stmt5->bindParam(":b3",$bachsem3nd2dma);      
                            $stmt5->bindParam(":b4",$bachsem4nd2dma);      
                            $stmt5->bindParam(":b5",$bachsem5nd2dma);      
                            $stmt5->bindParam(":b6",$bachsem6nd2dma);      
                            $stmt5->bindParam(":b7",$bachsem7nd2dma);      
                            $stmt5->bindParam(":b8",$bachsem8nd2dma);
                            $stmt5->bindParam(":university_b",$university_b);
                            $stmt5->bindParam(":institute_b",$institute_b);
                            $stmt5->bindParam(":specialization_b",$specialization_b);
                            $stmt5->bindParam(":degree_b",$degree_b);
                            $stmt5->execute();
                           //print_r($stmt5 ->errorinfo());
                          if($stmt5 == TRUE){
                            echo "<script>alert('Data Insert')</script>";
                           }
                           else{
                            echo "<script>alert('Data Are Not Insert')</script>";
                           }                            
                }
        }

    }
   
  }
  elseif ($d2d == "0") {
      if($type == "BA"){
                 $sid = $data["STUDENT_ID"];
                 $tenthBoard = $_REQUEST["10thBoard"];
                 $tenthschool = $_REQUEST["10thschool"];
                 $tenper=$_REQUEST["10thper"];
                 $tw0baboard=$_REQUEST["12thBoard"];
                 $tw0sp=$_REQUEST["12thspecialization"];
                 if($tw0sp == "OTHERS"){
                  $tw0sp=$_REQUEST["others_sp_ba_12th"];
                 }
                 $twper=$_REQUEST["12thper"];
                 $twschoolname=$_REQUEST["12thpassschool"]; 
                 $b1=$_REQUEST["bach1semba"];  
                 $b2=$_REQUEST["bach2semba"];
                 $b3=$_REQUEST["bach3semba"];
                 $b4=$_REQUEST["bach4semba"];
                 $b5=$_REQUEST["bach5semba"];
                 $b6=$_REQUEST["bach6semba"];
                 $university_b=$_REQUEST["bunamema"];
                 $institute_b=$_REQUEST["bmainstitute"];
                 $specialization_b=$_REQUEST["degreesp"];
                 $degree_b=$_REQUEST["bdgree"]; 
                 if($degree_b == "OTHERS"){
                 $degree_b=$_REQUEST["others_sp_bach_ma"]; 
                  }
                 $stmt6=$con->prepare("CALL B6(:sid,:10board,:10school,:per10,:12board,:12school,:12stream,:12per,:b1,:b2,:b3,:b4,:b5,:b6,:university_b,:institute_b,:specialization_b,:degree_b);");  
                 $stmt6->bindParam(":sid",$sid);    
                 $stmt6->bindParam(":10board",$tenthBoard);
                 $stmt6->bindParam(":10school",$tenthschool);
                 $stmt6->bindParam(":per10",$tenper); 
                 $stmt6->bindParam(":12board",$tw0baboard);    
                 $stmt6->bindParam(":12school",$twschoolname);      
                 $stmt6->bindParam(":12stream",$tw0sp);      
                 $stmt6->bindParam(":12per",$twper);      
                 $stmt6->bindParam(":b1",$b1);                       
                 $stmt6->bindParam(":b2",$b2);
                 $stmt6->bindParam(":b3",$b3);
                 $stmt6->bindParam(":b4",$b4);
                 $stmt6->bindParam(":b5",$b5);
                 $stmt6->bindParam(":b6",$b6);
                 $stmt6->bindParam(":university_b",$university_b);
                 $stmt6->bindParam(":institute_b",$institute_b);
                 $stmt6->bindParam(":specialization_b",$specialization_b);
                 $stmt6->bindParam(":degree_b",$degree_b);
                 $stmt6->execute();
                  $stmt6=$con->prepare("CALL B6(:sid,:10board,:10school,:per10,:12board,:12school,:12stream,:12per,:b1,:b2,:b3,:b4,:b5,:b6,:university_b,:institute_b,:specialization_b,:degree_b);");  
                 $stmt6->bindParam(":sid",$sid);    
                 $stmt6->bindParam(":10board",$tenthBoard);
                 $stmt6->bindParam(":10school",$tenthschool);
                 $stmt6->bindParam(":per10",$tenper); 
                 $stmt6->bindParam(":12board",$tw0baboard);    
                 $stmt6->bindParam(":12school",$twschoolname);      
                 $stmt6->bindParam(":12stream",$tw0sp);      
                 $stmt6->bindParam(":12per",$twper);      
                 $stmt6->bindParam(":b1",$b1);                       
                 $stmt6->bindParam(":b2",$b2);
                 $stmt6->bindParam(":b3",$b3);
                 $stmt6->bindParam(":b4",$b4);
                 $stmt6->bindParam(":b5",$b5);
                 $stmt6->bindParam(":b6",$b6);
                 $stmt6->bindParam(":university_b",$university_b);
                 $stmt6->bindParam(":institute_b",$institute_b);
                 $stmt6->bindParam(":specialization_b",$specialization_b);
                 $stmt6->bindParam(":degree_b",$degree_b);
                 $stmt6->execute();
                 //print_r($stmt6->errorinfo());
                 if($stmt6 == TRUE){
                            echo "<script>alert('Data Insert')</script>";
                 }
                 else{
                            echo "<script>alert('Data Are Not Insert')</script>";
                 } 

      } 
      elseif ($type == "MA") {

                 $sid = $data["STUDENT_ID"];
                 $tenthBoard = $_REQUEST["10thBoard"];
                 $tenthschool = $_REQUEST["10thschool"];
                 $tenper=$_REQUEST["10thper"];
                 $tw0baboard=$_REQUEST["12thBoard"];
                 $tw0sp=$_REQUEST["12thspecialization"];
                 if($tw0sp == "OTHERS"){
                  $tw0sp=$_REQUEST["others_sp_ba_12th"];
                 }
                 $twper=$_REQUEST["12thper"];
                 $twschoolname=$_REQUEST["12thpassschool"];
                 $bachinsma=$_REQUEST["bmainstitute"];
                 $bachspma=$_REQUEST["degreesp"];  
                 $bachdegreema=$_REQUEST["bdgree"]; 
                 if($bachdegreema == "OTHERS"){
                  $bachdegreema=$_REQUEST["others_sp_bach_ma"]; 
                 } 
                 $bachuniversityma=$_REQUEST["bunamema"];
                 $bsem1ma=$_REQUEST["b1semma"];
                 $bsem2ma=$_REQUEST["b2semma"];
                 $bsem3ma=$_REQUEST["b3semma"];
                 $bsem4ma=$_REQUEST["b4semma"];
                 $bsem5ma=$_REQUEST["b5semma"];
                 $bsem6ma=$_REQUEST["b6semma"]; 
                 $msem1ma=$_REQUEST["m1sem"];
                 $msem2ma=$_REQUEST["m2sem"];
                 $msem3ma=$_REQUEST["m3sem"];
                 $msem4ma=$_REQUEST["m4sem"];                   
                 $university_m=$_REQUEST["masteruname"];
                 $institute_m=$_REQUEST["masterins"];
                 $specialization_m=$_REQUEST["mastersp"];
                 $degree_m=$_REQUEST["masterdegree"]; 
                 if($degree_m == "OTHERS"){
                 $degree_m=$_REQUEST["others_sp_master_type_ma"]; 
                  }
                $stmt7=$con->prepare("CALL B6M4(:sid,:10board,:10school,:per10,:12board,:12school,:12stream,:12per,:buni,:bins,:bsp,:bdegree,:b1,:b2,:b3,:b4,:b5,:b6,:m1,:m2,:m3,:m4,:university_m,:institute_m,:specialization_m,:degree_m);");  
                 $stmt7->bindParam(":sid",$sid);    
                 $stmt7->bindParam(":10board",$tenthBoard);
                 $stmt7->bindParam(":10school",$tenthschool);
                 $stmt7->bindParam(":per10",$tenper); 
                 $stmt7->bindParam(":12board",$tw0baboard);    
                 $stmt7->bindParam(":12school",$twschoolname);      
                 $stmt7->bindParam(":12stream",$tw0sp);      
                 $stmt7->bindParam(":12per",$twper);
                 $stmt7->bindParam(":buni",$bachuniversityma);
                 $stmt7->bindParam(":bins",$bachinsma);
                 $stmt7->bindParam(":bsp",$bachspma);
                 $stmt7->bindParam(":bdegree",$bachdegreema);
                 $stmt7->bindParam(":b1",$bsem1ma);
                 $stmt7->bindParam(":b2",$bsem2ma);
                 $stmt7->bindParam(":b3",$bsem3ma);
                 $stmt7->bindParam(":b4",$bsem4ma);
                 $stmt7->bindParam(":b5",$bsem5ma);
                 $stmt7->bindParam(":b6",$bsem6ma);
                 $stmt7->bindParam(":m1",$msem1ma);
                 $stmt7->bindParam(":m2",$msem2ma);
                 $stmt7->bindParam(":m3",$msem3ma);
                 $stmt7->bindParam(":m4",$msem4ma);
                 $stmt7->bindParam(":university_m",$university_m);
                 $stmt7->bindParam(":institute_m",$institute_m);
                 $stmt7->bindParam(":specialization_m",$specialization_m);
                 $stmt7->bindParam(":degree_m",$degree_m);
                 $stmt7->execute();
                 
                $stmt7=$con->prepare("CALL B6M4(:sid,:10board,:10school,:per10,:12board,:12school,:12stream,:12per,:buni,:bins,:bsp,:bdegree,:b1,:b2,:b3,:b4,:b5,:b6,:m1,:m2,:m3,:m4,:university_m,:institute_m,:specialization_m,:degree_m);");  
                 $stmt7->bindParam(":sid",$sid);    
                 $stmt7->bindParam(":10board",$tenthBoard);
                 $stmt7->bindParam(":10school",$tenthschool);
                 $stmt7->bindParam(":per10",$tenper); 
                 $stmt7->bindParam(":12board",$tw0baboard);    
                 $stmt7->bindParam(":12school",$twschoolname);      
                 $stmt7->bindParam(":12stream",$tw0sp);      
                 $stmt7->bindParam(":12per",$twper);
                 $stmt7->bindParam(":buni",$bachuniversityma);
                 $stmt7->bindParam(":bins",$bachinsma);
                 $stmt7->bindParam(":bsp",$bachspma);
                 $stmt7->bindParam(":bdegree",$bachdegreema);
                 $stmt7->bindParam(":b1",$bsem1ma);
                 $stmt7->bindParam(":b2",$bsem2ma);
                 $stmt7->bindParam(":b3",$bsem3ma);
                 $stmt7->bindParam(":b4",$bsem4ma);
                 $stmt7->bindParam(":b5",$bsem5ma);
                 $stmt7->bindParam(":b6",$bsem6ma);
                 $stmt7->bindParam(":m1",$msem1ma);
                 $stmt7->bindParam(":m2",$msem2ma);
                 $stmt7->bindParam(":m3",$msem3ma);
                 $stmt7->bindParam(":m4",$msem4ma);
                 $stmt7->bindParam(":university_m",$university_m);
                 $stmt7->bindParam(":institute_m",$institute_m);
                 $stmt7->bindParam(":specialization_m",$specialization_m);
                 $stmt7->bindParam(":degree_m",$degree_m);
                 $stmt7->execute();
                 //print_r($stmt7->errorinfo());
                  if($stmt7 == TRUE){
                            echo "<script>alert('Data Insert')</script>";
                  }
                  else{
                            echo "<script>alert('Data Are Not Insert')</script>";
                  }
      } 
      elseif ($type == "IBM") {
        
                 $sid = $data["STUDENT_ID"];
                 $tenthBoard = $_REQUEST["10thBoard"];
                 $tenthschool = $_REQUEST["10thschool"];
                 $tenper=$_REQUEST["10thper"];
                 $tw0baboard=$_REQUEST["12thBoard"];
                 $tw0sp=$_REQUEST["12thspecialization"];
                 if($tw0sp == "OTHERS"){
                  $tw0sp=$_REQUEST["others_sp_ba_12th"];
                 }
                 $twper=$_REQUEST["12thper"];
                 $twschoolname=$_REQUEST["12thpassschool"];
                 $i1=$_REQUEST["i1sem"];
                 $i2=$_REQUEST["i2sem"];
                 $i3=$_REQUEST["i3sem"];
                 $i4=$_REQUEST["i4sem"];
                 $i5=$_REQUEST["i5sem"];
                 $i6=$_REQUEST["i6sem"];
                 $i7=$_REQUEST["i7sem"];
                 $i8=$_REQUEST["i8sem"];
                 $i9=$_REQUEST["i9sem"];
                 $i10=$_REQUEST["i10sem"];
                 $university_m=$_REQUEST["masteruname"];
                 $institute_m=$_REQUEST["masterins"];
                 $specialization_m=$_REQUEST["mastersp"];
                 $degree_m=$_REQUEST["masterdegree"]; 
                 if($degree_m == "OTHERS"){
                 $degree_m=$_REQUEST["others_sp_master_type_ma"]; 
                  }

                 $stmt8=$con->prepare("CALL I10(:sid,:10board,:10school,:per10,:12board,:12school,:12stream,:12per,:i1,:i2,:i3,:i4,:i5,:i6,:i7,:i8,:i9,:i10,:university_m,:institute_m,:specialization_m,:degree_m);");  
                 $stmt8->bindParam(":sid",$sid);    
                 $stmt8->bindParam(":10board",$tenthBoard);
                 $stmt8->bindParam(":10school",$tenthschool);
                 $stmt8->bindParam(":per10",$tenper); 
                 $stmt8->bindParam(":12board",$tw0baboard);    
                 $stmt8->bindParam(":12school",$twschoolname);      
                 $stmt8->bindParam(":12stream",$tw0sp);      
                 $stmt8->bindParam(":12per",$twper);      
                 $stmt8->bindParam(":i1",$i1);
                 $stmt8->bindParam(":i2",$i2);
                 $stmt8->bindParam(":i3",$i3);
                 $stmt8->bindParam(":i4",$i4);      
                 $stmt8->bindParam(":i5",$i5);
                 $stmt8->bindParam(":i6",$i6);
                 $stmt8->bindParam(":i7",$i7);
                 $stmt8->bindParam(":i8",$i8);
                 $stmt8->bindParam(":i9",$i9);
                 $stmt8->bindParam(":i10",$i10);
                 $stmt8->bindParam(":university_m",$university_m);
                 $stmt8->bindParam(":institute_m",$institute_m);
                 $stmt8->bindParam(":specialization_m",$specialization_m);
                 $stmt8->bindParam(":degree_m",$degree_m);
                 $stmt8->execute();               
                 $stmt8=$con->prepare("CALL I10(:sid,:10board,:10school,:per10,:12board,:12school,:12stream,:12per,:i1,:i2,:i3,:i4,:i5,:i6,:i7,:i8,:i9,:i10,:university_m,:institute_m,:specialization_m,:degree_m);");  
                 $stmt8->bindParam(":sid",$sid);    
                 $stmt8->bindParam(":10board",$tenthBoard);
                 $stmt8->bindParam(":10school",$tenthschool);
                 $stmt8->bindParam(":per10",$tenper); 
                 $stmt8->bindParam(":12board",$tw0baboard);    
                 $stmt8->bindParam(":12school",$twschoolname);      
                 $stmt8->bindParam(":12stream",$tw0sp);      
                 $stmt8->bindParam(":12per",$twper);      
                 $stmt8->bindParam(":i1",$i1);
                 $stmt8->bindParam(":i2",$i2);
                 $stmt8->bindParam(":i3",$i3);
                 $stmt8->bindParam(":i4",$i4);      
                 $stmt8->bindParam(":i5",$i5);
                 $stmt8->bindParam(":i6",$i6);
                 $stmt8->bindParam(":i7",$i7);
                 $stmt8->bindParam(":i8",$i8);
                 $stmt8->bindParam(":i9",$i9);
                 $stmt8->bindParam(":i10",$i10);
                 $stmt8->bindParam(":university_m",$university_m);
                 $stmt8->bindParam(":institute_m",$institute_m);
                 $stmt8->bindParam(":specialization_m",$specialization_m);
                 $stmt8->bindParam(":degree_m",$degree_m);
                 $stmt8->execute();
                 print_r($stmt8->errorinfo());
                  if($stmt8 == TRUE){
                            echo "<script>alert('Data Insert')</script>";
                  }
                  else{
                            echo "<script>alert('Data Are Not Insert')</script>";
                  } 

      }

  }
}
 ?>
