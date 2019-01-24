<?php


function backupDatabaseTables($tables = '*'){
    //connect & select the database
  date_default_timezone_set("Asia/Calcutta");
    $date =date("d-m-Y");
    $dbHost = 'test.cozmpv9bgzaq.ap-south-1.rds.amazonaws.com';
    $dbUsername = 'greenhandlework';
    $dbPassword = 'A1S2D3F4';
    $dbName = 'greenhandle_dev';
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

 
 
// exit();
    // echo "string"; exit();
    //get all of the tables
    if($tables == '*'){
        $tables = array();
        $result = $db->query("SHOW TABLES");
        while($row = $result->fetch_row()){
            $tables[] = $row[0];
        }
    }else{
        $tables = is_array($tables)?$tables:explode(',',$tables);
    }
    //loop through the tables
   
    foreach($tables as $table){
         $return='';
         $result = $db->query("SELECT * FROM $table");
        $numColumns = $result->field_count;

         $return .= "DROP TABLE $table;";

        $result2 = $db->query("SHOW CREATE TABLE $table");
        $row2 = $result2->fetch_row();

         $return .= "\n\n".$row2[1].";\n\n";

         for($i = 0; $i < $numColumns; $i++){
            while($row = $result->fetch_row()){
     // echo "<pre>"; print_r($row); 

                 $return .= "INSERT INTO $table VALUES(";
                for($j=0; $j < $numColumns; $j++){
                    $row[$j] = addslashes($row[$j]);
                    // $row[$j] = ereg_replace(" ","  ",$row[$j]);
                    if (isset($row[$j])) { $return .= '"'.$row[$j].'"' ; } else { $return .= '""'; }
                     if ($j < ($numColumns-1)) { $return.= ','; }
             }
                 $return .= ");\n";
            }
         }

       
              // echo "<pre>"; print_r($return);
    //save file
    $handle = fopen('/var/www/html/cms/bkup/'.$table.'-'.$date.'.sql','w+');
    fwrite($handle,$return);
    fclose($handle);
    unset($return);
    }
// exit();
    //fopen('c://xampp/htdocs/seo/bkup/'.time().'.sql','x+');
//////////////////////////////////////////////////////////////////
//create zip     
    $path = realpath('/var/www/html/cms/bkup/');
    //$path1 = realpath(__DIR__.'/bkup/a/');
   
    // echo "Zipping " . $path. "\n";
        $zip = new ZipArchive();
    $zip->open('/var/www/html/cms/final_backup/bkup.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);
    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));
    foreach ($files as $name => $file)
    {
        if ($file->isDir()) {
           // echo $name . "\n";
            flush();
            continue;
        }
        
        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($path) + 1);
        echo '<pre>';
        $zip->addFile($filePath, $relativePath);
        print_r($filePath);
    }
    $zip->close();
   
 // exit();
////////////////////////////////////////////////////////////////
//upload backup to s3 bucket
 $file = '/var/www/html/cms/final_backup/bkup.zip';
 $upload_file= $this->aws3->sendFile('testing-bucket-for-study',$file);
 
 if($upload_file==1){
  $rem_files = glob('/var/www/html/cms/final_backup/*');
    foreach($rem_files as $file){ // iterate files
        if(is_file($file))
          unlink($file); // delete file
      }
 }

//////////////////////////////////////////////////////////////
// remove files from folder

   $files = glob('/var/www/html/cms/bkup/*');

    foreach($files as $file){ // iterate files
      if(is_file($file))
        unlink($file); // delete file
    }
// exit();
  
}


backupDatabaseTables();
?>