<?php
    require "../../Files/fpdf.php";
    $con =  new PDO("mysql:host=localhost;dbname=ntpcell","root","");	
    class myPDF extends FPDF{    
        function header(){
                $this->Image('../../Files/images/logo-mini.png',10,6);
                $this->SetFont('Helvetica','B',45);
                $this->Cell(290,20,'Placement Report',0,0,'C');
                $this->Ln();
                $this->SetFont('Helvetica','B',25);
                $this->Cell(275,10,'Academic Year '.date('Y'),0,0,'C');
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
                $this->Cell(35,10,'Sr. No',1,0,'C');
                $this->Cell(50,10,'Enrollment Number',1,0,'C');
                $this->Cell(50,10,'Student Name',1,0,'C');
                $this->Cell(50,10,'Company Name',1,0,'C');
                $this->Cell(45,10,'Stipend',1,0,'C');
                $this->Cell(50,10,'Salary Package',1,0,'C');
                $this->Ln();
            }

            function viewTable($con){
                $dept=$_GET['dept'];
                $degree=$_GET['degree'];
                $pyear=$_GET['pyear'];
                $this->SetFont('Arial','I',12);
                $stmt=$con->prepare("CALL BATCH_WISE_PLACEMENT_REPORT(:dept, :degree, :pyear);");
                $stmt->bindParam(":dept",$dept);
                $stmt->bindParam(":degree",$degree);
                $stmt->bindParam(":pyear",$pyear);
                $stmt->execute();
                $a=0;
                while ($data=$stmt->fetch(PDO::FETCH_ASSOC)) {
                    $a+=1;
                    $this->Cell(35,10,$a,1,0,'C');
                    $this->Cell(50,10,$data['STUDENT_ENROLLMENT_NUMBER'],1,0,'C');
                    $this->Cell(50,10,$data['STUDENT_FIRST_NAME']." ".$data['STUDENT_LAST_NAME'],1,0,'C');
                    $this->Cell(50,10,$data['COMPANY_NAME'],1,0,'C');
                    $this->Cell(45,10,$data['TRAINING_OFFERED_STIPEND'],1,0,'C');
                    $this->Cell(50,10,$data['PLACEMENT_OFFERED_PACKAGE'],1,0,'C');
                    $this->Ln();
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