<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authenticate extends CI_Controller {
		
	public function index(){
		die('Unauthorize Access!!');
	}
		
	private function checkValidAJAX(){
		$ref = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '' ;
		if( strpos($ref,base_url()) === false )
			die('Unauthorize Access!!');
		if( !isset($_POST) )
			die('Unauthorize Access!!');
		
		$postData = array();
		foreach( $_POST as $key=>$value ){
			$temp = $this->input->post($key,TRUE);
			$temp = $this->db->escape($temp);
			$postData[$key] = $temp;
		}
		return json_encode($postData);
	}
	
	public function login(){
		$jsonPost = $this->checkValidAJAX();
		$postData = json_decode($jsonPost,TRUE);
		$res = $this->DBfile->get_data( 'usertbl', array('u_email'=>$_POST['em']),'*');
		
		if(!empty($res)){
			if($res[0]['u_password'] != md5($_POST['pwd'])){
				echo '1';die();
			}
			if($res[0]['u_status'] == 2 ){
				echo '2';die(); // InActive User
			}
			if($res[0]['u_status'] == 3 ){
				echo '3';die(); // Blocked User
			}
			$nameInitials = substr($res[0]['u_name'],0,2);
			$user_detail = array(
				'loginstatus' => 1,
				'id' => $res[0]['u_id'],
				'firstname' => explode($res[0]['u_name'],' ')[0],
				'initials' => $nameInitials,
				'type' => $res[0]['u_type'],
				'nickname' => $res[0]['u_nickname'],
				'is_fe' => $res[0]['is_fe'],
				'is_oto1' => $res[0]['is_oto1']
			);
			$this->session->set_userdata($user_detail);

			$t = $res[0]['u_type'] == 2 ? 'u' : '' ; 

			if( $_POST['rem'] == 1 ) {
				setcookie($t.'em', $_POST['em'], time() + (86400 * 30 * 24), "/");
				setcookie($t.'pwd', $_POST['pwd'], time() + (86400 * 30 * 24), "/");
			}
			else{
				setcookie($t.'em', '', time() - (86400 * 30), "/");
				setcookie($t.'pwd', '', time() - (86400 * 30), "/");
			}
			echo '5';
		}
		else
			echo '0';
		die();
	}	


    public function signup(){
		$jsonPost = $this->checkValidAJAX();
		$postData = json_decode($jsonPost,TRUE);
		$res = $this->DBfile->get_data( 'usertbl', array('u_email'=>$_POST['em']),'*');
		
		if(!empty($res)){
			$this->DBfile->set_data( 'usertbl', array('u_password'=>md5($_POST['pwd'])) , array('u_id'=>$res[0]['u_id']) );
			echo '2';
		}
		else{
			$dArray = array(
                'u_name'    =>  $_POST['nm'],
                'u_email'    =>  $_POST['em'],
                'u_password'    =>  md5($_POST['pwd']),
                'u_status'    =>  1,
                'u_type'    =>  2,
                'is_fe'    =>  1,
                'is_oto1'    =>  0
            );
			$this->DBfile->put_data( 'usertbl', $dArray);
			echo '5';
		}
		die();
	}
	

	public function forgotSection(){
		$jsonPost = $this->checkValidAJAX();
		$postData = json_decode($jsonPost,TRUE);
		$res = $this->DBfile->get_data( 'usertbl', array('u_email'=>$_POST['em']),'u_id,u_name,u_password,u_status');
		
		if(!empty($res)){
			if($res[0]['u_status'] == 2 ){
				echo '2';die(); // InActive User
			}
			if($res[0]['u_status'] == 3 ){
				echo '3';die(); // Blocked User
			}
			$pwd = substr(md5($res[0]['u_password']),0,8);
			$this->DBfile->set_data( 'usertbl', array('u_password'=>md5($pwd)) , array('u_id'=>$res[0]['u_id']) );
			
			$body = '<p>Hello '.$res[0]['u_name'].'</p>';
			$body .= '<p>Here is the new password for your '.SITENAME.' account.</p>';
			$body .= '<p>Password is : '.$pwd.'</p><br/>';
			$body .= '<p>To your success.<br/>Team, '.SITENAME.'</p>';
			sendUserEmailMandrill($_POST['em'],'New Password ['.SITENAME.']',$body);
			echo '5';
		}
		else
			echo '0';
		die();
	}	
}
?>