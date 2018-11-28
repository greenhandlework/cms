<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Link extends CI_Model {

    public function hit($link, $params, $type = 1, $headers = array()) {
        $Base_API = 'http://52.66.99.138/cms/index.php/';
        $query = http_build_query($params);
        $request = curl_init();
        if ($type == 0) {
            $url = $Base_API . $link . "?" . $query;
        } else {
            $url = $Base_API . $link;
        }
        curl_setopt($request, CURLOPT_URL, $url);
        if (count($headers) > 0) {
            curl_setopt($request, CURLOPT_HTTPHEADER, $headers);
        }
        curl_setopt($request, CURLOPT_POSTFIELDS, $params);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($request, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($request, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
        $result = curl_exec($request);
        curl_close($request);
        return $result;
    }

     public function getHash($val) {
        return hash('sha256', '!l0v3'.trim($val).'0a5!s');
    }


    public function isUserLoggedInAPI($token, $id) {
        $result = $this->db->get_where('login_sessions', array('userid' => $id , 'session_key' => $token, 'status' => 3));
        if ($result->num_rows() === 1) {
            return true;
        } else {
            return false;
        }
    }

     public function getIP() {
        $ip = $this->input->ip_address();
        return $ip;
    }

     public function getuserdata($id, $print = false) {
        $response = array('status' => false, 'data' => array());
        $getuserdetails = $this->db->get_where('users',array('id'=>$id));
        if($getuserdetails->num_rows()===1) {
            $row = $getuserdetails->row();
            $id = $row->id;
            $email = $row->email;
            $status = $row->status;
            $sessionarray = array(
                'userid'=>$id,
                'username'=>$email,
                'status'=>$status
            );
            $this->session->set_userdata($sessionarray);
            $response['data'] = $sessionarray;
        }
        $response['status'] = true;
        if ($print) {
            echo json_encode($response);
        } else {
            return $response;
        }
    }
}
?>