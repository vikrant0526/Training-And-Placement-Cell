<?php
    require "../../Files/fpdf.php";
    $con =  new PDO("mysql:host=localhost;dbname=ntpcell","root","");	
    class myPDF extends FPDF{    
        function header(){
                $year=$_GET['pyear'];
                $this->Image('../../Files/images/logo-mini.png',10,6);
                $this->SetFont('Helvetica','B',45);
                $this->Cell(290,20,'Placement Report',0,0,'C');
                $this->Ln();
                $this->SetFont('Helvetica','B',25);
                $this->Cell(275,10,'Academic Year '.$year,0,0,'C');
                $this->Ln();
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
                $this->Cell(40,10,'Sr.No',1,0,'C');
                $this->Cell(70,10,'Company Name',1,0,'C');
                $this->Cell(50,10,'Student Count',1,0,'C');
                $this->Cell(60,10,'Stipend',1,0,'C');
                $this->Cell(60,10,'Salary Package',1,0,'C');
                $this->Ln();
            }

            function viewTable($con){
                $year=$_GET['pyear'];
                $this->SetFont('Arial','I',12);
                $stmt=$con->prepare("CALL GET_COMPANY_FOR_REPORT(:year);");
                $stmt->bindParam(":year",$year);
                $stmt->execute();
                $row=$stmt->rowcount();
                if ($row>0) {
                $a=0;
                while ($data=$stmt->fetch(PDO::FETCH_ASSOC)) {
                    $cid=$data['TRAINING_COMPANY_ID'];
                    $a+=1;
                    $stmt2=$con->prepare("CALL COMPANY_PLACEMENT_REPORT(:cid, :year);");
                    $stmt2->bindParam(":cid",$cid);
                    $stmt2->bindParam(":year",$year);
                    $stmt2->execute();
                    $stmt2=$con->prepare("CALL COMPANY_PLACEMENT_REPORT(:cid, :year);");
                    $stmt2->bindParam(":cid",$cid);
                    $stmt2->bindParam(":year",$year);
                    $stmt2->execute();
                    $data2=$stmt2->fetch(PDO::FETCH_ASSOC);
                    $stmt3=$con->prepare("CALL COMPANY_PACKAGE_REPORT(:cid, :year);");
                    $stmt3->bindParam(":cid",$cid);
                    $stmt3->bindParam(":year",$year);
                    $stmt3=$con->prepare("CALL COMPANY_PACKAGE_REPORT(:cid, :year);");
                    $stmt3->bindParam(":cid",$cid);
                    $stmt3->bindParam(":year",$year);
                    $stmt3->execute();
                    $data3=$stmt3->fetch(PDO::FETCH_ASSOC);
                    $this->Cell(40,10,$a,1,0,'C');
                    $this->Cell(70,10,$data2['COMPANY_NAME'],1,0,'C');
                    $this->Cell(50,10,$data2['STUDENT_COUNT'],1,0,'C');
                    $this->Cell(60,10,$data2['OFFERED_STIPEND'],1,0,'C');
                    $this->Cell(60,10,$data3['PACKAGE'],1,0,'C');
                    $this->Ln();
                }
             }
            }
    }
    $pdf = new myPDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('L','A4',0);
    $pdf->headerTable();
    $pdf->viewTable($con);
    $pdf->Output();
?>