<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

 $filename1 = 'Aws/aws-autoloader.php';
 require $filename1;

 use Aws\S3\S3Client;
 use Aws\S3\Exception\S3Exception;
 
 class Aws3{
	
	private $S3;
	//Live
	//AKIAIG3BLLUNRSFKWFIA
	//Nt4/H6fbzcGxwPgHb7+kb8Z7B0Ze9is+9451XdAi
	
	//TEST
	
	// $IAM_KEY = 'AKIAIB3PRPDH7C4MWWUQ';
 //  $IAM_SECRET = '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';
	public function __construct(){
		$this->S3 = S3Client::factory(array(
                  
                  'version'=> 'latest',     
                  'region'  => 'us-east-1',  //us-east-1  //ap-south-1
                  'credentials' => [
	                  'key' => 'AKIAIG3BLLUNRSFKWFIA', // replace with your live key
	                  'secret' => 'Nt4/H6fbzcGxwPgHb7+kb8Z7B0Ze9is+9451XdAi' ],
	                  // replace with your live secret key 
              ));
	}	

	
	
	public function addBucket($bucketName){
		$result = $this->S3->createBucket(array(
			'Bucket'=>$bucketName,
			'LocationConstraint'=> 'ap-south-1'));
		return $result;	
	}
	
	// for file uploading on s3 bucket
	public function sendFile($bucketName, $filename){
		date_default_timezone_set("Asia/Calcutta");
		$t =date("d-m-Y h:i:sa");
      
		$result = $this->S3->putObject(array(
				'Bucket' => $bucketName,
				'Key' => $t,
				'SourceFile' => $filename,				
				'StorageClass' => 'STANDARD',
				'ACL' => 'public-read'
		));
		 return $result['ObjectURL'];  // return file path
		//return 1; // return file path of s3 bucket
	}
		
	 
 }