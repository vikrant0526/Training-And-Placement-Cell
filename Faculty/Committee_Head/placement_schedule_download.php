<?php 
    require "../../Files/fpdf.php";
    $con =  new PDO("mysql:host=localhost;dbname=ntpcell","root","");	
    class myPDF extends FPDF{    
        function header(){
                // $new_year=mktime(0,0,0,date('m'),date('d'),date('Y')-1);
                $this->Image('../../Files/images/logo-mini.png',10,6);
                $this->SetFont('Helvetica','B',45);
                $this->Cell(320,20,'PLACEMENT SCHEDULE',0,0,'C');
                $this->Ln();
                $this->SetFont('Helvetica','B',25);
                $this->Cell(276,10,'Academic Year '.date('Y'),0,0,'C');
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
                $this->Cell(40,10,'Sr. No',1,0,'C');
                $this->Cell(100,10,'COMPANY NAME',1,0,'C');
                $this->Cell(70,10,'START DATE',1,0,'C');
                $this->Cell(70,10,'END DATE',1,0,'C');
                $this->Ln();
            }

            function viewTable($con){
                $this->SetFont('Arial','I',12);
                $stmt=$con->prepare("CALL GET_PLACMENT_SCHEDULE()");
                $stmt->execute();
                $a=0;
                while ($x=$stmt->fetch(PDO::FETCH_OBJ)) {
                    $a+=1;
                    $this->Cell(40,10,$a,1,0,'C');
                    $this->Cell(100,10,$x->COMPANY_NAME,1,0,'C');
                    $this->Cell(70,10,$x->PLACEMENT_SCHEDULE_START_DATE,1,0,'C');
                    $this->Cell(70,10,$x->PLACEMENT_SCHEDULE_END_DATE,1,0,'C');
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