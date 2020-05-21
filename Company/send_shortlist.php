<?php
   ob_start();
   session_start();
   require '../mail/PHPMailer-master/includes/PHPMailer.php';
   require '../mail/PHPMailer-master/includes/SMTP.php';
   require '../mail/PHPMailer-master/includes/Exception.php';

   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\SMTP;
   use PHPMailer\PHPMailer\Exception;

   $data=$_SESSION['Userdata'];
   $cid = $data["COMPANY_ID"];
   $cname= $data["COMPANY_NAME"];

   include('../Files/PDO/dbcon.php');
   $selection_list_id=$_GET["sid"];
   $sname=array();
   $enno=array();
   $stipend=array();
   $i=0;

   $student_name="";
   $student_ennum="";

   $stmt2=$con->prepare("CALL GET_ALL_SHORTLIST_DATA_AND_STUDENT(:sid)"); 
   $stmt2->bindParam(":sid",$selection_list_id);  
   $stmt2->execute();

   while($alldata  = $stmt2->fetch(PDO::FETCH_ASSOC)){
			$company_id = $alldata["SELECTION_LIST_COMPANY_ID"];    	
			$selection_list_year = $alldata["SELECTION_LIST_YEAR"];
			$selection_name = $alldata["SELECTION_LIST_NAME"];
			//echo "<script>alert('$selection_name')</script>";	
			$student_recommendation_id = $alldata["SHORT_LIST_RECOMMENDATION_ID"];	
			$student_id = $alldata["SHORTLIST_STUDENT_ID"];

			 $stmt8=$con->prepare("CALL GET_STUDENT_DETAILS(:sid)");
   		 $stmt8->bindParam(":sid",$student_id);     
       $stmt8->execute();
       $stmt8=$con->prepare("CALL GET_STUDENT_DETAILS(:sid)");
   		 $stmt8->bindParam(":sid",$student_id);     
       $stmt8->execute(); 
   	  //print_r($stmt8->errorinfo());		  
			while ($studdata = $stmt8->fetch(PDO::FETCH_ASSOC)) {
                $student_id=$studdata["STUDENT_ID"];
                 $stmt9=$con->prepare("CALL GET_STIPEND_STUDENT(:studid,:company_id,:select_id)");
                  $stmt9->bindParam(":studid",$student_id);   
                  $stmt9->bindParam(":company_id",$cid);   
                  $stmt9->bindParam(":select_id",$selection_list_id);     
                  $stmt9->execute();
                  $stmt9=$con->prepare("CALL GET_STIPEND_STUDENT(:studid,:company_id,:select_id)");
                  $stmt9->bindParam(":studid",$student_id);   
                  $stmt9->bindParam(":company_id",$cid);   
                  $stmt9->bindParam(":select_id",$selection_list_id);     
                  $stmt9->execute();
                  while ($stipentdata = $stmt9->fetch(PDO::FETCH_ASSOC)) {
                    $stipend[$i]  = $stipentdata["TRAINING_OFFERED_STIPEND"];
                  }
                $student_name = $studdata["STUDENT_FIRST_NAME"]." ".$studdata["STUDENT_LAST_NAME"];
			    			$sname[$i] = $student_name;
			    			$student_ennum = $studdata["STUDENT_ENROLLMENT_NUMBER"];
			    			$enno[$i] = $student_ennum;
			    			$i+=1;       
	   		   }
     } 
   

   $stmt3=$con->prepare("CALL GET_COMPANY(:cid)"); 
   $stmt3->bindParam(":cid",$company_id);  
   $stmt3->execute();   
   $stmt3=$con->prepare("CALL GET_COMPANY(:cid)"); 
   $stmt3->bindParam(":cid",$company_id);  
   $stmt3->execute();
   $companydata  = $stmt3->fetch(PDO::FETCH_ASSOC);
   $company_name = $companydata["COMPANY_NAME"];
   $company_ryear = $companydata["COMPANY_REGISTERED_YEAR"];
   $company_address = $companydata["COMPANY_ADDRESS"];
   $compnay_email = $companydata["COMPANY_EMAIL"];
   
   $stmt=$con->prepare("CALL GET_CH_DATA"); 
   $stmt->execute();
   $stmt=$con->prepare("CALL GET_CH_DATA"); 
   $stmt->execute();
   $facultydata = $stmt->fetch(PDO::FETCH_ASSOC);
   $email = $facultydata["FACULTY_EMAIL"];
   $faculty_id= $facultydata["FACULTY_ID"];

   $size = sizeof($sname);

    try{
               $mail = new PHPMailer(); 
               $mail->isSMTP();                                       
               $mail->Host       = 'smtp.gmail.com';                  
               $mail->SMTPAuth   = true;                                 
               $mail->SMTPSecure = "tls";
               $mail->Port = "587";                                 
               $mail->Username   = 'noreply324762@gmail.com';          
               $mail->Password   = '@yahoo.in';                     
               $mail->setFrom('noreply324762@gmail.com', 'UKA TARSADIA UNIVERSITY(T&P CELL)');
               $mail->addAddress("$email");    
               $mail->isHTML(true);                                  
               $mail->Subject = "Final Short List $selection_name";
               $msg=
                  "<h1><center>$company_name</center></h1><br>"
                  ."<h3><center>$compnay_email</center></h3><br>"
		               				."<h3><center>$company_address</center></h3><br>"
		               				."<br>"
		               				."<h3>There Are Selected Student List</h3><br>"
		               				."<table border=2>".
		               					"<tr>".
		               						"<td>Student Name</td>".
		               						"<td>Enrollment Number</td>".	
                              "<td>Stipend</td>". 
		               					"</tr>";
                            for($i = 0; $i < $size; $i++) {
                              $msg .=
                                      "<tr>".
        		               						"<td>$sname[$i]</td>".
        		               						"<td>$enno[$i]</td>".
                                      "<td>$stipend[$i]</td>".
		               					          "</tr>";
                            }
                            $msg .= 
		               				"</table>";  
                $mail->Body  = $msg;
                  $sen_type="CP";
                  $rec_type="CH";
                  $type="CSL";
                  $des="New Event:Final Company Short List";
                 $stmt22=$con->prepare("CALL INSERT_NOTIFICATION(:senderid,:rec_id,:sender_type,:rec_type,:type,:des)"); 
                 $stmt22->bindParam(":senderid",$cid);
                 $stmt22->bindParam(":rec_id",$faculty_id);  
                 $stmt22->bindParam(":sender_type",$sen_type);  
                 $stmt22->bindParam(":rec_type",$rec_type);  
                 $stmt22->bindParam(":type",$type);  
                 $stmt22->bindParam(":des",$des);   
                 $stmt22->execute();   
                  $stmt22=$con->prepare("CALL INSERT_NOTIFICATION(:senderid,:rec_id,:sender_type,:rec_type,:type,:des)"); 
                 $stmt22->bindParam(":senderid",$cid);
                 $stmt22->bindParam(":rec_id",$faculty_id);  
                 $stmt22->bindParam(":sender_type",$sen_type);  
                 $stmt22->bindParam(":rec_type",$rec_type);  
                 $stmt22->bindParam(":type",$type);  
                 $stmt22->bindParam(":des",$des);   
                 $stmt22->execute();  


              if(!empty($stipend) && !empty($sname)){                
                    if($mail->send())
                    {
                              header('Location: show_shortlist.php');
                    }
                    else
                      {
                              echo "<script>alert('Mail Not Send')</script>";  
                      }	
              }else{
                $_SESSION["errorforstipend"]="Student Stipend Not Entred Or Student Not Added";  
                header('Location: show_shortlist.php');
              } 
				       			 
              
           }catch(Exception $e){
             echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
           }
      
      
?>
