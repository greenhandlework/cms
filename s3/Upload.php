<?php

function profile_upload()
{
    //print_r($_FILES);
    if ($this->session->userdata('user_login')) {

        $file = $_FILES['agent_profile_file']['tmp_name'];

        if (file_exists($file)) {
            $allowedExts = array("gif", "jpeg", "jpg", "png");
            $typefile    = explode(".", $_FILES["agent_profile_file"]["name"]);
            $extension   = end($typefile);

            if (!in_array(strtolower($extension), $allowedExts)) {
                //not image
                $data['message'] = "images";
            } else {
                $userid = $this->session->userdata['user_login']['userid'];

                $full_path = "agent_image/" . $userid . "/profileImg/";

                /*if(!is_dir($full_path)){
                mkdir($full_path, 0777, true);
                }*/
                $path = $_FILES['agent_profile_file']['tmp_name'];

                $image_name = $full_path . preg_replace("/[^a-z0-9\._]+/", "-", strtolower(uniqid() . $_FILES['agent_profile_file']['name']));
                //move_uploaded_file($path,$image_name);

                $data['message'] = "sucess";

                $s3_bucket = s3_bucket_upload($path, $image_name);

                if ($s3_bucket['message'] == "sucess") {
                    $data['imagename'] = $s3_bucket['imagepath'];
                    $data['imagepath'] = $s3_bucket['imagename'];
                }

                //print_r($imagesizedata);
                //image
                //use $imagesizedata to get extra info
            }
        } else {
            //not file
            $data['message'] = "images";
        }

    } else {
        $data['message'] = "login";
    }
    echo json_encode($data);
    //$file_name2 = preg_replace("/ /", "-", $file_name);
}

// Helper file add code
// image compress code
function compress($source, $destination, $quality)
{
    ob_start();
    $info = getimagesize($source);

    if ($info['mime'] == 'image/jpeg') {
        $image = imagecreatefromjpeg($source);
    } elseif ($info['mime'] == 'image/gif') {
        $image = imagecreatefromgif($source);
    } elseif ($info['mime'] == 'image/png') {
        $image = imagecreatefrompng($source);
    }

    $filename = tempnam(sys_get_temp_dir(), "beyondbroker");

    imagejpeg($image, $filename, $quality);

    //ob_get_contents();
    $imagedata = ob_end_clean();
    return $filename;
}

// type for if image then it will reduce size
// site for it in web of mobile because mobile webservice image will in base 64
// $tempth will file temp path
// $image_path will file where to save path

function s3_bucket_upload($temppath, $image_path, $type = "image", $site = "web")
{
    $bucket = "bucket-name";

    $data = array();

    $data['message'] = "false";

    // For website only
    if ($site == "web") {
        if ($type == "image") {
            $file_Path = compress($temppath, $image_path, 90);
        } else {
            $file_Path = $temppath;
        }
    }

    try {
        $s3Client = new S3Client([
            'version'     => 'latest',
            'region'      => 'us-west-2',
            'credentials' => [
                'key'    => 'aws-key',
                'secret' => 'aws-secretkey',
            ],
        ]);

        // For website only
        if ($site == "web") {

            $result = $s3Client->putObject([
                'Bucket'     => $bucket,
                'Key'        => $image_path,
                'SourceFile' => $file_Path,
                //'body'=> $file_Path,
                'ACL'        => 'public-read',
                //'StorageClass' => 'REDUCED_REDUNDANCY',
            ]);

            $data['message']   = "sucess";
            $data['imagename'] = $image_path;
            $data['imagepath'] = $result['ObjectURL'];
        } else {
            // $tmp = base64_decode($base64);
            $upload            = $s3Client->upload($bucket, $image_path, $temppath, 'public-read');
            $data['message']   = "sucess";
            $data['imagepath'] = $upload->get('ObjectURL');
        }

    } catch (Exception $e) {
        $data['message'] = "false";
        // echo $e->getMessage() . "\n";
    }

    return $data;
}