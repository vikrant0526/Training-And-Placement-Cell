<?php 
	session_start();
	 $d = $_GET["d2d"];
	 $data=$_SESSION['Userdata'];

	 include('../Files/PDO/dbcon.php');
     $bid = $data["STUDENT_BATCH_ID"];
     $stmt=$con->prepare("CALL GET_BATCH_INFO(:bid);");
     $stmt->bindParam(":bid",$bid);  
     $stmt->execute();
     $datauser = $stmt->fetch(PDO::FETCH_ASSOC);
    // $sem = $datauser["BATCH_SEMESTER"];  
     $degree = $datauser["BATCH_DEGREE"];
     $d2d = $datauser["BATCH_D2D"];
     $type = $datauser["BATCH_TYPE"];

	if ($d == "y") {
			if($type == "MA"){
				?>
         	<h4 class="card-title">DIPLOMA</h4>
      					<li>
	                	<input type='text' name='d1sem' class='form-control mt-2' placeholder='Sem 1'>  
	                	<input type='text' name='d2sem' class='form-control mt-2' placeholder='Sem 2'>  
	                	<input type='text' name='d3sem' class='form-control mt-2' placeholder='Sem 3'>  
	                	<input type='text' name='d4sem' class='form-control mt-2' placeholder='Sem 4'>  
	                	<input type='text' name='d5sem' class='form-control mt-2' placeholder='Sem 5'>  
	                	<input type='text' name='d6sem' class='form-control mt-2' placeholder='Sem 6'>  
                	</li>
                	<select name='duniversity' class='form-control mt-2'>
                		<?php	include('university.php'); ?>
                    </select>
                    <select onchange="othersfordip()" id="dsp" name="dsp" class='form-control mt-2'>
                           <option>--Select Specialization--</option>
                           <option value="DIPLOMA (CE)">DIPLOMA (CE)</option>
                           <option value="DIPLOMA (IT)">DIPLOMA (IT)</option>
                           <option value="OTHERS">Other</option>
                       </select>
                      <div id="dsptext"></div>
                     <input type='text' name='diplomainstitute' class='form-control mt-2' placeholder='Institute / College Name'>		
                	 <div>
               		   <hr style="border-top: 1px solid #495057">
              		</div>
              		<h4 class="card-title">BACHELOR</h4>
				      	<li>
	                	<input type='text' name='bach3sem' class='form-control mt-2' placeholder='Sem 3'>  
	                	<input type='text' name='bach4sem' class='form-control mt-2' placeholder='Sem 4'>  
	                	<input type='text' name='bach5sem' class='form-control mt-2' placeholder='Sem 5'>  
	                	<input type='text' name='bach6sem' class='form-control mt-2' placeholder='Sem 6'>  
	                	<input type='text' name='bach7sem' class='form-control mt-2' placeholder='Sem 7'>  
	                	<input type='text' name='bach8sem' class='form-control mt-2' placeholder='Sem 8'>  
                	</li>
               		<select name='bachuniversity' class='form-control mt-2'>
                   		<?php	include('university.php'); ?>
                    </select>
                   <select onchange="othersforbachforMAandd2dY()" id="bbdegree" name="bbdegree" class='form-control mt-2'>
                           <option>--Select Degree--</option>
                           <option value="B.TECH/B.E (CE)">B.TECH/B.E (CE)</option>
                           <option value="B.TECH/B.E (IT)">B.TECH/B.E (IT)</option>
                           <option value="OTHERS">Other</option>
                       </select>
                      <div id="bachsptext"></div>
                      <input type='text' name='sp_b_b_d2dY' class='form-control mt-2' placeholder='Enter Specialization'> 
                      <input type='text' name='bachd2dYMAinstitute' class='form-control mt-2' placeholder='Institute / College Name'>
                	 <div>
               		   <hr style="border-top: 1px solid #495057">
              		</div>
              		<h4 class="card-title">MASTER</h4>		
              		<li>
	                	<input type='text' name='master1sem' class='form-control mt-2' placeholder='Sem 1'>  
	                	<input type='text' name='master2sem' class='form-control mt-2' placeholder='Sem 2'>  
	                	<input type='text' name='master3sem' class='form-control mt-2' placeholder='Sem 3'>  
	                	<input type='text' name='master4sem' class='form-control mt-2' placeholder='Sem 4'>  
	                </li>
                  <select name='masterdipuname' class='form-control mt-2'>
                      <?php include('university.php'); ?>
                  </select>
                   <select onchange="otherfordipmastertypey()" id="masterdegree" name="masterdegree" class='form-control mt-2'>
                           <option>--Select Degree--</option>
                           <option value="M.TECH/M.E (CE)">M.TECH/M.E (CE)</option>
                           <option value="M.TECH/M.E (IT)">M.TECH/M.E (IT)</option>
                           <option value="OTHERS">Other</option>
                       </select>
                      <div id="mastersptext"></div>
                      <input type='text' name='mastersp' class='form-control mt-2' placeholder='Enter Specialization'> 
                      <input type='text' name='masterins' class='form-control mt-2' placeholder='Institute / College Name'>
                  <div>
               		   <hr style="border-top: 1px solid #495057">
              		</div>

				<?php
			}elseif($type == "BA"){
				?>
				<h4 class="card-title">DIPLOMA</h4>
					<li>
	                	<input type='text' name='Yd2dd1sem' class='form-control mt-2' placeholder='Sem 1'>  
	                	<input type='text' name='Yd2dd2sem' class='form-control mt-2' placeholder='Sem 2'>  
	                	<input type='text' name='Yd2dd3sem' class='form-control mt-2' placeholder='Sem 3'>  
	                	<input type='text' name='Yd2dd4sem' class='form-control mt-2' placeholder='Sem 4'>  
	                	<input type='text' name='Yd2dd5sem' class='form-control mt-2' placeholder='Sem 5'>  
	                	<input type='text' name='Yd2dd6sem' class='form-control mt-2' placeholder='Sem 6'>  
                	</li>
                	<select name='dipuniversityba' class='form-control mt-2'>
                		<?php	include('university.php'); ?>
                    </select>
                      <select onchange="othersfordipspyba()" id="diplomasp" name="diplomasp" class='form-control mt-2'>
                           <option>--Select Specialization--</option>
                           <option value="DIPLOMA (CE)">DIPLOMA (CE)</option>
                           <option value="DIPLOMA (IT)">DIPLOMA (IT)</option>
                           <option value="OTHERS">Other</option>
                       </select>
                      <div id="dsptext"></div>

                     <input type='text' name='dipinsbay' class='form-control mt-2' placeholder='Institute / College Name'>		
                	 <div>
               		   <hr style="border-top: 1px solid #495057">
              		</div>
              		<h4 class="card-title">BACHELOR</h4>
					       <li>
	                	<input type='text' name='bach3sembay' class='form-control mt-2' placeholder='Sem 3'>  
	                	<input type='text' name='bach4sembay' class='form-control mt-2' placeholder='Sem 4'>  
	                	<input type='text' name='bach5sembay' class='form-control mt-2' placeholder='Sem 5'>  
	                	<input type='text' name='bach6sembay' class='form-control mt-2' placeholder='Sem 6'>  
	                	<input type='text' name='bach7sembay' class='form-control mt-2' placeholder='Sem 7'>  
	                	<input type='text' name='bach8sembay' class='form-control mt-2' placeholder='Sem 8'>  
                	</li>
                    <select name='bachuniversity' class='form-control mt-2'>
                      <?php include('university.php'); ?>
                    </select>
                   <select onchange="othersforbachforMAandd2dY()" id="bbdegree" name="bbdegree" class='form-control mt-2'>
                           <option>--Select Degree--</option>
                           <option value="B.TECH/B.E (CE)">B.TECH/B.E (CE)</option>
                           <option value="B.TECH/B.E (IT)">B.TECH/B.E (IT)</option>
                           <option value="OTHERS">Other</option>
                       </select>
                      <div id="bachsptext"></div>
                      <input type='text' name='sp_b_b_d2dY' class='form-control mt-2' placeholder='Enter Specialization'> 
                      <input type='text' name='bachd2dYMAinstitute' class='form-control mt-2' placeholder='Institute / College Name'>
                   <div>
               		   <hr style="border-top: 1px solid #495057">
              		</div>
                  
                     <?php
			}
		}
	elseif ($d == "n") {
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
                    <select name='12thspecialization' id='sp' class='form-control' onchange='others()'>
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
                <div> 
                      <hr style="border-top: 1px solid #495057">
                 </div>
      					<li>
	                	<input type='text' name='b1semnd2dba' class='form-control mt-2' placeholder='Sem 1'>  
	                	<input type='text' name='b2semnd2dba' class='form-control mt-2' placeholder='Sem 2'>  
	                	<input type='text' name='b3semnd2dba' class='form-control mt-2' placeholder='Sem 3'>  
	                	<input type='text' name='b4semnd2dba' class='form-control mt-2' placeholder='Sem 4'>  
	                	<input type='text' name='b5semnd2dba' class='form-control mt-2' placeholder='Sem 5'>  
	                	<input type='text' name='b6semnd2dba' class='form-control mt-2' placeholder='Sem 6'>  
	                	<input type='text' name='b7semnd2dba' class='form-control mt-2' placeholder='Sem 7'>
	                	<input type='text' name='b8semnd2dba' class='form-control mt-2' placeholder='Sem 8'>
	                </li>
                   <select name='bachuniversity' class='form-control mt-2'>
                      <?php include('university.php'); ?>
                    </select>
                   <select onchange="othersforbachforMAandd2dY()" id="bbdegree" name="bbdegree" class='form-control mt-2'>
                           <option>--Select Degree--</option>
                           <option value="B.TECH/B.E (CE)">B.TECH/B.E (CE)</option>
                           <option value="B.TECH/B.E (IT)">B.TECH/B.E (IT)</option>
                           <option value="OTHERS">Other</option>
                       </select>
                      <div id="bachsptext"></div>
                      <input type='text' name='sp_b_b_d2dY' class='form-control mt-2' placeholder='Enter Specialization'> 
                      <input type='text' name='bachd2dYMAinstitute' class='form-control mt-2' placeholder='Institute / College Name'>
                  <div>
	            	      <hr style="border-top: 1px solid #495057">
	         	     </div>
				<?php	
			}elseif($type == "MA")
			{
					?>
					<h4 class="card-title">BACHELOR</h4>
					<li>
	                	<input type='text' name='b1semnd2d' class='form-control mt-2' placeholder='Sem 1'>  
	                	<input type='text' name='b2semnd2d' class='form-control mt-2' placeholder='Sem 2'>  
	                	<input type='text' name='b3semnd2d' class='form-control mt-2' placeholder='Sem 3'>  
	                	<input type='text' name='b4semnd2d' class='form-control mt-2' placeholder='Sem 4'>  
	                	<input type='text' name='b5semnd2d' class='form-control mt-2' placeholder='Sem 5'>  
	                	<input type='text' name='b6semnd2d' class='form-control mt-2' placeholder='Sem 6'>  
	                	<input type='text' name='b7semnd2d' class='form-control mt-2' placeholder='Sem 7'>
	                	<input type='text' name='b8semnd2d' class='form-control mt-2' placeholder='Sem 8'>
					</li>	
	                <select name='bunind2d' class='form-control mt-2'>
	                    	
	                    	<?php	include('university.php'); ?>

	                    </select>
	                   <select onchange="othersforbach()" id="bbdegree" name="bbdegree" class='form-control mt-2'>
                           <option>--Select Specialization--</option>
                           <option value="B.TECH/B.E (CE)">B.TECH/B.E (CE)</option>
                           <option value="B.TECH/B.E (IT)">B.TECH/B.E (IT)</option>
                           <option value="OTHERS">Other</option>
                       </select>
                      <div id="bachsptext"></div>
                      <input type='text' name='sp_b_n_d2d' class='form-control mt-2' placeholder='Enter Specialization'> 
	                    <input type='text' name='binstitutend2d' class='form-control mt-2' placeholder='Institute / College Name'>
	                 <div>
	            	      <hr style="border-top: 1px solid #495057">
	         	     </div>
	         	     <h4 class="card-title">MASTER</h4>
			       		<li>
	                	<input type='text' name='msem1nd2dma' class='form-control mt-2' placeholder='Sem 1'>  
	                	<input type='text' name='msem2nd2dma' class='form-control mt-2' placeholder='Sem 2'>  
	                	<input type='text' name='msem3nd2dma' class='form-control mt-2' placeholder='Sem 3'>  
	                	<input type='text' name='msem4nd2dma' class='form-control mt-2' placeholder='Sem 4'>
	       	       </li>
                 <select name='masterdipuname' class='form-control mt-2'>
                      <?php include('university.php'); ?>
                  </select>
                   <select onchange="otherfordipmastertypey()" id="masterdegree" name="masterdegree" class='form-control mt-2'>
                           <option>--Select Degree--</option>
                           <option value="M.TECH/M.E (CE)">M.TECH/M.E (CE)</option>
                           <option value="M.TECH/M.E (IT)">M.TECH/M.E (IT)</option>
                           <option value="OTHERS">Other</option>
                       </select>
                      <div id="mastersptext"></div>
                      <input type='text' name='mastersp' class='form-control mt-2' placeholder='Enter Specialization'> 
                      <input type='text' name='masterins' class='form-control mt-2' placeholder='Institute / College Name'>
		       	    <div>
		                <hr style="border-top: 1px solid #495057">
		             </div>
			<?php	
			}
		}
 ?>