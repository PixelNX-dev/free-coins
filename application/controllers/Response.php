<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Response extends CI_Controller {
		
	public function index(){
		die('Unauthorize Access!!');
	}
		
    function ipn(){
		if(isset($_POST['WP_BUYER_NAME'])){
			$this->load->library("autoresponder");
            $this->DBfile->put_data('recordtbl' , array('rec_data'=>json_encode($_POST),'rec_email'=>$_POST['WP_BUYER_EMAIL'],'rec_date'=>date('d-m-Y'),'rec_name'=>$_POST['WP_BUYER_NAME'],'rec_price'=>$_POST['WP_SALE_AMOUNT']));
            $userDetails = $this->DBfile->get_data('usertbl' , array('u_email' => $_POST['WP_BUYER_EMAIL']),'*');			
			$is_fe = $is_oto1 = 0;
              
            $name = $_POST['WP_BUYER_NAME'];
			
			if( $_POST['WP_ITEM_NUMBER'] == 'wso_b52qsr' || $_POST['WP_ITEM_NUMBER'] == 'wso_zq9h2d' || $_POST['WP_ITEM_NUMBER'] == 'wso_xw2575' ){
				$is_fe = 1;
				$prodName = SITENAME.' - FrontEnd';
			} elseif( $_POST['WP_ITEM_NUMBER'] == 'wso_p0xln7' || $_POST['WP_ITEM_NUMBER'] == 'wso_tvntzr' ){
				$is_oto1 = 1;
				$prodName = SITENAME.' - Unlimited';
			}

			if( $_POST['WP_ITEM_NUMBER'] == 'wso_t0tm50' || $_POST['WP_ITEM_NUMBER'] == 'wso_dfr33b' ){
				$_POST['WP_ITEM_NUMBER'] = 'wso_mnfq2q';
				//$_POST['SOURCE'] = 'FREE COINS';
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, 'https://commissionblaster.co/response/ipn');
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, "WP_BUYER_NAME=".$_POST['WP_BUYER_NAME']."&WP_BUYER_EMAIL=".$_POST['WP_BUYER_EMAIL']."&WP_ITEM_NUMBER=wso_mnfq2q&SOURCE=FREE COINS&WP_SALE_AMOUNT=10.25");
			
				$headers = array();
				$headers[] = 'Content-Type: application/x-www-form-urlencoded';
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			
				$result = curl_exec($ch);
				curl_close($ch);
				print_r($result);
				die();
			}

			if(empty($userDetails)) { // NEW USER
				$password = substr(md5(date('his')), 0, 8);
				$user_details = array( 
					'u_name' => $name,
					'u_email' => $_POST['WP_BUYER_EMAIL'],
					'u_password' => md5($password),
					'u_status' => 1,
					'u_type' => 2,
					'is_fe'=> $is_fe,
					'is_oto1'=> $is_oto1,
					'u_purchaseddate'=> date('d-m-Y h:i:s')
				);
				$this->DBfile->put_data('usertbl' , $user_details);    
				
				/* GetResponse */

				$listID = 'jxKNe'; // traffic_avalanche
				$args = array(
					'campaign' => array('campaignId'=>$listID),
					'email' => $_POST['WP_BUYER_EMAIL'],
					'name'  =>  $_POST['WP_BUYER_NAME'],
					'dayOfCycle'=>0,
				);                                                                
				$data_string = json_encode($args);                                                                                   
				$ch = curl_init('https://api.getresponse.com/v3/contacts');
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
				curl_setopt($ch, CURLOPT_HTTPHEADER, array(    
					'X-Auth-Token:api-key 7p55ps3l2j6rvww0e7xyi0ir94pzv6j5',                                                                      
					'Content-Type: application/json',                                                                                
					'Content-Length: ' . strlen($data_string))                                                                       
				);
				$result = curl_exec($ch);

				/* GetResponse */


			}else { // OLD USER

			if( $_POST['WP_ITEM_NUMBER'] == 'wso_b52qsr' || $_POST['WP_ITEM_NUMBER'] == 'wso_zq9h2d' || $_POST['WP_ITEM_NUMBER'] == 'wso_xw2575' )
                $is_fe = 1;
            else
                $is_fe = $userDetails[0]['is_fe'];
            
			if( $_POST['WP_ITEM_NUMBER'] == 'wso_p0xln7' || $_POST['WP_ITEM_NUMBER'] == 'wso_tvntzr' )
                $is_oto1 = 1;
            else
                $is_oto1 = $userDetails[0]['is_oto1'];

				$uid = $userDetails[0]['u_id'];
				$user_details = array(
					'u_status' => 1,
					'is_fe'=> $is_fe,
					'is_oto1'=> $is_oto1
				);
				$password = "EXISTING password will work"; 
                $this->DBfile->set_data('usertbl' , $user_details ,array('u_id' => $uid));
			} 
			$user_email = strtolower($_POST['WP_BUYER_EMAIL']);
            
			$body = '<p>Hello '.$name.',</p>';
			$body .= '<p>Thank you for buying - '.$prodName.'.</p>';
			$body .= '<p> Here are your login details <br/> ';
            $body .= 'Login URL : '.base_url().'<br/>';
            $body .= 'Email : '.$user_email.'<br/>';
            $body .= 'Password : '.$password.'<br/>';
            $body .= '</p>';
            $body .= '<p>You can change your password from your profile page.</p>';
			$body .= '<p>To your success.<br/>Team, '.SITENAME.'</p>';
			sendUserEmailMandrill($user_email,'Product Access ['.SITENAME.']',$body);
		}
	}

}
?>