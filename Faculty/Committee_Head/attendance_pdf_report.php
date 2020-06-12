<?php 
       require "../../Files/fpdf.php";
       $con =  new PDO("mysql:host=localhost;dbname=ntpcell","root","");
     
       class myPDF extends FPDF{    
        function header(){
            $this->Image('../../Files/images/logo-mini.png',10,6);
            $this->SetFont('Helvetica','B',45);
            $this->Cell(280,20,'Attendance Report',0,0,'C');
            $this->Ln();
            $this->Ln();
            $this->Ln();
        } 

        function footer(){
            $this->SetY(-15);
            $this->SetFont('Helvetica','',8);
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }
        
        function headerTable(){
            $this->SetFont('Times','B',12);
            $this->Cell(40,10,'Sr. No',1,0,'C');
            $this->Cell(100,10,'Enrollment Number',1,0,'C');
            $this->Cell(70,10,'Student',1,0,'C');
            $this->Cell(70,10,'Attendance',1,0,'C');
            $this->Ln();
        }

        function viewTable($con){
            $cid=$_GET['cid'];
            $dept = $_GET['dept'];
            $degree = $_GET['degree'];
            $pyear = $_GET['pyear'];     
           
            $stmt=$con->prepare("CALL GET_EVENT_BY_BATCH_AND_COMPANY(:cid,:dept,:degree,:pyear)");
            $stmt->bindParam(':cid',$cid);
            $stmt->bindParam(':dept',$dept);
            $stmt->bindParam(':degree',$degree);
            $stmt->bindParam(':pyear',$pyear);
            $stmt->execute();
            $cnt=0;
            $a=0;
            while($data = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $eid=$data['EVENT_ID'];
                if ($eid==0) {
                    $eid="";
                }
                $stmt2=$con->prepare("CALL GET_EVENT_ATTENDANCE(:eid)");
                $stmt2->bindParam('eid',$eid);
                $stmt2->execute();
                $stmt2=$con->prepare("CALL GET_EVENT_ATTENDANCE(:eid)");
                $stmt2->bindParam('eid',$eid);
                $stmt2->execute();
                $row =$stmt2->rowCount();
                if($row>0){
                    $cnt=1; 
                    $this->SetFont('Arial','B',16);
                    $this->AddPage('L','A4',0);    
                    $this->Cell(280,10,$data["EVENT_NAME"],1,0,'C');
                    $this->Ln();
                    $this->headerTable();
                    $sr_cnt=0;
                    while ($x = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                        $sr_cnt+=1;
                        $at="";
                        $this->SetFont('Arial','I',12);
                        $this->Cell(40,10,$sr_cnt,1,0,'C');
                        $this->Cell(100,10,$x["STUDENT_ENROLLMENT_NUMBER"],1,0,'C');
                        $this->Cell(70,10,$x["STUDENT_FIRST_NAME"]." ".$x["STUDENT_LAST_NAME"],1,0,'C');
                        if($x['ATTENDANCE']=='0'){
                            $at = "Absent";   
                        }elseif($x['ATTENDANCE']=='1'){
                            $at = "Present";   
                        }
                        $this->Cell(70,10,$at,1,0,'C');
                        $this->Ln();
                    }
              }
            }	
        }
    }
       $pdf = new myPDF();
       $pdf->AliasNbPages();
    //    $pdf->AddPage('L','A4',0);
    //    $pdf->headerTable();
       $pdf->viewTable($con);
       $pdf->Output();
?>