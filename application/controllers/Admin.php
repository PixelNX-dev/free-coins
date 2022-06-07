<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
		
	public function index(){
		if(isset($this->session->userdata['loginstatus']) && $this->session->userdata['type'] == 1 )
			redirect(base_url('admin/dashboard'));
		$this->load->view('admin/login');
	}

	private function checkAdminLogin(){
		if(!isset($this->session->userdata['loginstatus']) || $this->session->userdata['type'] != 1 )
			redirect(base_url());
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
			//$temp = $this->db->escape($temp);
			$postData[$key] = $temp;
		}
		return json_encode($postData);
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('admin'));
	}
	
	function dashboard(){
		$this->checkAdminLogin();
		$data['pagename'] = 'Dashboard';
		$data['nicheCount'] = count($this->DBfile->get_data('nichetbl','','n_id'));
		$data['prodCount'] = count($this->DBfile->get_data('productstbl','','p_id'));
		$data['bannerCount'] = count($this->DBfile->get_data('largebannerstbl','','l_id'));
		$data['smallbannerCount'] = count($this->DBfile->get_data('smallbannerstbl','','s_id'));
		$data['videoCount'] = count($this->DBfile->get_data('videostbl','','v_id'));
		$data['bonusCount'] = count($this->DBfile->get_data('bonustbl','','b_id'));

		$data['com_nicheCount'] = count($this->DBfile->get_data('com_nichetbl','','n_id'));
		$data['quesCount'] = count($this->DBfile->get_data('questiontbl','','q_id'));
		$data['answerCount'] = count($this->DBfile->get_data('answertbl','','a_id'));
		$data['imageCount'] = count($this->DBfile->get_data('imagetbl','','i_id'));
		$data['articleCount'] = count($this->DBfile->get_data('articletbl','','art_id'));

		$data['userCount'] = count($this->DBfile->get_data('usertbl',array('u_type'=>2),'u_id'));
		$this->load->view('admin/header',$data);
		$this->load->view('admin/dashboard',$data);
		$this->load->view('admin/footer',$data);
	}

	function categories($list=''){
		$this->checkAdminLogin();
		if($list != ''){
			$list = $this->DBfile->get_data('nichetbl');
			$i=0;
			$data = array();
			if(!empty($list)){
				foreach($list as $sList){
					$i++;
					$t = array();
					array_push($t,$i);
					array_push($t,'<span id="niche_'.$sList['n_id'].'">'.$sList['n_title'].'</span>');
					array_push($t,'<span id="desc_'.$sList['n_id'].'">'.$sList['n_desc'].'</span>');
					array_push($t,'<a style="cursor:pointer;" onclick="editData('.$sList['n_id'].',\'niche\')">'.EDIT_ICON.'</a>');
					array_push($t,'<a style="cursor:pointer;" onclick="deleteData('.$sList['n_id'].',\'niche\')">'.DELETE_ICON.'</a>');
					array_push($data,$t);
				}
			}
			echo json_encode(array('data'=>$data));
			die();
		}
		$data['pagename'] = 'Categories';
		$this->load->view('admin/header',$data);
		$this->load->view('admin/categories',$data);
		$this->load->view('admin/footer',$data);
	}

	function addnew($pagetype='categories',$dbid=0){
		$this->checkAdminLogin();
		$data['pagename'] = 'Add New '.ucfirst($pagetype);
		$data['pagetype'] = $pagetype;
		$data['nicheList'] = $this->DBfile->get_data('nichetbl');

		if( $pagetype == 'users' ){
			$data['userData'] = array();
			if( $dbid != 0 ){
				$u = $this->DBfile->get_data('usertbl',array('u_id'=>$dbid));
				if(!empty($u)){
					$data['userData'] = $u;
					$data['pagename'] = 'Edit User';
				}
			}
		}
		elseif( $pagetype == 'articles' ){
			$data['articleData'] = array();
			if( $dbid != 0 ){
				$u = $this->DBfile->get_data('articletbl',array('art_id'=>$dbid),'art_id,art_title,art_nicheid,art_body');
				if(!empty($u)){
					$data['articleData'] = $u;
					$data['pagename'] = 'Edit Article';
				}
			}
		}
		elseif( $pagetype == 'niche' ){
			$data['pagename'] = 'Add New Product '.ucfirst($pagetype);
		}
		elseif( $pagetype == 'image' ){
			$data['nicheList'] = $this->DBfile->get_data('com_nichetbl');
		}
		elseif( $dbid != 0 ){
			$tblName = $pagetype.'tbl';
			$initials = substr($pagetype,0,1);
			$dbidCol = $initials.'_id';
			$res = $this->DBfile->get_data($tblName,array($dbidCol=>$dbid));
			if(empty($res))
				redirect(base_url('dashboard'));

			$data['resultSet'] = $res[0];
		}

		$viewPage = 'addnew_'.$pagetype;
		
		$this->load->view('admin/header',$data);
		$this->load->view('admin/'.$viewPage,$data);
		$this->load->view('admin/footer',$data);
	}

	function submitNiche(){
		$jsonPost = $this->checkValidAJAX();
		$postData = json_decode($jsonPost,TRUE);
		if(isset($postData['delete'])){
			$this->DBfile->delete_data( 'nichetbl', array('n_id'=>$postData['deleteid']));
			$this->DBfile->delete_data( 'productstbl', array('p_nicheid'=>$postData['deleteid']));
			$this->DBfile->delete_data( 'smallbannerstbl', array('s_nicheid'=>$postData['deleteid']));
			$this->DBfile->delete_data( 'largebannerstbl', array('l_nicheid'=>$postData['deleteid']));
			$this->DBfile->delete_data( 'videostbl', array('v_nicheid'=>$postData['deleteid']));
		}
		elseif(isset($postData['id'])){
			$nicheSlug = slugify($postData['title']);
			$this->DBfile->set_data( 'nichetbl', array('n_title'=>$postData['title'],'n_desc'=>$postData['desc'],'n_slug'=>$nicheSlug) , array('n_id'=>$postData['id']));
		}
		else{
			$nicheArr = $postData['title'];
			$descArr = $postData['desc'];
			for( $i = 0 ; $i < count($nicheArr) ; $i++ ){
				$nicheSlug = slugify($nicheArr[$i]);
				$this->DBfile->put_data( 'nichetbl', array('n_title'=>$nicheArr[$i],'n_desc'=>$descArr[$i],'n_slug'=>$nicheSlug));
			}
		}
		echo '1';
		die();
	}

	
	function users($list=''){
		$this->checkAdminLogin();
		if($list == 'postreq'){
			$jsonPost = $this->checkValidAJAX();
			$postData = json_decode($jsonPost,TRUE);
			$this->DBfile->put_data( 'usertbl', $postData);
			echo '1';
			die();
		}
		if($list != ''){
			$list = $this->DBfile->get_data('usertbl',array('u_type'=>2));
			$i=0;
			$data = array();
			if(!empty($list)){
				foreach($list as $sList){
					$i++;
					$t = array();
					array_push($t,$i);
					array_push($t,$sList['u_name']);
					array_push($t,$sList['u_email']);
					array_push($t,$sList['u_purchaseddate']);
					array_push($t,$sList['is_fe'] == 1 ? 'FE' : '-' );
					array_push($t,$sList['is_oto1'] == 1 ? 'OTO1' : '-' );
					array_push($t,'<a href="'.base_url().'admin/addnew/users/'.$sList['u_id'].'">'.EDIT_ICON.'</a>');
					array_push($t,'<a style="cursor:pointer;" onclick="deleteData('.$sList['u_id'].',\'users\')">'.DELETE_ICON.'</a>');
					array_push($data,$t);
				}
			}
			echo json_encode(array('data'=>$data));
			die();
		}
		$data['pagename'] = 'Users';
		$this->load->view('admin/header',$data);
		$this->load->view('admin/users',$data);
		$this->load->view('admin/footer',$data);
	}

	
	function articles($list=''){
		$this->checkAdminLogin();
		if($list == 'postreq'){
			$jsonPost = $this->checkValidAJAX();
			$postData = json_decode($jsonPost,TRUE);
			if(isset($postData['delete']))
				$this->DBfile->delete_data( 'articletbl', array('art_id'=>$postData['deleteid']) );
			else{
				$artId = $postData['art_id'];
				unset($postData['art_id']);
				if( $artId == 0 )
					$this->DBfile->put_data( 'articletbl', $postData);
				else
					$this->DBfile->set_data( 'articletbl', $postData, array('art_id'=>$artId) );
			}
			echo '1';
			die();
		}
		if($list != ''){
			$list = $this->DBfile->get_join_data('articletbl','nichetbl','articletbl.art_nicheid = nichetbl.n_id','','art_id,art_title,n_title');
			$i=0;
			$data = array();
			if(!empty($list)){
				foreach($list as $sList){
					$i++;
					$t = array();
					array_push($t,$i);
					array_push($t,$sList['art_title']);
					array_push($t,$sList['n_title']);
					array_push($t,'<a href="'.base_url().'admin/addnew/articles/'.$sList['art_id'].'">'.EDIT_ICON.'</a>');
					array_push($t,'<a style="cursor:pointer;" onclick="deleteData('.$sList['art_id'].',\'articles\')">'.DELETE_ICON.'</a>');
					array_push($data,$t);
				}
			}
			echo json_encode(array('data'=>$data));
			die();
		}
		$data['pagename'] = 'Articles';
		$data['nicheList'] = $this->DBfile->get_data('nichetbl');
		$this->load->view('admin/header',$data);
		$this->load->view('admin/articles',$data);
		$this->load->view('admin/footer',$data);
	}

	function submitCommonData(){
		$jsonPost = $this->checkValidAJAX();
		$postData = json_decode($jsonPost,TRUE);
		$type = $postData['pageType'];
		if(isset($postData['delete'])){
			$initials = substr($type,0,1);
			$dbidCol = $initials.'_id';
			if($type=='bonus'){
				$res = $this->DBfile->get_data($type.'tbl',array($dbidCol=>$postData['deleteid']));
				if(!empty($res)){
					$upPath = (explode('/application/',__DIR__)[0]).'/assets/upload/';
					unlink($upPath.$res[0]['b_image']);
				}
			}
			$this->DBfile->delete_data( $type.'tbl', array($dbidCol=>$postData['deleteid']) );
		}
		elseif($postData['uniqeid'] != 0){
			if($type == 'bonus'){
				$upPath = (explode('/application/',__DIR__)[0]).'/assets/upload/';
				$config['upload_path'] = $upPath;
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = '1000'; // in KB which is 1 MB
				
				if(!empty($_FILES['userfiles']['name'])){
					$_FILES['userfile']['name'] = $_FILES['userfiles']['name'];
					$_FILES['userfile']['type'] = $_FILES['userfiles']['type'];
					$_FILES['userfile']['tmp_name'] = $_FILES['userfiles']['tmp_name'];
					$_FILES['userfile']['error'] = $_FILES['userfiles']['error'];
					$_FILES['userfile']['size'] = $_FILES['userfiles']['size'];
					
					$config['file_name'] = $_FILES['userfiles']['name'];
					$this->load->library('upload',$config);
					
					if($this->upload->do_upload('userfile')){
						$uploadData = $this->upload->data();
						$filename = $uploadData['file_name'];
						$clientname = $uploadData['client_name'];
						rename( $upPath.$filename , $upPath.$clientname );
						$postData['b_image'] = $clientname;
						$b_id = $postData['uniqeid'];
						unset($postData['uniqeid']);
						unset($postData['pageType']);
						$this->DBfile->set_data( $type.'tbl',$postData, array('b_id'=>$b_id) );
					}
					else{
						echo "Failed to upload <b>" . $config['file_name'] . "</b>. The reason is : " . $this->upload->display_errors();
						die();
					}
				}
				else{
					// for Bonus table
					$b_id = $postData['uniqeid'];
					unset($postData['uniqeid']);
					unset($postData['pageType']);
					$this->DBfile->set_data( $type.'tbl',$postData, array('b_id'=>$b_id) );
				}
			}
			else{
				$initials = substr($type,0,1);
				$dbidCol = $initials.'_id';
				$this->DBfile->set_data( $type.'tbl',$postData['tempArr'], array($dbidCol=>$postData['uniqeid']) );
			}
		}
		elseif($postData['uniqeid'] == 0){
			if($type == 'bonus'){
				$upPath = (explode('/application/',__DIR__)[0]).'/assets/upload/';
				$config['upload_path'] = $upPath;
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = '1000'; // in KB which is 1 MB
				
				if(!empty($_FILES['userfiles']['name'])){
					$_FILES['userfile']['name'] = $_FILES['userfiles']['name'];
					$_FILES['userfile']['type'] = $_FILES['userfiles']['type'];
					$_FILES['userfile']['tmp_name'] = $_FILES['userfiles']['tmp_name'];
					$_FILES['userfile']['error'] = $_FILES['userfiles']['error'];
					$_FILES['userfile']['size'] = $_FILES['userfiles']['size'];
					
					$config['file_name'] = $_FILES['userfiles']['name'];
					$this->load->library('upload',$config);
					
					if($this->upload->do_upload('userfile')){
						$uploadData = $this->upload->data();
						$filename = $uploadData['file_name'];
						$clientname = $uploadData['client_name'];
						rename( $upPath.$filename , $upPath.$clientname );
						$postData['b_image'] = $clientname;
						unset($postData['uniqeid']);
						unset($postData['pageType']);
						$this->DBfile->put_data( $type.'tbl', $postData);
					}
					else{
						echo "Failed to upload <b>" . $config['file_name'] . "</b>. The reason is : " . $this->upload->display_errors();
						die();
					}
				}
			}
			else
				$this->DBfile->put_data( $type.'tbl', $postData['tempArr']);
		}
		
		echo '1';
		die();
	}

	function profile(){
		if(isset($_POST['u_name'])){
			$jsonPost = $this->checkValidAJAX();
			$postData = json_decode($jsonPost,TRUE);
			if( $postData['pwd'] != '' ) {
				$pwd = $postData['pwd'];
				unset($postData['pwd']);
				$postData['u_password'] = md5($pwd);
			}
			else
				unset($postData['pwd']);

			$this->DBfile->set_data( 'usertbl', $postData , array('u_id'=>$this->session->userdata['id']) );

			$this->session->userdata['firstname'] = explode($postData['u_name'],' ')[0];
			echo '1';
			die();
		}
		$this->checkAdminLogin();
		$data['pagename'] = 'Profile';
		$data['userList'] = $this->DBfile->get_data('usertbl',array('u_id'=>$this->session->userdata['id']));
		$this->load->view('admin/header',$data);
		$this->load->view('admin/profile',$data);
		$this->load->view('admin/footer',$data);
	}


	function submitUserRecords(){
		$jsonPost = $this->checkValidAJAX();
		$postData = json_decode($jsonPost,TRUE);
		if(isset($postData['delete'])){
			$this->DBfile->delete_data( 'usertbl', array('u_id'=>$postData['deleteid']));
			$this->DBfile->delete_data( 'shared', array('share_uid'=>$postData['deleteid']));
			echo '1';
			die();
		}
		if(isset($postData['u_id'])){
			
			$uid = $postData['u_id'];
			unset($postData['u_id']);
			if(isset($postData['u_password']))
				$postData['u_password'] = md5($postData['u_password']);
			
			if( $uid == 0 ){
				$postData['u_type'] = 2;
				$postData['u_status'] = 1;
				$postData['u_purchaseddate'] = date('d-m-Y h:i:s');
				$this->DBfile->put_data( 'usertbl', $postData );
			}
			else
				$this->DBfile->set_data( 'usertbl', $postData , array('u_id'=>$uid) );
			
			echo '1';
			die();
		}
	}

	/************************************** Commission Cloner Section *******************************/

	function questions($list=''){
		$this->checkAdminLogin();
		if($list != ''){
			$list = $this->DBfile->get_join_data('questiontbl','com_nichetbl','questiontbl.q_nicheid = com_nichetbl.n_id');
			$i=0;
			$data = array();
			if(!empty($list)){
				foreach($list as $sList){
					$i++;
					$t = array();
					array_push($t,$i);
					array_push($t,$sList['n_title']);
					array_push($t,'<span id="ques_'.$sList['q_id'].'">'.$sList['q_title'].'</span>');
					array_push($t,'<a style="cursor:pointer;" onclick="editData('.$sList['q_id'].',\'questions\')">'.EDIT_ICON.'</a>');
					array_push($t,'<a style="cursor:pointer;" onclick="deleteData('.$sList['q_id'].',\'questions\')">'.DELETE_ICON.'</a>');
					array_push($data,$t);
				}
			}
			echo json_encode(array('data'=>$data));
			die();
		}
		$data['pagename'] = 'Questions';
		$data['nicheList'] = $this->DBfile->get_data('com_nichetbl');
		$this->load->view('admin/header',$data);
		$this->load->view('admin/questions',$data);
		$this->load->view('admin/footer',$data);
	}

	function answers($list=''){
		$this->checkAdminLogin();
		if($list != ''){
			$list = $this->DBfile->get_join_data('answertbl','com_nichetbl','answertbl.a_nicheid = com_nichetbl.n_id');
			$i=0;
			$data = array();
			if(!empty($list)){
				foreach($list as $sList){
					$i++;
					$t = array();
					array_push($t,$i);
					array_push($t,$sList['n_title']);
					array_push($t,'<span id="ans_'.$sList['a_id'].'">'.$sList['a_title'].'</span>');
					array_push($t,'<a style="cursor:pointer;" onclick="editData('.$sList['a_id'].',\'answers\')">'.EDIT_ICON.'</a>');
					array_push($t,'<a style="cursor:pointer;" onclick="deleteData('.$sList['a_id'].',\'answers\')">'.DELETE_ICON.'</a>');
					array_push($data,$t);
				}
			}
			echo json_encode(array('data'=>$data));
			die();
		}
		$data['pagename'] = 'Answers';
		$data['nicheList'] = $this->DBfile->get_data('com_nichetbl');
		$this->load->view('admin/header',$data);
		$this->load->view('admin/answers',$data);
		$this->load->view('admin/footer',$data);
	}

	function com_submitCommonData(){
		$jsonPost = $this->checkValidAJAX();
		$postData = json_decode($jsonPost,TRUE);
		$col = $postData['pageType'] == 'question' ? 'q' : 'a';
		if(isset($postData['edittitle'])){
			$this->DBfile->set_data( $postData['pageType'].'tbl', array($col.'_title'=>$postData['edittitle']) , array($col.'_id'=>$postData['id']) );
		}
		elseif(isset($postData['delete'])){
			$this->DBfile->delete_data( $postData['pageType'].'tbl', array($col.'_id'=>$postData['deleteid']) );
		}
		else{
			$dataArr = $postData['title'];
			for( $i = 0 ; $i < count($dataArr) ; $i++ ){
				$this->DBfile->put_data( $postData['pageType'].'tbl', array($col.'_title'=>$dataArr[$i] , $col.'_nicheid'=>$postData['nicheid'] ));
			}
		}
		
		echo '1';
		die();
	}

	function uploadImages(){
		if(isset($_POST['nicheid'])){
			$upPath = (explode('/application/',__DIR__)[0]).'/assets/upload/';
			$config['upload_path'] = $upPath;
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = '1000'; // in KB which is 1 MB
			$responseArr = array();
			for($i=0;$i<count($_FILES['userfiles']['name']);$i++){
				if(!empty($_FILES['userfiles']['name'][$i])){
					$_FILES['userfile']['name'] = $_FILES['userfiles']['name'][$i];
					$_FILES['userfile']['type'] = $_FILES['userfiles']['type'][$i];
					$_FILES['userfile']['tmp_name'] = $_FILES['userfiles']['tmp_name'][$i];
					$_FILES['userfile']['error'] = $_FILES['userfiles']['error'][$i];
					$_FILES['userfile']['size'] = $_FILES['userfiles']['size'][$i];
					
					$config['file_name'] = $_FILES['userfiles']['name'][$i];
					$this->load->library('upload',$config);
					
					if($this->upload->do_upload('userfile')){
						$uploadData = $this->upload->data();
						$filename = $uploadData['file_name'];
						$clientname = $uploadData['client_name'];
						rename( $upPath.$filename , $upPath.$clientname );
						$this->DBfile->put_data( 'imagetbl', array('i_src'=>$clientname , 'i_nicheid'=>$_POST['nicheid'] ));
					}
					else{
						array_push($responseArr, "Failed to upload <b>" . $config['file_name'] . "</b>. The reason is : " . $this->upload->display_errors());
					}
				}
			}
			if(empty($responseArr))
				echo 1;
			else
				echo json_encode($responseArr);
		
			die();
		}
	}

	function socialsites($list=''){
		if($list == 'postreq'){
			$jsonPost = $this->checkValidAJAX();
			$postData = json_decode($jsonPost,TRUE);
			$this->DBfile->set_data( 'socialtbl', array($postData['col'] => $postData['sts']) , array('s_id'=>$postData['id']) );
			echo '1';
			die();
		}
		if($list != ''){
			$list = $this->DBfile->get_data('socialtbl');
			$i=0;
			$data = array();
			if(!empty($list)){
				foreach($list as $sList){
					$i++;
					$t = array();
					array_push($t,$i);
					array_push($t,ucfirst($sList['s_name']));
					$checked = $sList['visible'] == 1 ? 'checked' : '' ;
					array_push($t,'<input type="checkbox" onclick="updateSocialSites('.$sList['s_id'].',this)" class="visible" value="1" '.$checked.'>');
					$checked = $sList['100_million_users'] == 1 ? 'checked' : '' ;
					array_push($t,'<input type="checkbox" onclick="updateSocialSites('.$sList['s_id'].',this)" class="100_million_users" value="1" '.$checked.'>');
					$checked = $sList['list_building'] == 1 ? 'checked' : '' ;
					array_push($t,'<input type="checkbox" onclick="updateSocialSites('.$sList['s_id'].',this)" class="list_building" value="1" '.$checked.'>');
					$checked = $sList['ecommerce_buyers'] == 1 ? 'checked' : '' ;
					array_push($t,'<input type="checkbox" onclick="updateSocialSites('.$sList['s_id'].',this)" class="ecommerce_buyers" value="1" '.$checked.'>');
					$checked = $sList['digital_product_buyers'] == 1 ? 'checked' : '' ;
					array_push($t,'<input type="checkbox" onclick="updateSocialSites('.$sList['s_id'].',this)" class="digital_product_buyers" value="1" '.$checked.'>');
					$checked = $sList['bookmarking'] == 1 ? 'checked' : '' ;
					array_push($t,'<input type="checkbox" onclick="updateSocialSites('.$sList['s_id'].',this)" class="bookmarking" value="1" '.$checked.'>');
					$checked = $sList['affiliate_buyers'] == 1 ? 'checked' : '' ;
					array_push($t,'<input type="checkbox" onclick="updateSocialSites('.$sList['s_id'].',this)" class="affiliate_buyers" value="1" '.$checked.'>');
					array_push($data,$t);
				}
			}
			echo json_encode(array('data'=>$data));
			die();
		}
		$data['pagename'] = 'Social Sites';
		$colName = $this->db->list_fields('socialtbl');
		unset($colName[0]);
		unset($colName[1]);
		unset($colName[2]);
		$colName = array_values($colName);
		$data['colName'] = $colName;
		$this->load->view('admin/header',$data);
		$this->load->view('admin/socialsites',$data);
		$this->load->view('admin/footer',$data);
	}

	function images($list=''){
		$this->checkAdminLogin();
		if($list == 'postreq'){
			$jsonPost = $this->checkValidAJAX();
			$postData = json_decode($jsonPost,TRUE);
			if(isset($postData['delete'])){
				
				$src = explode('upload/',$postData['imagepath'])[1];
				$upPath = (explode('/application/',__DIR__)[0]).'/assets/upload/';
				unlink($upPath.$src);

				$this->DBfile->delete_data( 'imagetbl', array('i_id'=>$postData['deleteid']));
			}
			echo '1';
			die();
		}

		if($list != ''){
			$list = $this->DBfile->get_join_data('imagetbl','com_nichetbl','imagetbl.i_nicheid = com_nichetbl.n_id');
			$i=0;
			$data = array();
			if(!empty($list)){
				foreach($list as $sList){
					$i++;
					$t = array();
					array_push($t,$i);
					array_push($t,$sList['n_title']);
					array_push($t,'<img id="imgpath_'.$sList['i_id'].'" src="'.base_url().'assets/upload/'.$sList['i_src'].'" style="width: 100px;"/>');
					array_push($t,'<a style="cursor:pointer;" onclick="deleteData('.$sList['i_id'].',\'images\')">'.DELETE_ICON.'</a>');
					array_push($data,$t);
				}
			}
			echo json_encode(array('data'=>$data));
			die();
		}
		$data['pagename'] = 'Images';
		$data['nicheList'] = $this->DBfile->get_data('com_nichetbl');
		$this->load->view('admin/header',$data);
		$this->load->view('admin/images',$data);
		$this->load->view('admin/footer',$data);
	}


	function com_niche($list=''){
		$this->checkAdminLogin();
		if($list != ''){
			$list = $this->DBfile->get_data('com_nichetbl');
			$i=0;
			$data = array();
			if(!empty($list)){
				foreach($list as $sList){
					$i++;
					$t = array();
					array_push($t,$i);
					array_push($t,'<span id="niche_'.$sList['n_id'].'">'.$sList['n_title'].'</span>');
					array_push($t,'<a style="cursor:pointer;" onclick="editData('.$sList['n_id'].',\'nichecom\')">'.EDIT_ICON.'</a>');
					array_push($t,'<a style="cursor:pointer;" onclick="deleteData('.$sList['n_id'].',\'nichecom\')">'.DELETE_ICON.'</a>');
					array_push($data,$t);
				}
			}
			echo json_encode(array('data'=>$data));
			die();
		}
		$data['pagename'] = 'Sharing Niche';
		$this->load->view('admin/header',$data);
		$this->load->view('admin/com_niche',$data);
		$this->load->view('admin/footer',$data);
	}

	function addnew_com($pagetype='niche',$userid=0){
		$this->checkAdminLogin();
		$data['pagename'] = 'Add New '.ucfirst($pagetype);
		$data['pagetype'] = $pagetype;
		$data['nicheList'] = $this->DBfile->get_data('com_nichetbl');

		if( $pagetype == 'niche' ){
			$data['pagename'] = 'Add New Sharing '.ucfirst($pagetype);
			$viewPage = 'addnew_niche_com';
		}
		elseif( $pagetype == 'image' )
			$viewPage = 'addnew_image';
		else
			$viewPage = 'addnew';
		
		$this->load->view('admin/header',$data);
		$this->load->view('admin/'.$viewPage,$data);
		$this->load->view('admin/footer',$data);
	}

	function submitNicheCom(){
		$jsonPost = $this->checkValidAJAX();
		$postData = json_decode($jsonPost,TRUE);
		if(isset($postData['delete'])){
			$this->DBfile->delete_data( 'com_nichetbl', array('n_id'=>$postData['deleteid']));
			$this->DBfile->delete_data( 'questiontbl', array('q_nicheid'=>$postData['deleteid']));
			$this->DBfile->delete_data( 'answertbl', array('a_nicheid'=>$postData['deleteid']));
			$this->DBfile->delete_data( 'imagetbl', array('i_nicheid'=>$postData['deleteid']));
		}
		elseif(isset($postData['id'])){
			$this->DBfile->set_data( 'com_nichetbl', array('n_title'=>$postData['title']) , array('n_id'=>$postData['id']));
		}
		else{
			$nicheArr = $postData['title'];
			for( $i = 0 ; $i < count($nicheArr) ; $i++ ){
				$this->DBfile->put_data( 'com_nichetbl', array('n_title'=>$nicheArr[$i]));
			}
		}
		echo '1';
		die();
	}
}
?>