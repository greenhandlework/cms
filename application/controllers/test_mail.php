<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_mail extends CI_Model {

	public function mail($title,$content)
	{
	  $html = "<!DOCTYPE HTML PUBLIC '-//W3C//DTD XHTML 1.0 Transitional //EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office'><head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
    <meta name='viewport' content='width=device-width'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'><!--<![endif]-->
    <title>Greenhandle</title>
	 <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	 <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' type='text/css'>
	 <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>

      <style type='text/css' id='media-query'>
      body {
  margin: 0;
  padding: 0; }

  .space{
  	 margin-right:50px;
  }

table, tr, td {
  vertical-align: top;
  border-collapse: collapse; }

.ie-browser table, .mso-container table {
  table-layout: fixed; }

* {
  line-height: inherit; }

a[x-apple-data-detectors=true] {
  color: inherit !important;
  text-decoration: none !important; }

[owa] .img-container div, [owa] .img-container button {
  display: block !important; }

[owa] .fullwidth button {
  width: 100% !important; }

[owa] .block-grid .col {
  display: table-cell;
  float: none !important;
  vertical-align: top; }

.ie-browser .num12, .ie-browser .block-grid, [owa] .num12, [owa] .block-grid {
  width: 675px !important; }

.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {
  line-height: 100%; }

.ie-browser .mixed-two-up .num4, [owa] .mixed-two-up .num4 {
  width: 224px !important; }

.ie-browser .mixed-two-up .num8, [owa] .mixed-two-up .num8 {
  width: 448px !important; }

.ie-browser .block-grid.two-up .col, [owa] .block-grid.two-up .col {
  width: 337px !important; }

.ie-browser .block-grid.three-up .col, [owa] .block-grid.three-up .col {
  width: 225px !important; }

.ie-browser .block-grid.four-up .col, [owa] .block-grid.four-up .col {
  width: 168px !important; }

.ie-browser .block-grid.five-up .col, [owa] .block-grid.five-up .col {
  width: 135px !important; }

.ie-browser .block-grid.six-up .col, [owa] .block-grid.six-up .col {
  width: 112px !important; }

.ie-browser .block-grid.seven-up .col, [owa] .block-grid.seven-up .col {
  width: 96px !important; }

.ie-browser .block-grid.eight-up .col, [owa] .block-grid.eight-up .col {
  width: 84px !important; }

.ie-browser .block-grid.nine-up .col, [owa] .block-grid.nine-up .col {
  width: 75px !important; }

.ie-browser .block-grid.ten-up .col, [owa] .block-grid.ten-up .col {
  width: 67px !important; }

.ie-browser .block-grid.eleven-up .col, [owa] .block-grid.eleven-up .col {
  width: 61px !important; }

.ie-browser .block-grid.twelve-up .col, [owa] .block-grid.twelve-up .col {
  width: 56px !important; }

@media only screen and (min-width: 695px) {
  .block-grid {
    width: 675px !important; }
  .block-grid .col {
    vertical-align: top; }
    .block-grid .col.num12 {
      width: 675px !important; }
  .block-grid.mixed-two-up .col.num4 {
    width: 224px !important; }
  .block-grid.mixed-two-up .col.num8 {
    width: 448px !important; }
  .block-grid.two-up .col {
    width: 337px !important; }
  .block-grid.three-up .col {
    width: 225px !important; }
  .block-grid.four-up .col {
    width: 168px !important; }
  .block-grid.five-up .col {
    width: 135px !important; }
  .block-grid.six-up .col {
    width: 112px !important; }
  .block-grid.seven-up .col {
    width: 96px !important; }
  .block-grid.eight-up .col {
    width: 84px !important; }
  .block-grid.nine-up .col {
    width: 75px !important; }
  .block-grid.ten-up .col {
    width: 67px !important; }
  .block-grid.eleven-up .col {
    width: 61px !important; }
  .block-grid.twelve-up .col {
    width: 56px !important; } }

@media (max-width: 695px) {
  .block-grid, .col {
    min-width: 320px !important;
    max-width: 100% !important;
    display: block !important; }
  .block-grid {
    width: calc(100% - 40px) !important; }
  .col {
    width: 100% !important; }
    .col > div {
      margin: 0 auto; }
  img.fullwidth, img.fullwidthOnMobile {
    max-width: 100% !important; }
  .no-stack .col {
    min-width: 0 !important;
    display: table-cell !important; }
  .no-stack.two-up .col {
    width: 50% !important; }
  .no-stack.mixed-two-up .col.num4 {
    width: 33% !important; }
  .no-stack.mixed-two-up .col.num8 {
    width: 66% !important; }
  .no-stack.three-up .col.num4 {
    width: 33% !important; }
  .no-stack.four-up .col.num3 {
    width: 25% !important; }
  .mobile_hide {
    min-height: 0px;
    max-height: 0px;
    max-width: 0px;
    display: none;
    overflow: hidden;
    font-size: 0px; } }

    </style>
</head>
<body class='clean-body' style='margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #FFFFFF'>
  <style type='text/css' id='media-query-bodytag'>
    @media (max-width: 520px) {
      .block-grid {
        min-width: 320px!important;
        max-width: 100%!important;
        width: 100%!important;
        display: block!important;
      }

      .col {
        min-width: 320px!important;
        max-width: 100%!important;
        width: 100%!important;
        display: block!important;
      }

        .col > div {
          margin: 0 auto;
        }

      img.fullwidth {
        max-width: 100%!important;
      }
			img.fullwidthOnMobile {
        max-width: 100%!important;
      }
      .no-stack .col {
				min-width: 0!important;
				display: table-cell!important;
			}
			.no-stack.two-up .col {
				width: 50%!important;
			}
			.no-stack.mixed-two-up .col.num4 {
				width: 33%!important;
			}
			.no-stack.mixed-two-up .col.num8 {
				width: 66%!important;
			}
			.no-stack.three-up .col.num4 {
				width: 33%!important;
			}
			.no-stack.four-up .col.num3 {
				width: 25%!important;
			}
      .mobile_hide {
        min-height: 0px!important;
        max-height: 0px!important;
        max-width: 0px!important;
        display: none!important;
        overflow: hidden!important;
        font-size: 0px!important;
      }
    }
  </style>
  
  <table class='nl-container' style='border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #FFFFFF;width: 100%' cellpadding='0' cellspacing='0'>
	<tbody>
	<tr style='vertical-align: top'>
		<td style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'>

    <div style='background-color:transparent;'>
      <div style='Margin: 0 auto;min-width: 320px;max-width: 675px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;' class='block-grid '>
        <div style='border-collapse: collapse;display: table;width: 100%;background-color:transparent;'>

            <div class='col num12' style='min-width: 320px;max-width: 675px;display: table-cell;vertical-align: top;'>
              <div style='background-color: transparent; width: 100% !important;'>
                <div style='border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;'>

                  
                    <div align='center' class='img-container center  autowidth  ' style='padding-right: 0px;  padding-left: 0px;'>
  <img class='center  autowidth ' align='center' border='0' src='https://www.greenhandle.in/images/logo.png' alt='Image' title='Image' style='outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: 0;height: auto;float: none;width: 100%;max-width: 220px' width='220'>
</div>
            </div>
              </div>
            </div>
        </div>
      </div>
    </div>
    <div style='background-color:transparent;'>
      <div style='Margin: 0 auto;min-width: 320px;max-width: 675px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;' class='block-grid '>
        <div style='border-collapse: collapse;display: table;width: 100%;background-color:transparent;'>

            <div class='col num12' style='min-width: 320px;max-width: 675px;display: table-cell;vertical-align: top;'>
              <div style='background-color: transparent; width: 100% !important;'>
             <div style='border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;'>
                    <div class=''>
	<div style='color:#555555;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;line-height:120%; padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px;'>	
		<div style='font-size:12px;line-height:14px;color:#555555;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;'>
			<center><p style='margin: 0;font-size: 14px;line-height: 17px'>".$title."</p></center></div>	
	</div>
</div>
              </div>
              </div>
            </div>
        </div>
      </div>
    </div>
    <div style='background-color:transparent;'>
      <div style='Margin: 0 auto;min-width: 320px;max-width: 675px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;' class='block-grid '>
        <div style='border-collapse: collapse;display: table;width: 100%;background-color:transparent;'>

            <div class='col num12' style='min-width: 320px;max-width: 675px;display: table-cell;vertical-align: top;'>
              <div style='background-color: transparent; width: 100% !important;'>
             <div style='border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;'>

                  
                    <div class=''>
	<div style='color:#555555;line-height:120%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px;'>	
		<div style='font-size:12px;line-height:14px;color:#555555;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;'>
		".$content."

		</div>	
	</div>
</div>
                  
            </div>
              </div>
            </div>
        </div>
      </div>
    </div>
    <div style='background-color:#F0F0F0;'>
      <div style='Margin: 0 auto;min-width: 320px;max-width: 675px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;' class='block-grid '>
        <div style='border-collapse: collapse;display: table;width: 100%;background-color:transparent;'>

            <div class='col num12' style='min-width: 320px;max-width: 675px;display: table-cell;vertical-align: top;'>
              <div style='background-color: transparent; width: 100% !important;'>
            <div style='border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:30px; padding-bottom:30px; padding-right: 0px; padding-left: 0px;'>
                    
<div align='center' style='padding-right: 10px; padding-left: 10px; padding-bottom: 10px;' class=''>
  <div style='line-height:10px;font-size:1px'>&#160;</div>
  <div style='display: table; max-width:151px;'>
    <table align='left' border='0' cellspacing='0' cellpadding='0' width='32' height='32' style='border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;Margin-right: 5px'>
      <tbody><tr style='vertical-align: top'><td align='left' valign='middle' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'>
        <a href='https://www.facebook.com/' title='Facebook' target='_blank'>
          <img src='images/facebook.png' alt='Facebook' title='Facebook' width='32' style='outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important'>
        </a>
      <div style='line-height:5px;font-size:1px'>&#160;</div>
      </td></tr>
    </tbody></table>
    <table align='left' border='0' cellspacing='0' cellpadding='0' width='32' height='32' style='border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;Margin-right: 5px'>
      <tbody><tr style='vertical-align: top'><td align='left' valign='middle' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'>
        <a href='http://twitter.com/' title='Twitter' target='_blank'>
          <img src='images/twitter.png' alt='Twitter' title='Twitter' width='32' style='outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important'>
        </a>
      <div style='line-height:5px;font-size:1px'>&#160;</div>
      </td></tr>
    </tbody></table>
    <table align='left' border='0' cellspacing='0' cellpadding='0' width='32' height='32' style='border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;Margin-right: 0'>
      <tbody><tr style='vertical-align: top'><td align='left' valign='middle' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'>
        <a href='http://plus.google.com/' title='Google+' target='_blank'>
          <img src='images/googleplus.png' alt='Google+' title='Google+' width='32' style='outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important'>
        </a>
      <div style='line-height:5px;font-size:1px'>&#160;</div>
      </td></tr>
    </tbody></table>
  </div>
</div>
                  
                  
                    <div class=''>
	<div style='color:#959595;font-family:'Montserrat', 'Trebuchet MS', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Tahoma, sans-serif;line-height:150%; padding-right: 10px; padding-left: 10px; padding-top: 15px; padding-bottom: 10px;'>	
		<div style='font-size:12px;line-height:18px;font-family:Montserrat, 'Trebuchet MS', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Tahoma, sans-serif;color:#959595;text-align:left;'><p style='margin: 0;font-size: 14px;line-height: 21px;text-align: center'>greenhandle © All rights reserved</p></div>	
	</div>
</div>
                  
              </div>
              </div>
            </div>
        </div>
      </div>
    </div>
		</td>
  </tr>
  </tbody>
  </table>


</body></html>";

	  return $html;
	}
	
	public function Check_que(){
		
		
	//function checkbuyer($data=null)
	{
		$this->db->trans_begin();
		//try {
			//$sql = $this->db->query("select * from login where (mobile_number='".$data['username']."' or email='".$data['username']."') and role_id =2 and password='".$data['password']."'");
$this->db->select(array('id','user_id','first_name','last_name','name','username','user_type','account_status','profile_pic','date_of_deactivation','role_id','email','cart_id','mobile_number','mobile_number_verified','email_verification_code','email_verified','org_name','account_creation_date','address_1','address_2','state','city','zipcode','Invited_To','GH_refer_points','refer_earn_status','money_bag_data','account_creation_time','gst','log_status'));
$this->db->from('login');
//$this->db->where('role_id', '2');
//$this->db->where('password', $data['password']);
//$this->db->where('mobile_number', $data['username']);
//$this->db->or_where_in('email',$data['username']);
$this->db->where('user_id','1032077648');
//$this->db->where("usertype","admin");
$sql=$this->db->get();
//print_r($sql->result_array());
			$rowcount = $sql->num_rows();
			if($rowcount>0){
			//$update_log = $this->db->query("Update login SET `log_status`='1' where (mobile_number='".$data['username']."' or email='".$data['username']."') and role_id =2 and password='".$data['password']."'");

				return $sql->result_array();
			}
			else
			{
				return false;
			}
			
		if ($this->db->trans_status() === FALSE){
        $this->db->trans_rollback();
		//$p=1; 
              }else{
        $this->db->trans_commit();
	//	$p=2; 
            }	
			
		//} catch (Exception $e) {
			// print error
		//	redirect('/index','refrest');
		//}
	}
	}
}
?>