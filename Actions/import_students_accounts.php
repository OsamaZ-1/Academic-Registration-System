<?php 
  
  // Include PhpSpreadsheet library autoloader 
  require_once '../vendor/autoload.php'; 
  use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

        
    if(isset($_POST['importSubmit']))
    { 
        
            require("../classes/student_dal.php");
            $student_dal=new Student_DAL();
            // Allowed mime types 
            $excelMimes = array('text/xls', 'text/xlsx', 'application/excel', 'application/vnd.msexcel', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); 
   
            // Validate whether selected file is a Excel file 
            if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $excelMimes))
            { 
       
             // If the file is uploaded 
             if(is_uploaded_file($_FILES['file']['tmp_name']))
             { 
                $reader = new Xlsx(); 
                $spreadsheet = $reader->load($_FILES['file']['tmp_name']); 
                $worksheet = $spreadsheet->getActiveSheet();  
                $worksheet_arr = $worksheet->toArray(); 

                // Remove header row 
                unset($worksheet_arr[0]); 

                foreach($worksheet_arr as $row)
                { 
                    $student_id = $row[0];
                    $first_name = $row[1]; 
                    $last_name = $row[2]; 
                    $student_email = $row[3]; 
                    $student_password = $row[4]; 
                    $student_major = $row[5]; 
                    $student_year = $row[6]; 
                    $student_enrollment_date = $row[7]; 

                    // Check whether member already exists in the database with the same id 
                    $id_exist = $student_dal -> getStudentAsID($student_id);
                    // Check whether member already exists in the database with the same email 
                    $email_exist = $student_dal -> isEmailExist($student_id,$student_email);

                    $result = null;
                    if($id_exist && !$email_exist)
                    { 
                        // Update member data in the database 
                        $result = $student_dal -> updateStudentAccount($student_id, $first_name, $last_name, $student_email, $student_password, $student_major, $student_year, $student_enrollment_date);
                 
                    }else if(!$id_exist && !$email_exist)
                    { 
                        // Insert member data in the database 
                        $result = $student_dal -> addStudent($student_id, $first_name, $last_name, $student_email, $student_password, $student_major, $student_year, $student_enrollment_date);
                  
                    } 

                    if($result==1)
                    {
                        $v=array(
                        'result'=>true,
                        'error'=>'no error'
                        );
                    }
                    else 
                    {
                        $v=array(
                        'result'=>false,
                        'error'=>$result
                        );
                    }
                    $dataResult=$v;
                    echo json_encode($dataResult);
                } 
            }
           }
        }
    

?>