<?php
class File_Transfer extends CI_Controller{
	
function __Construct(){

		parent::__construct();
		
	$this->load->model('site_sentry');
// Test
	//'hostname' => 'test.cozmpv9bgzaq.ap-south-1.rds.amazonaws.com',
	//'username' => 'greenhandlework',
	//'database' => 'greenhandle_dev',
	//'password' => 'A1S2D3F4',
// Live
	// 'hostname' => 'greenhandle.ctjf6g73jsdo.ap-south-1.rds.amazonaws.com',
	// 'username' => 'greenhandle',
	// 'database' => 'greenhandlelive',
	// 'password' => 'A1S2D3F4',
	
	
	}
	
	
	function index(){
		$file_pointer = '/var/www/html/cms/key_change/greenindia.pub';
        if (file_exists($file_pointer)) {
            echo "The file $file_pointer exists";
        }else {
            echo "The file $file_pointer does 
                                   not exists";
        }
	//	exit();
		
$this->load->library('sftp');

$config['hostname'] = 'ec2-13-127-171-179.ap-south-1.compute.amazonaws.com';
$config['username'] = 'ubuntu';
$config['pubkeyfile'] = '/var/www/html/cms/key_change/greenindia.pub';
$config['prikeyfile'] = '/var/www/html/cms/key_change/greenindia.ppe';
$config['debug']        = TRUE;

$this->sftp->connect($config);

$list = $this->sftp->list_files('/var/www/html/greenhandleweb/Excel');

print_r($list);
echo 'test';
$this->ftp->close();
	}
	
	
	
	public function use_phpcli(){
		
		require "vendor/autoload.php";

//use phpseclib\Crypt\RSA;
//use phpseclib\Net\SFTP;

$sftp = new SFTP('sftp.server.com');

// create new RSA key
$privateKey = new RSA();

// in case that key has a password
$privateKey->setPassword('private key password');

// load the private key
$privateKey->loadKey(file_get_contents('/path/to/privatekey.pem'));

// login via sftp
if (!$sftp->login('username', $privateKey)) {
    throw new Exception('sFTP login failed');
}

// now you can list what's in here
$filesAndFolders = $sftp->nlist();

// you can change directory
$sftp->chdir('coolstuffdir');

// get a file
$sftp->get('remoteFile', 'localFile');

// create a remote new file with defined content
$sftp->put('newfile.txt', 'new file content');

// put a local file
$sftp->put('remote.txt', 'local.txt', NET_SFTP_LOCAL_FILE);
	}
	
	
}
?>