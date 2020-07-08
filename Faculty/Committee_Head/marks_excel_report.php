<?php
      require_once '../../Files/PHPExcel/Classes/PHPExcel.php';  
      include('../../Files/PDO/dbcon.php');
      $tid = $_GET['tid'];
      $dept = $_GET['dept'];
      $degree = $_GET['degree'];
      $pyear = $_GET['pyear'];
      $excel = new PHPExcel();

      $excel->setActiveSheetIndex(0);

      $stmt=$con->prepare("CALL VIEW_TEST_MARKS(:tid);");
      $stmt->bindparam(":tid", $_GET['tid']);
      $stmt->execute();
      $stmt=$con->prepare("CALL VIEW_TEST_MARKS(:tid);");
      $stmt->bindparam(":tid", $_GET['tid']);
      $stmt->execute();
      $row=4;
      $c=0;
      $test_name; 
     while($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
         $name=$data['STUDENT_FIRST_NAME']." ".$data['STUDENT_LAST_NAME'];
        $test_name=$data["TEST_NAME"]; 
        // $excel->getActiveSheet()->setCellValue('A'.$row ,$data['STUDENT_ENROLLMENT_NUMBER']); 
        $excel->getActiveSheet()->setCellValueExplicit('A'.$row,$data['STUDENT_ENROLLMENT_NUMBER'],PHPExcel_Cell_DataType::TYPE_STRING);
        $excel->getActiveSheet()->setCellValue('B'.$row ,$name); 
        $excel->getActiveSheet()->setCellValue('C'.$row ,$data['MARKS_OBTAINED'] ); 
        $excel->getActiveSheet()->setCellValue('D'.$row ,$data['TEST_TOTAL_MARKS'] ); 
        // $excel->getActiveSheet()->getStyle('A'.$row)
        // ->getNumberFormat()
        // ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER); 
        if($data['MARKS_OBTAINED']  >= $data['TEST_PASSING_MARKS']){
            $excel->getActiveSheet()->setCellValue('E'.$row ,  "PASS" ); 
        }
        else{
            $excel->getActiveSheet()->setCellValue('E'.$row ,"FAIL"); 
            }
            $row+=1;
    }



    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(10);

   
    $excel->getActiveSheet()->mergeCells('A1:E1');
    $excel->getActiveSheet()->mergeCells('A2:E2');
    $excel->getActiveSheet()
                            ->setCellValue('A1',"Marks Report")
                            ->setCellValue('A2',"Test:".$test_name)
                            ->setCellValue('A3',"STUDENT ENROLLMENT NUMBER")
                            ->setCellValue('B3',"STUDENT NAME")
                            ->setCellValue('C3',"MARKS OBTAINED") 
                            ->setCellValue('D3',"TOTAL MARKS")
                            ->setCellValue('E3',"RESULT")
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
    


     // $objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    // ob_end_clean();
    // // We'll be outputting an excel file
    // header('Content-type: application/vnd.ms-excel');
    // header('Content-Disposition: attachment; filename="marksreport.xlsx"');
    // $objWriter->save('php://output');
      header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      header('Content-Disposition: attachment; filename="marksreport.xlsx"');
      header('Cache-Control: max-age=0');
      ob_end_clean(); 
      $file=PHPExcel_IOFactory::createWriter($excel,'Excel2007');
      $file->save('php://output');

?>