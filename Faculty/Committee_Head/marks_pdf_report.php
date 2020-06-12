<?php 
    require "../../Files/fpdf.php";
    $con =  new PDO("mysql:host=localhost;dbname=ntpcell","root","");	
    class myPDF extends FPDF{    
        function header(){
                $tname = $_GET["tname"];
                $this->Image('../../Files/images/logo-mini.png',10,6);
                $this->SetFont('Helvetica','B',45);
                $this->Cell(320,20,'Student Marks',0,0,'C');
                $this->Ln();
                $this->SetFont('Helvetica','B',22);
                $this->Cell(320,20,$tname,0,0,'C');
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
                $this->Cell(30,10,'Sr. No',1,0,'C');
                $this->Cell(50,10,'Enrollment Number',1,0,'C');
                $this->Cell(50,10,'Name',1,0,'C');
                $this->Cell(50,10,'Obtain Marks',1,0,'C');
                $this->Cell(50,10,'Total Marks',1,0,'C');
                $this->Cell(50,10,'Result',1,0,'C');
                $this->Ln();
            }

            function viewTable($con){
                // $tname = $_GET["tname"];
                $tid = $_GET['tid'];
                $dept = $_GET['dept'];
                $degree = $_GET['degree'];
                $pyear = $_GET['pyear'];
                $this->SetFont('Arial','I',12);
                // $this->Cell(30,10,$tname,1,0,'C');
                $stmt=$con->prepare("CALL VIEW_TEST_MARKS(:tid);");
                $stmt->bindparam(":tid", $_GET['tid']);
                $stmt->execute();
                $row =$stmt->rowCount();
                $a=0;
                if ($row>0) {
                    while ($data=$stmt->fetch(PDO::FETCH_ASSOC)) {
                        $a+=1;
                        $this->Cell(30,10,$a,1,0,'C');
                        $this->Cell(50,10,$data['STUDENT_ENROLLMENT_NUMBER'],1,0,'C');
                        $this->Cell(50,10,$data['STUDENT_FIRST_NAME']." ".$data['STUDENT_LAST_NAME'],1,0,'C');
                        $this->Cell(50,10,$data['MARKS_OBTAINED'],1,0,'C');
                        $this->Cell(50,10,$data['TEST_TOTAL_MARKS'],1,0,'C');
                        if($data['MARKS_OBTAINED']  >= $data['TEST_PASSING_MARKS']){
                            $this->Cell(50,10,'Pass',1,0,'C'); 
                        }else{
                            $this->Cell(50,10,'Fail',1,0,'C');    
                        }
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