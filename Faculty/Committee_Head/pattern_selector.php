<?php 
  include('../../Files/PDO/dbcon.php');
  $pattern = $_GET['pattern'];
    if ($pattern == 'S') {
        ?>
            <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    	<select name="dept" class="form-control p-1 pl-3" id="dept" onchange="course()" autofocus>
                            <option>Select Department</option>
                            <option value="BMIIT">BMIIT</option>
    		                    <option value="SRIMCA">SRIMCA</option>
    							          <option value="CGPIT">CGPIT</option>
    					        </select>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    	<select name="degree" class="form-control p-1 pl-3" id="degree" onchange="passing_year()">
                            <option>Select Degree</option>
                        </select>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    	<select name="pyear" class="form-control p-1 pl-3" id="pyear" onchange="report_generate()">
                            <option>Select Passing Year</option>
                  		</select>
                    </div>
                  </div>
                </li>
        <?php
    }
    elseif($pattern == 'C'){
        // include('../../Files/PDO/dbcon.php');

        $stmt=$con->prepare("CALL GET_ALL_BATCH_YEAR();");
        $stmt->execute();
        ?>
            <li>
                  <div class="media">
                    <div class="media-body mb-2">
                    	<select name="year" class="form-control p-1 pl-3" id="year" onchange="company_report()">
                            <option>Select Passing Year</option>
                            <?php 
                                while ($data=$stmt->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <option value="<?php echo $data['BATCH_PASSING_YEAR']?>"><?php echo $data['BATCH_PASSING_YEAR']?></option>
                            <?php 
                                }                            
                            ?>
                  		</select>
                    </div>
                  </div>
                </li>
        <?php
    }
?>