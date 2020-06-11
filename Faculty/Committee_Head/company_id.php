<?php
    include('..\..\Files\PDO\dbcon.php');
     $eve=$_GET['eve'];
     if ($eve == "PRE") {
         # code...
     }
     else if($eve == "IN"){
        $stmt=$con->prepare("CALL VIEW_COMPANY()");
        $stmt->execute();
        echo "<select class='form-control p-1 pl-3' name='cmp_id' id='cmp'>".
               "<option>Select Company</option>"; 
           while($data = $stmt->fetch(PDO::FETCH_ASSOC))
           {
               ?>
               <option value="<?php echo $data['COMPANY_ID'] ?>"><?php echo $data['COMPANY_NAME'] ?></option>
               <?php	
           }
        echo "</select>";	
     }
?>