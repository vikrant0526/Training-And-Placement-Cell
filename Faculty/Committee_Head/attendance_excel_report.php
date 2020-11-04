<?php
        require_once '../../Files/PHPExcel/Classes/PHPExcel.php';  
        include('../../Files/PDO/dbcon.php');
        $cid=$_GET['cid'];
        $dept = $_GET['dept'];
        $degree = $_GET['degree'];
        $pyear = $_GET['pyear'];
   
        $excel = new PHPExcel();
        $excel->setActiveSheetIndex(0);

        $stmt=$con->prepare("CALL GET_EVENT_BY_BATCH_AND_COMPANY(:cid, :dept, :degree, :pyear)");
        $stmt->bindParam(':cid',$cid);
        $stmt->bindParam(':dept',$dept);
        $stmt->bindParam(':degree',$degree);
        $stmt->bindParam(':pyear',$pyear);
        $stmt->execute();
        $sr_cnt=0;
        $sr_cnt1=0;
        $event_name="";
        $rowofevent=$stmt->rowCount(); 
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
                // echo "$rowofevent";
                $cnt=1;
                $row2=4;
                $event_name=$data["EVENT_NAME"];
                //$count = count($data);
                // print_r($data);
                $c=0;
                $cut=0;
                while ($x = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                    
                   if($c==0){ 
                    $name=$x['STUDENT_FIRST_NAME']." ".$x['STUDENT_LAST_NAME'];
                    $sr_cnt+=1;
                    $sr_cnt1+=1;
                    $at="";
                    $excel->getActiveSheet()->setCellValue('A'.$row2 ,$sr_cnt); 
                    $excel->getActiveSheet()->setCellValueExplicit('B'.$row2,$x['STUDENT_ENROLLMENT_NUMBER'],PHPExcel_Cell_DataType::TYPE_STRING);
                    $excel->getActiveSheet()->setCellValue('C'.$row2 ,$name); 
                    if($x['ATTENDANCE']=='0'){
                        $at = "Absent";   
                    }elseif($x['ATTENDANCE']=='1'){
                        $at = "Present";   
                    }
                    $excel->getActiveSheet()->setCellValue('D'.$row2 ,$at);
                    $c=1;
                  }

                  $objexcel = $excel->createSheet($cut);
                  if($c==1){
                        
                        $objexcel->setCellValue('A'.$row2 ,$sr_cnt1); 
                        $objexcel->setCellValue('B'.$row2,$x['STUDENT_ENROLLMENT_NUMBER']);
                        $objexcel->setCellValue('C'.$row2 ,$name); 
                        if($x['ATTENDANCE']=='0'){
                            $at = "Absent";   
                        }elseif($x['ATTENDANCE']=='1'){
                            $at = "Present";   
                        }
                        $objexcel->setCellValue('D'.$row2 ,$at);

                        $objexcel->getStyle('B'.$row2)
                        ->getNumberFormat()
                        ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER); 
                        $objexcel->setTitle("$cut");  
                        $cut+=1;
                    }
                    $row2+=1;    
                }
            }

        }


     $excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
     $excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
     $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
     $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
     
     $excel->getActiveSheet()->mergeCells('A1:D1');
     $excel->getActiveSheet()->mergeCells('A2:D2');
     $excel->getActiveSheet()
                             ->setCellValue('A1',"Attendance Report")
                             ->setCellValue('A2',"Event :".$event_name)
                             ->setCellValue('A3',"Sr. No")
                             ->setCellValue('B3',"STUDENT ENROLLMENT NUMBER")
                             ->setCellValue('C3',"STUDENT NAME")
                             ->setCellValue('D3',"Attendance") 
                             ; 
     
      
    $excel->getActiveSheet()->getStyle('A1')->applyFromArray(
        array(
            'font'=>array(
                'size'=>30,
                'bold'=>true,
                'color' => array('rgb' => 'FFFFFF')
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => '38618C')
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            )
        )
    );
    
    
    $excel->getActiveSheet()->getStyle('A2')->applyFromArray(
        array(
            'font'=>array(
                'size'=>18,
                'bold'=>true,
                'color' => array('rgb' => 'FFFFFF')
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => '35A7FF')
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            )
        )
    );



    $excel->getActiveSheet()->getStyle('A3:E3')->applyFromArray(
        array(
            'font'=>array(
                'bold'=>true,
            ),

            'borders' => array(
                'allborders' => array(
                      'style' => PHPExcel_Style_Border::BORDER_HAIR  
                )
            )
        )
    );

      header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      header('Content-Disposition: attachment; filename="attendance_report.xlsx"');
      header('Cache-Control: max-age=0');
      ob_end_clean(); 
      $file=PHPExcel_IOFactory::createWriter($excel,'Excel2007');
      $file->save('php://output');
?>