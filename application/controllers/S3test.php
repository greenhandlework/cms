<?php 
// $filename = 's3/s3.php';
//  require $filename;
// if (file_exists($filename)) {
//     echo "The file $filename exists";
// } else {
//     echo "The file $filename does not exist";
// }
// exit();

class S3test extends CI_Controller
{     
      function __construct() 
       {
        parent::__construct();
          $this->load->library('aws3');

     }

	public function index()
      { 
      // $p = $this->aws3->addBucket('test-gh-handle-123');
      //   print_r($p);
        // var_dump($this->aws3->test());
           $this->load->view('s3test/test');
      }

      public function upload_img()
      {
           // echo "<pre>"; print_r($_FILES); exit();
        
        $file = '/var/www/html/cms/upload/*';
           $a= $this->aws3->sendFile('testing-bucket-for-study',$file);
            print_r($a);
      }



function backupDatabaseTables($tables = '*'){
	
	exit();
    //connect & select the database
    date_default_timezone_set("Asia/Calcutta");
    $date =date("d-m-Y");
    $dbHost = 'test.cozmpv9bgzaq.ap-south-1.rds.amazonaws.com';
    $dbUsername = 'greenhandlework';
    $dbPassword = 'A1S2D3F4';
    $dbName = 'greenhandle_dev';
	
     /*$dbHost = 'greenhandle.ctjf6g73jsdo.ap-south-1.rds.amazonaws.com';
     $dbUsername = 'greenhandle';
     $dbPassword = 'A1S2D3F4';
     $dbName = 'greenhandlelive';
*/    
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
    $handle = fopen('/var/www/html/greenhandleweb/bkup/'.$table.'-'.$date.'.sql','w+');
    fwrite($handle,$return);
    fclose($handle);
    unset($return);
    }
// exit();
    //fopen('c://xampp/htdocs/seo/bkup/'.time().'.sql','x+');
//////////////////////////////////////////////////////////////////
//create zip     
    $path = realpath('/var/www/html/greenhandleweb/bkup/');
    //$path1 = realpath(__DIR__.'/bkup/a/');
   
    // echo "Zipping " . $path. "\n";
	echo "zip: ", extension_loaded('zip') ? 'OK' : 'MISSING', '<br>';
	//exit();
        $zip = new ZipArchive();
		//print_r($zip);
		
    $zip->open('/var/www/html/greenhandleweb/final_backup/bkup.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);
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
 $file = '/var/www/html/greenhandleweb/final_backup/bkup.zip';
 $upload_file= $this->aws3->sendFile('greenhandlebackup',$file);
 // replace testing-bucket-for-study(bucket name) with your live bucket name
 
 if($upload_file==1){
  $rem_files = glob('/var/www/html/greenhandleweb/final_backup/*');
    foreach($rem_files as $file){ // iterate files
        if(is_file($file))
          unlink($file); // delete file
      }
	  
	  
 }

////////////////////////////////////////////////////////////////
 //remove files from folder

   $files = glob('/var/www/html/greenhandleweb/bkup/*');

    foreach($files as $file){ // iterate files
      if(is_file($file))
        unlink($file); // delete file
    }
//exit();
  
}

// for upload images from direct folder to s3 and insert/update into appropriate table
public function testing()
{
     $files = glob('/var/www/html/cms/upload/home_slider/*');

    foreach($files as $file){ // iterate files
       $upload_file= $this->aws3->sendFile('testing-bucket-for-study',$file);
         $f = $upload_file;
         $data = array('img_path'=>$f);
          // echo "<pre>"; print_r($data);//exit();

       $this->db->insert('testing',$data);
      // if(is_file($file))
      //   unlink($file); // delete file
    }
}

/////////////////////////////////////////////////////////////////

function Copy_folder(){
	
	function get_all_directory_and_files($dir,$datee,$type,$main){
 $all_one=array();
 $all_onee=array();
 $all_two=array();
 $al=array();
 $n=array();
 $stack = array("orange");
 $all=array();
 $newd=array();
 $final=array();
     $dh = new DirectoryIterator($dir);   
     // Dirctary object 
	 	// print_r($dh);
		
	// print_r($dh->pathName);
     foreach ($dh as $item) {
		// echo $item->getPathname(); echo ' Check <br>';
			
         if (!$item->isDot()) {
            if ($item->isDir()) {
				//echo $item; echo ' Check <br>';
			if($type=="controllers"){
				 $getPath=$item-> getPath();
				 
			//	 $getPath.'--'.$item.'---'.$dir.' Check <br>';
			     $mresult = str_replace($main,"",$getPath); //echo ' mresult <br>';
			//mkdir('/var/www/html/cms/Test_copy/filebackup_'.$datee.'/application/controllers/'.$item, 0777, true);
           // chmod('/var/www/html/cms/Test_copy/filebackup_'.$datee.'/application/controllers/'.$item, 0777);
		   
		   mkdir('/var/www/html/cms/Test_copy/filebackup_'.$datee.'/application/controllers/'.$mresult.'/'.$item, 0777, true);
           chmod('/var/www/html/cms/Test_copy/filebackup_'.$datee.'/application/controllers/'.$mresult.'/'.$item, 0777);
				}
				if($type=="models"){
			    $getPath=$item-> getPath();
				//echo $getPath.'--'.$item.'---'.$dir.' Check <br>';
			    echo $mresult = str_replace($main,"",$getPath); //echo ' mresult <br>';

			mkdir('/var/www/html/cms/Test_copy/filebackup_'.$datee.'/application/models/'.$mresult.'/'.$item, 0777, true);
            chmod('/var/www/html/cms/Test_copy/filebackup_'.$datee.'/application/models/'.$mresult.'/'.$item, 0777);
				}
				if($type=="views"){
					
					$getPathv=$item-> getPath();
				 
				// $getPathv.'--'.$item.'---'.$dir.' Check <br>';
			     $mresultv = str_replace($main,"",$getPathv); //echo ' mresult <br>';
				 
			mkdir('/var/www/html/cms/Test_copy/filebackup_'.$datee.'/application/views/'.$mresultv.'/'.$item, 0777, true);
            chmod('/var/www/html/cms/Test_copy/filebackup_'.$datee.'/application/views/'.$mresultv.'/'.$item, 0777);
				}
		  //echo  $dir.'/'.$item;
          //  mkdir($dir.'/'.$item, 0777, true);
           // chmod($dir.'/'.$item, 0777);
		  
			chmod('/var/www/html/cms/Test_copy/filebackup_'.$datee, 0777);
             $all_onee[]=get_all_directory_and_files("$dir/$item",$datee,$type,$main);
				//if(empty($all_onee)){}else{$all_one[]=$all_onee;}
            } else {
				//$n=array($dir . "/" . $item->getFilename());
				//print_r($n);
				
               $all_two[]= $dir."/".$item->getFilename();
			  
              //  echo "<br>";
            }
         }
		  // $stack=array_push($stack,$n);
		//$all_two=array_push($all_two,$all_onee);
		 //$all=array_push($n,$n);
      }
	  
	  
	  /*foreach($newd as $key=>$value){
		  $final []=$value;
	  }*/
	 return  array_merge($all_two,$all_onee);

	  // return array($all_one,$all_two);
   }
	
	
	function mulipal_folder($mfile,$date){
		
		foreach($mfile as $mcfilee){ 
	if(is_array($mcfilee)){mulipal_folder($mcfilee,$date);}else{
		
		
    echo $mcfilee; echo ' mcfilee <br>';
	echo $mpathee = basename($mcfilee); echo ' mpathee <br>';
	
	echo $mnewfileee= strstr($mcfilee, $mpathee, true); echo ' mnewfileee <br>';
	//$link = 'http://mydomain.com/index.php?id=115&Itemid=283&return=aHR0cDovL2NvbW11bml0';
//$linkParts = explode('/', $newfileee);
//$link = $linkParts[0];
//print_r($controllersfiles);
	//echo chop($newfileee,"/var/www/html/cms/application/");
	//$prefix="/var/www/html/cms/application/";
	//echo $result = str_replace($prefix, "/", $newfileee, 1);echo ' result <br>';
	echo $mresult = str_replace("/var/www/html/cms/","",$mnewfileee); echo ' mresult <br>';
	// $filter_one= strstr($cfilee, "/var/www/html/cms/application/", true); //echo ' filter_one <br>';
	  // $path = basename($cfile);   
	 // if (file_exists($file)) {echo "The file $file exists";} else {echo "The file $file does not exist";}
	//echo $file;// $filee ='/var/www/html/greenhandleweb/Test/'.$file;
    echo $mnewpath ='/var/www/html/cms/Test_copy/filebackup_'.$date.'/'.$mresult.$mpathee;echo ' mnewpath  <br>';
    
	 if(copy($mcfilee,$mnewpath)){ echo " to copy $mcfilee";}else{echo "failed to copy $mcfilee";}
	}
	} // foreach($cfile as $cfilee){ 
		
		
		
	}
	
	
	$date =date("dmYhis");
	 
	 
	 if (!file_exists('/var/www/html/cms/Test_copy/filebackup_'.$date.'/application')) {
		 
    mkdir('/var/www/html/cms/Test_copy/filebackup_'.$date.'/application', 0777, true);
	chmod('/var/www/html/cms/Test_copy/filebackup_'.$date.'/application', 0777);
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	mkdir('/var/www/html/cms/Test_copy/filebackup_'.$date.'/application/controllers', 0777, true);
    chmod('/var/www/html/cms/Test_copy/filebackup_'.$date.'/application/controllers', 0777);
	
    mkdir('/var/www/html/cms/Test_copy/filebackup_'.$date.'/application/models', 0777, true);
	chmod('/var/www/html/cms/Test_copy/filebackup_'.$date.'/application/models', 0777);
	
	mkdir('/var/www/html/cms/Test_copy/filebackup_'.$date.'/application/views', 0777, true);
	chmod('/var/www/html/cms/Test_copy/filebackup_'.$date.'/application/views', 0777);
   // mkdir('/var/www/html/cms/Test_copy/Application_'.$date.'/views', 0777, true);

    }
	
	
	 //$modelsfiles = glob('/var/www/html/greenhandleweb/models/*');
	 
	 	 ////////////////////////////////////////////////////controllers/////////////////////////////////////////////////////
	 	 ////////////////////////////////////////////////////controllers/////////////////////////////////////////////////////

	 
	 //$controllersfiles = glob('/var/www/html/cms/application/controllers/*');
	  $mainc='/var/www/html/cms/application/controllers';
	$controllersfiles = get_all_directory_and_files('/var/www/html/cms/application/controllers',$date,'controllers',$mainc);
	// print_r($controllersfiles);
	// exit();
	 //echo count($controllersfiles, COUNT_RECURSIVE);
	//echo $countt=count($controllersfiles);
   //  $count=$countt - 1; $k=0;

	//for($k=0;$count<=0;$k++){
	 foreach($controllersfiles as $cfile){ 
	//echo $cfile;
	if(is_array($cfile)){
		mulipal_folder($cfile,$date);
		//foreach($cfile as $cfilee){ 
		
	// $cfilee; //echo ' cfilee <br>';
//$pathee = basename($cfilee); //echo ' pathee <br>';
	
	// $newfileee= strstr($cfilee, $pathee, true); //echo ' newfileee <br>';
	//$link = 'http://mydomain.com/index.php?id=115&Itemid=283&return=aHR0cDovL2NvbW11bml0';
//$linkParts = explode('/', $newfileee);
//$link = $linkParts[0];
//print_r($controllersfiles);
	//echo chop($newfileee,"/var/www/html/cms/application/");
	//$prefix="/var/www/html/cms/application/";
	//echo $result = str_replace($prefix, "/", $newfileee, 1);echo ' result <br>';
	// $result = str_replace("/var/www/html/cms/","",$newfileee); //echo ' result <br>';
	// $filter_one= strstr($cfilee, "/var/www/html/cms/application/", true); //echo ' filter_one <br>';
	  // $path = basename($cfile);   
	  //	 if (file_exists($file)) {echo "The file $file exists";} else { echo "The file $file does not exist";}
	//echo $file;// $filee ='/var/www/html/greenhandleweb/Test/'.$file;
    // $newpath ='/var/www/html/cms/Test_copy/filebackup_'.$date.'/'.$result.$pathee; //echo ' newpath <br>';
    
	// if(copy($cfilee,$newpath)){ echo "to copy $cfilee";}else{echo "failed to copy $cfilee";}
	 
	//} // foreach($cfile as $cfilee){ 
		
	}else{
	  //$pathee = basename($cfile); echo '<br>';
	  $path = basename($cfile);
	  // $path = basename($cfile);   
	  	// if (file_exists($file)) {echo "The file $file exists";} else {echo "The file $file does not exist";}
	//echo $file;// $filee ='/var/www/html/greenhandleweb/Test/'.$file;
     $newfile ='/var/www/html/cms/Test_copy/filebackup_'.$date.'/application/controllers/'.$path;
    
	 if(copy($cfile,$newfile)){ echo " to copy $cfile";}else{ echo "failed to copy $cfile";}
	 
	}
	
	  }
	//  }
	
	
		 	 ////////////////////////////////////////////////////controllers/////////////////////////////////////////////////////
             ////////////////////////////////////////////////////controllers/////////////////////////////////////////////////////

	
	echo ' modelsfiles <br><br><br>';
	
	 ////////////////////////////////////////////////////Model/////////////////////////////////////////////////////
	 	 ////////////////////////////////////////////////////Model/////////////////////////////////////////////////////
	// exit();
	 //$controllersfiles = glob('/var/www/html/cms/application/controllers/*');
	 $main='/var/www/html/cms/application/models';
	$modelsfiles = get_all_directory_and_files('/var/www/html/cms/application/models',$date,'models',$main);
	// print_r($modelsfiles);
	// exit();
	 //echo count($controllersfiles, COUNT_RECURSIVE);
	//echo $countt=count($controllersfiles);
   //  $count=$countt - 1; $k=0;
     echo '<br><br><br>';
	//for($k=0;$count<=0;$k++){
	 foreach($modelsfiles as $mfile){ 
	//echo $cfile;
	if(is_array($mfile)){
		mulipal_folder($mfile,$date);
	
		
	}else{
	  //$pathee = basename($cfile); echo '<br>';
	   $mpath = basename($mfile);
	  // $path = basename($cfile);   
	  	
		// if (file_exists($file)) {echo "The file $file exists";} else {echo "The file $file does not exist";}
		
	//echo $file;// $filee ='/var/www/html/greenhandleweb/Test/'.$file;
     $mnewfile ='/var/www/html/cms/Test_copy/filebackup_'.$date.'/application/models/'.$mpath;
    
	 if(copy($mfile,$mnewfile)){ echo " to copy $mfile";}else{ echo "failed to copy $mfile";}
	 
	}
	
	  }
	//  }
		 	 ////////////////////////////////////////////////////Model/////////////////////////////////////////////////////
             ////////////////////////////////////////////////////Model/////////////////////////////////////////////////////

	
 ////////////////////////////////////////////////////View/////////////////////////////////////////////////////
             ////////////////////////////////////////////////////View/////////////////////////////////////////////////////
			 

	 //$controllersfiles = glob('/var/www/html/cms/application/controllers/*');
	  $mainv='/var/www/html/cms/application/views';
  	$viewsfiles = get_all_directory_and_files('/var/www/html/cms/application/views',$date,'views',$mainv);
	 print_r($viewsfiles);
	// exit();
	 //echo count($controllersfiles, COUNT_RECURSIVE);
	//echo $countt=count($controllersfiles);
   //  $count=$countt - 1; $k=0;
 echo '<br><br><br>';
	//for($k=0;$count<=0;$k++){
	 foreach($viewsfiles as $vfile){ 
	//echo $cfile;
	if(is_array($vfile)){
		mulipal_folder($vfile,$date);
		//foreach($vfile as $vcfilee){ 
		
  //  echo $vcfilee; echo ' vcfilee <br>';
	// $vpathee = basename($vcfilee); echo ' vpathee <br>';
	
	//echo $vnewfileee= strstr($vcfilee, $vpathee, true); echo ' vnewfileee <br>';
	//$link = 'http://mydomain.com/index.php?id=115&Itemid=283&return=aHR0cDovL2NvbW11bml0';
//$linkParts = explode('/', $newfileee);
//$link = $linkParts[0];
//print_r($controllersfiles);
	//echo chop($newfileee,"/var/www/html/cms/application/");
	//$prefix="/var/www/html/cms/application/";
	//echo $result = str_replace($prefix, "/", $newfileee, 1);echo ' result <br>';
	// $vresult = str_replace("/var/www/html/cms/","",$vnewfileee); echo ' vresult <br>';
	// $filter_one= strstr($cfilee, "/var/www/html/cms/application/", true); //echo ' filter_one <br>';
	  // $path = basename($cfile);   
	  	// if (file_exists($file)) {echo "The file $file exists";} else {echo "The file $file does not exist";}
	//echo $file;// $filee ='/var/www/html/greenhandleweb/Test/'.$file;
   // echo $vnewpath ='/var/www/html/cms/Test_copy/filebackup_'.$date.'/'.$vresult.$vpathee;echo ' vnewpath  <br>';
    
	// if(copy($vcfilee,$vnewpath)){ echo " to copy $vcfilee";}else{echo "failed to copy $vcfilee";}
	 
	//} // foreach($cfile as $cfilee){ 
		
	}else{
	  //$pathee = basename($cfile); echo '<br>';
	   $vpath = basename($vfile);
	  // $path = basename($cfile);   
	  	
	// if (file_exists($file)) {echo "The file $file exists";} else {echo "The file $file does not exist";}
	//echo $file;// $filee ='/var/www/html/greenhandleweb/Test/'.$file;
     $vnewfile ='/var/www/html/cms/Test_copy/filebackup_'.$date.'/application/views/'.$vpath;
    
	 if(copy($vfile,$vnewfile)){ echo " to copy $vfile";}else{ echo "failed to copy $vfile";}
	 
	}
	
	  }			 
			 
			  ////////////////////////////////////////////////////View/////////////////////////////////////////////////////
             ////////////////////////////////////////////////////View/////////////////////////////////////////////////////	
	
	chmod('/var/www/html/cms/Test_copy/filebackup_'.$date, 0777);
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//create zip     
    $path = realpath('/var/www/html/cms/Test_copy/filebackup_'.$date);
    //$path1 = realpath(__DIR__.'/bkup/a/');
   
    // echo "Zipping " . $path. "\n";
	echo "zip: ", extension_loaded('zip') ? 'OK' : 'MISSING', '<br>';
	//exit();
        $zip = new ZipArchive();
		//print_r($zip);
		
    $zip->open('/var/www/html/cms/Test_copy/filebkup'.$date.'.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);
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
 $file = '/var/www/html/cms/Test_copy/filebkup'.$date.'.zip';
//exit();
 $upload_file= $this->aws3->sendFile('greenfilebackup',$file);
 // replace testing-bucket-for-study(bucket name) with your live bucket name
 
 if($upload_file==1){
  $rem_files = glob('/var/www/html/cms/Test_copy/*');
    foreach($rem_files as $file){ // iterate files
        if(is_file($file))
          unlink($file); // delete file
      }
	  
	  
 }

////////////////////////////////////////////////////////////////
 //remove files from folder

   $files = glob('/var/www/html/cms/Test_copy/*');

    foreach($files as $file){ // iterate files
      if(is_file($file))
        unlink($file); // delete file
    }
//exit();
	
	
	
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
}	


?>