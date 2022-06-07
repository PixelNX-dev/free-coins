<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
		
	public function index(){
		$this->checkLoginUser();
		$this->load->view('frontend/login');
	}	

	public function forgotpassword(){
		$this->load->view('frontend/forgotpassword');
	}	

    public function this_is_for_signup(){
		$this->load->view('frontend/signup');
	}
	public function checkquota(){
		
		echo '<pre>';
		$api_response = $this->spinrewriterapi->getQuota();
		print_r($api_response);
	}
	

	function checkLoginUser(){
		if(isset($this->session->userdata['loginstatus']) && $this->session->userdata['type'] == 1 )
			redirect(base_url('admin/dashboard'));
		if(isset($this->session->userdata['loginstatus']) && $this->session->userdata['type'] == 2 )
			redirect(base_url('home/mysites'));
	}

	private function checkUserLoginStatus(){
		if(!isset($this->session->userdata['loginstatus']) || $this->session->userdata['type'] != 2 )
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
			if( $key != 'w_seoextscript' ){
				$temp = $this->input->post($key,TRUE);
				//$temp = $this->db->escape($temp);
				$postData[$key] = $temp;
			}
			else
				$postData[$key] = $value;
		}
		return json_encode($postData);
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
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
			$this->session->userdata['initials'] = substr($postData['u_name'],0,2);
			
			echo '1';
			die();
		}
		$this->checkUserLoginStatus();
		
		$data['pagename'] = 'Profile';
		$data['ispage'] = 'create';
		$data['userList'] = $this->DBfile->get_data('usertbl',array('u_id'=>$this->session->userdata['id']));
		$this->load->view('backend/header',$data);
		$this->load->view('backend/profile',$data);
		$this->load->view('backend/footer',$data);
	}

	function mysites(){
		$this->checkUserLoginStatus();
		$data['siteList'] = $this->DBfile->get_data('websitetbl',array('w_uid'=>$this->session->userdata['id']),'w_sitename,w_id');
		if(!empty($data['siteList']))
			$page = 'mysites';
		else
			$page = 'firstwebsite';

		$data['is_page'] = 'mysites';

		$colName = $this->db->list_fields('socialtbl');
		unset($colName[0]);
		unset($colName[1]);
		unset($colName[2]);
		unset($colName[3]);
		$colName = array_values($colName);
		$data['colName'] = $colName;
		$data['social'] = $this->DBfile->get_data('socialtbl',array('visible'=>1));

		$this->load->view('backend/header',$data);
		$this->load->view('backend/'.$page,$data);
		$this->load->view('backend/footer',$data);
	}

	function create($webId=0){
		$this->checkUserLoginStatus();
		$data['websiteData'] = $this->DBfile->get_data('websitetbl',array('w_id'=>$webId));
		$data['is_page'] = 'create';
		$this->load->view('backend/header',$data);
		$this->load->view('backend/create',$data);
		$this->load->view('backend/footer',$data);
	}

	function checksitename(){
		$jsonPost = $this->checkValidAJAX();
		$postData = json_decode($jsonPost,TRUE);
		$dArray = array('w_sitename'=>$postData['sitename']);
		$siteCheck = $this->DBfile->get_data('websitetbl',$dArray);
		if(empty($siteCheck))
		{
			$dArray['w_uid'] = $this->session->userdata['id'];
			$webId = $this->DBfile->put_data( 'websitetbl', $dArray);
			echo $webId;
		}
		else
			echo $siteCheck[0]['w_id'] == $postData['webid'] ? $postData['webid'] : 0 ;
		die();
	}

	function website_setup($webId=0){
		$this->checkUserLoginStatus();
		$data['websiteData'] = $this->DBfile->get_data('websitetbl',array('w_id'=>$webId));
		$data['is_page'] = 'create';
		$this->load->view('backend/header',$data);
		$this->load->view('backend/setup',$data);
		$this->load->view('backend/footer',$data);
	}

	function submitSetupWebsite(){
		$jsonPost = $this->checkValidAJAX();
		$postData = json_decode($jsonPost,TRUE);
		
		$upPath = (explode('/application/',__DIR__)[0]).'/assets/webupload/';
		$config['upload_path'] = $upPath;
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = '1000'; // in KB which is 1 MB
		
		if(!empty($_FILES['w_logourl']['name'])){			
			$config['file_name'] = $_FILES['w_logourl']['name'];
			$this->load->library('upload',$config);
			
			if($this->upload->do_upload('w_logourl')){
				$uploadData = $this->upload->data();
				$filename = $uploadData['file_name'];
				$ext = getImageExtension($_FILES['w_logourl']['name']);
				$clientname = generateString().''.$ext;
				rename( $upPath.$filename , $upPath.$clientname );
				$postData['w_logourl'] = $clientname;
			}
			else{
				echo "Failed to upload <b>" . $config['file_name'] . "</b>. The reason is : " . $this->upload->display_errors();
				die();
			}
		}

		if(!empty($_FILES['w_faviconurl']['name'])){
			$config['allowed_types'] = 'jpg|jpeg|png';		
			$config['file_name'] = $_FILES['w_faviconurl']['name'];
			$this->load->library('upload',$config);
			if($this->upload->do_upload('w_faviconurl')){
				$uploadData = $this->upload->data();
				$filename = $uploadData['file_name'];
				$ext = getImageExtension($_FILES['w_faviconurl']['name']);
				$clientname = generateString().''.$ext;
				rename( $upPath.$filename , $upPath.$clientname );
				$postData['w_faviconurl'] = $clientname;
			}
			else{
				echo "Failed to upload <b>" . $config['file_name'] . "</b>. The reason is : " . $this->upload->display_errors();
				die();
			}
		}

		$w_id = $postData['w_id'];
		unset($postData['w_id']);

		$this->DBfile->set_data( 'websitetbl', $postData, array('w_id'=>$w_id));
		echo '1';
		die();
	}


	function choose_categories($webId=0){

		$resNiche = $this->DBfile->get_data('frontwebtbl',array('f_webid'=>$webId));
		$webNiche = array();
		if( !empty($resNiche) ){
			foreach($resNiche as $soloWebNiche)
				array_push($webNiche,$soloWebNiche['f_nicheid']);
		}
		$data['webNiche'] = $webNiche;

		if( isset($_POST['niches']) ){
			$dArray = array(
				'f_uid'	=>	$this->session->userdata['id'],
				'f_webid'	=>	$webId
			);
			for($i=0;$i<count($_POST['niches']);$i++){
				if( in_array($_POST['niches'][$i], $webNiche) ){
					$key = array_search($_POST['niches'][$i], $webNiche);
					unset($webNiche[$key]);
				}
				else{
					$dArray['f_nicheid'] = $_POST['niches'][$i];
					$this->DBfile->put_data( 'frontwebtbl', $dArray);
				}
			}
			if( count($webNiche) > 0 ){
				$getNiche = $this->DBfile->get_inornot_data('frontwebtbl','','f_nicheid,f_lbimage,f_smimage','f_nicheid',$webNiche,'yes');
				foreach($getNiche as $soloNiche){
					if( $soloNiche['f_lbimage'] != "" ){
						$upPath = (explode('/application/',__DIR__)[0]).'/assets/upload/';
						$imgName = explode("/upload/",$soloNiche['f_lbimage'])[1];
						unlink($upPath.$imgName);
					}
					if( $soloNiche['f_smimage'] != "" ){
						$upPath = (explode('/application/',__DIR__)[0]).'/assets/upload/';
						$imgName = explode("/upload/",$soloNiche['f_smimage'])[1];
						unlink($upPath.$imgName);
					}
					$this->DBfile->delete_data( 'frontwebtbl', array('f_webid'=>$webId,'f_nicheid'=>$soloNiche['f_nicheid']));
				}
			}
			echo 1;
			die();
		}
		$this->checkUserLoginStatus();
		$data['webid'] = $webId;
		$data['nicheList'] = $this->DBfile->get_data('nichetbl');
		$data['is_page'] = 'create';
		$data['websiteData'] = $this->DBfile->get_data('websitetbl',array('w_id'=>$webId));
		$this->load->view('backend/header',$data);
		$this->load->view('backend/choose_categories',$data);
		$this->load->view('backend/footer',$data);
	}

	function choose_banners($webId=0){
		if( isset($_POST['lBanners']) ){
			$dataArray = array();
			$lBanners = json_decode($_POST['lBanners'],true);
			$sBanners = json_decode($_POST['sBanners'],true);
			
			foreach($lBanners as $key=>$value){
				$keyTemp = explode('_',$key);
				$temp = explode('_|local|_',$value);
				$dataArr = array('w_lbimg'.$keyTemp[1]=>$temp[1],'w_lglink'.$keyTemp[1]=>$temp[0]);
				$whr = array('f_webid'=>$webId,'f_nicheid'=>$keyTemp[0]);
				$this->DBfile->set_data( 'frontwebtbl', $dataArr , $whr);
			}

			foreach($sBanners as $key=>$value){
				$keyTemp = explode('_',$key);
				$temp = explode('_|local|_',$value);
				$dataArr = array('w_smimg'.$keyTemp[1]=>$temp[1],'w_smlink'.$keyTemp[1]=>$temp[0]);
				$whr = array('f_webid'=>$webId,'f_nicheid'=>$keyTemp[0]);
				$this->DBfile->set_data( 'frontwebtbl', $dataArr , $whr);
			}
			
			echo 1;
			die();
		}
		$this->checkUserLoginStatus();
		$data['webid'] = $webId;
		$data['is_page'] = 'create';
		$data['websiteData'] = $this->DBfile->get_data('websitetbl',array('w_id'=>$webId),'*');
		$data['nicheList'] = $this->DBfile->get_join_data('frontwebtbl','nichetbl','frontwebtbl.f_nicheid=nichetbl.n_id',array('f_webid'=>$webId),'n_id,n_title,f_nicheid,f_id');
		
		$this->load->view('backend/header',$data);
		$this->load->view('backend/choose_banners',$data);
		$this->load->view('backend/footer',$data);
	}

	function social_lists($webId=0){
		if( isset($_POST['sidebarFields']) ){
			$dataArray = $_POST['sidebarFields'];
			$this->DBfile->set_data( 'websitetbl', $dataArray , array('w_id'=>$webId));
			echo 1;
			die();
		}
		$this->checkUserLoginStatus();
		$data['webid'] = $webId;
		$data['is_page'] = 'create';
		$data['websiteData'] = $this->DBfile->get_data('websitetbl',array('w_id'=>$webId));		
		$this->load->view('backend/header',$data);
		$this->load->view('backend/social_lists',$data);
		$this->load->view('backend/footer',$data);
	}

	function custom_banners($webId=0){
		if( isset($_POST['overwrite']) ){
			$overwrite = $_POST['overwrite'];
			for($i=0;$i<count($overwrite);$i++){
				$nicheId = $overwrite[$i];

				$dataArray = array(
					'f_affiliatelinkLB'	=>	$_POST['affiliatelinkLB_'.$nicheId],
					'f_affiliatelinkSM'	=>	$_POST['affiliatelinkSM_'.$nicheId]
				);
				$_FILES['userfile'] = $_FILES['lbimage_'.$nicheId];
				if(isset($_FILES['userfile']) && $_FILES['userfile']['name'] != ""){
					$upPath = (explode('/application/',__DIR__)[0]).'/assets/upload/';
					$config['upload_path'] = $upPath;
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['file_name'] = $_FILES['userfile']['name'];
					$responseArr = array();				
					$this->load->library('upload',$config);
					if($this->upload->do_upload('userfile')){
						$uploadData = $this->upload->data();
						$filename = $uploadData['file_name'];
						$clientname = $uploadData['client_name'];
						rename( $upPath.$filename , $upPath.$clientname );
						$dataArray['f_lbimage'] = base_url().'assets/upload/'.$clientname;
					}
					else{
						echo "Failed to upload <b>" . $config['file_name'] . "</b>. The reason is : " . $this->upload->display_errors();
						die();
					}
				}	

				$_FILES['userfile'] = $_FILES['smimage_'.$nicheId];
				if(isset($_FILES['userfile']) && $_FILES['userfile']['name'] != ""){
					$upPath = (explode('/application/',__DIR__)[0]).'/assets/upload/';
					$config['upload_path'] = $upPath;
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['file_name'] = $_FILES['userfile']['name'];
					$responseArr = array();				
					$this->load->library('upload',$config);
					if($this->upload->do_upload('userfile')){
						$uploadData = $this->upload->data();
						$filename = $uploadData['file_name'];
						$clientname = $uploadData['client_name'];
						rename( $upPath.$filename , $upPath.$clientname );
						$dataArray['f_smimage'] = base_url().'assets/upload/'.$clientname;
					}
					else{
						echo "Failed to upload <b>" . $config['file_name'] . "</b>. The reason is : " . $this->upload->display_errors();
						die();
					}
				}

				$this->DBfile->set_data( 'frontwebtbl', $dataArray , array('f_webid'=>$webId,'f_nicheid'=>$nicheId));
			}
			echo 1;
			die();
		}
		$this->checkUserLoginStatus();
		$data['webid'] = $webId;
		$data['is_page'] = 'create';
		$data['websiteData'] = $this->DBfile->get_data('websitetbl',array('w_id'=>$webId));
		$data['nicheList'] = $this->DBfile->get_join_data('frontwebtbl','nichetbl','frontwebtbl.f_nicheid=nichetbl.n_id',array('f_webid'=>$webId),'n_id,n_title,f_nicheid,f_id,f_smimage,f_lbimage,f_affiliatelinkLB,f_affiliatelinkSM');
		$this->load->view('backend/header',$data);
		$this->load->view('backend/custom_banners',$data);
		$this->load->view('backend/footer',$data);
	}

	function getVariationColumnName($counter=1){
		$thirdNo = $counter*3;
		$secNo = $thirdNo - 1;
		$firstNo = $secNo - 1;
		return 'art_version'.$firstNo.',art_version'.$secNo.',art_version'.$thirdNo;
	}


    
    public function generate_copies(){		
		$count = 0;
		$recData = $this->DBfile->get_data( 'temp_tbl' , array('rec'=>1) );
		$d1 = !empty($recData) ? date_create($recData[0]['date']) : date_create(date('d-m-Y H:i:s'));
		$d2 = date_create(date('d-m-Y H:i:s'));
		$diff= date_diff($d1,$d2);
		if ( $diff->format("%d") == 0 ){
			$allArticles = $this->DBfile->get_data('articletbl');
			if(!empty($allArticles)){
				foreach( $allArticles as $soloArticles){
					foreach( $soloArticles as $columns=>$value){
						if( strpos( $columns , 'version' ) > 0 ){
							if( $value == "" ){
								if( $count > 9 ){
									break;
								}
								else{
									$text = $soloArticles['art_body'];
									$api_response = $this->spinrewriterapi->getUniqueVariation($text);
									if( $api_response['status'] == "OK" )
										$this->DBfile->set_data( 'articletbl', array($columns=>$api_response['response']) , array('art_id'=>$soloArticles['art_id']) );							
									else
										$this->DBfile->set_data( 'temp_tbl' , array('date'=>date('d-m-Y H:i:s')) , array('id'=>1) );
									
									$count++;
								}
							}
							else
								$count = 1;
						}
					}
				}
			}
		}
		if( $count == 0 )
			$this->DBfile->put_data( 'temp_tbl' , array('rec'=>1,'date'=>date('d-m-Y H:i:s')) );
	}
	
	function merchUpload(){
		
		$upPath = (explode('/application/',__DIR__)[0]).'/assets/webupload/';
		$config['upload_path'] = $upPath;
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = '1000'; // in KB which is 1 MB
		
		if(!empty($_FILES['merch_image']['name']) && $_POST['merch_url'] != ""){			
			$config['file_name'] = $_FILES['merch_image']['name'];
			$this->load->library('upload',$config);
			
			if($this->upload->do_upload('merch_image')){
				$uploadData = $this->upload->data();
				$filename = $uploadData['file_name'];
				$ext = getImageExtension($_FILES['merch_image']['name']);
				$clientname = generateString().''.$ext;
				rename( $upPath.$filename , $upPath.$clientname );
				$imgUrl = base_url().'assets/webupload/'.$clientname;
				echo $_POST['merch_url'].'|'.$imgUrl;
				die();
			}
			else{
				echo "Failed to upload <b>" . $config['file_name'] . "</b>. The reason is : " . $this->upload->display_errors();
				die();
			}
		}
		else{
			echo 0;
			die();
		}
	}


	function publish_edit($webId=0){
		if( isset($_POST['articleId']) ){
			$checkArticle = $this->DBfile->get_like_data('website_article',array('webart_webid'=>$webId), array('webart_date',date('d-m-Y')) , "webart_webid" );

			if( empty($checkArticle) ){
				$getArticle = $this->DBfile->get_data('articletbl',array('art_id'=>$_POST['articleId']) , "art_title , ".$_POST['col'] );
				$websiteData = $this->DBfile->get_data('websitetbl',array('w_id'=>$webId));

				$artTitle = $getArticle[0]['art_title'];
				$artPreview = $getArticle[0][$_POST['col']];
				$blogSlug = slugify($artTitle);
				$this->DBfile->put_data('website_article',array('webart_webid'=>$webId , 'webart_nicheid'=>$_POST['nicheId'] , 'webart_title'=>$artTitle, 'webart_blog'=>$artPreview, 'webart_slug'=>$blogSlug, 'webart_date'=>date('d-m-Y H:i:s')));
				echo 1;
			}
			else
				echo 2;
			die();
		}
		if( isset($_POST['webart_blog']) ){
			// Update Content
			$blogSlug = slugify($_POST['webart_title']);
			$this->DBfile->set_data('website_article',array('webart_blog'=>$_POST['webart_blog'],'webart_title'=>$_POST['webart_title'],'webart_date'=>date('d-m-Y H:i:s'),'webart_slug'=>$blogSlug),array('webart_id'=>$_POST['webart_id']));
			echo 1;
			die();
		}
		if( isset($_POST['webart_id']) ){
			// Get Content
			$pubArticle = $this->DBfile->get_data('website_article',array('webart_id'=>$_POST['webart_id']), 'webart_blog,webart_title');
			if( !empty($pubArticle) )
				echo json_encode($pubArticle[0]);
			else
				echo 0;
			die();
		}
		$this->checkUserLoginStatus();
		$data['webid'] = $webId;
		$data['is_page'] = 'create';

		$todayDate = date('d-m-Y');
		$websiteData = $this->DBfile->get_data('websitetbl',array('w_id'=>$webId));
		if( $websiteData[0]['w_lastdate'] == "" )
		{
			$lastDate = "1|".$todayDate;
			$cols = $this->getVariationColumnName(1);
			$this->DBfile->set_data('websitetbl',array('w_lastdate'=>$lastDate,'w_variationcolumns'=>$cols),array('w_id'=>$webId));
			$data['cols'] = $cols;
		}
		else{
			$getLastDate = $websiteData[0]['w_lastdate'];
			$lastDateArray = explode("|",$getLastDate);
			if( $lastDateArray[1] == $todayDate ){
				$data['cols'] = $websiteData[0]['w_variationcolumns'];
			}
			else{
				$counter = $lastDateArray[0];
				$newCounter = $counter == 17 ? 1 : $counter+1 ;
				$cols = $this->getVariationColumnName($newCounter);
				$newDate = $newCounter."|".$todayDate;
				$this->DBfile->set_data('websitetbl',array('w_lastdate'=>$newDate,'w_variationcolumns'=>$cols),array('w_id'=>$webId));
				$data['cols'] = $cols;
			}
		}

		$origin = new DateTime(date('d-m-Y H:i:s'));
		$target = new DateTime(date('d-m-Y').' 24:00:00');
		$interval = $origin->diff($target);
		$data['hours'] = $interval->h;


		$data['websiteData'] = $this->DBfile->get_data('websitetbl',array('w_id'=>$webId));
		$data['nicheList'] = $this->DBfile->get_join_data('frontwebtbl','nichetbl','frontwebtbl.f_nicheid=nichetbl.n_id',array('f_webid'=>$webId),'n_id,n_title,f_nicheid,f_id');

		$data['publishedArticles'] = $this->DBfile->get_join_data('website_article','nichetbl','website_article.webart_nicheid=nichetbl.n_id',array('webart_webid'=>$webId),'n_title,webart_blog,webart_title,webart_slug,n_slug,webart_date,webart_id');
		/* echo '<pre>';
		print_r($data);
		die(); */
		$this->load->view('backend/header',$data);
		$this->load->view('backend/publish_edit',$data);
		$this->load->view('backend/footer',$data);
	}
    

	function choose_product($webId=0){
		if( isset($_POST['prods']) ){
			$prod = $_POST['prods'];
			$this->DBfile->delete_data( 'productwebtbl', array('pw_websiteid'=>$webId));
			for($i=0;$i<count($prod);$i++){
				$temp = explode('|',$prod[$i]);$this->DBfile->put_data( 'productwebtbl', array('pw_frontwebid'=>$temp[0],'pw_websiteid'=>$webId,'pw_nicheid'=>$temp[2],'pw_prodid'=>$temp[1],'pw_stars'=>$_POST['stars'][$temp[1]],'pw_afflink'=>$_POST['links'][$temp[1]]));
			}
			echo 1;
			die();
		}
		$this->checkUserLoginStatus();
		$data['webid'] = $webId;
		$data['websiteData'] = $this->DBfile->get_data('websitetbl',array('w_id'=>$webId));
		$data['nicheList'] = $this->DBfile->get_join_data('frontwebtbl','nichetbl','frontwebtbl.f_nicheid=nichetbl.n_id',array('f_webid'=>$webId),'n_title,f_nicheid,f_id');

		$resSet = $this->DBfile->get_data('productwebtbl',array('pw_websiteid'=>$webId));
		$selectedProducts = array();
		if(!empty($resSet)){
			foreach($resSet as $soloRes){
				$selectedProducts[$soloRes['pw_prodid']] = array($soloRes['pw_stars'],$soloRes['pw_afflink']);
			}
		}

		$data['selectedProducts'] = $selectedProducts;
		
		$this->load->view('backend/header',$data);
		$this->load->view('backend/choose_product',$data);
		$this->load->view('backend/footer',$data);
	}

	function top_product($webId=0){
		if( isset($_POST['tpprod']) ){
			foreach($_POST['tpprod'] as $k=>$v){
				$temp = explode('_',$k);
				if($temp[0] == 'star')
					$col = 'f_topstars';
				else
					$col = $temp[0].'_'.$temp[1];
					
				$this->DBfile->set_data( 'frontwebtbl', array($col=>$v) , array('f_nicheid'=>$temp[2],'f_id'=>$temp[3]));
			}
			echo 1;
			die();
		}
		$this->checkUserLoginStatus();
		$data['webid'] = $webId;
		$data['websiteData'] = $this->DBfile->get_data('websitetbl',array('w_id'=>$webId));
		$data['nicheList'] = $this->DBfile->get_join_data('frontwebtbl','nichetbl','frontwebtbl.f_nicheid=nichetbl.n_id',array('f_webid'=>$webId),'n_title,f_nicheid,f_id,n_id,f_topafflink,f_topprod,f_topdesc,f_topytlink,f_topstars');
		$data['is_page'] = 'top';
		
		$this->load->view('backend/header',$data);
		$this->load->view('backend/top_product',$data);
		$this->load->view('backend/footer',$data);
	}

	function getOtherNicheProducts($nicheId){
		$res = $this->DBfile->get_data('frontwebtbl',array('f_nicheid'=>$nicheId),'f_id');
		if(!empty($res)){
			$selProd = $this->DBfile->get_data('productwebtbl',array('pw_frontwebid'=>$res[0]['f_id']),'pw_prodid');
			if(!empty($selProd)){
				$prodArray = array();
				foreach($selProd as $soloProd)
					array_push($prodArray,$soloProd['pw_prodid']);

				$prod = $this->DBfile->get_inornot_data('productstbl',array('p_nicheid'=>$nicheId),'*','p_id',$prodArray,'no',1,array('p_id','random'));
			}
			else{
				$prod = $this->DBfile->get_data_limit('productstbl',array('p_nicheid'=>$nicheId),'*',1,'p_id','random');
			}
			echo json_encode($prod);
		}
		else
			echo 0;
		die();
	}


/************************************** Commission Cloner Section *******************************/

	function shared($list=""){
		$this->checkUserLoginStatus();
		if($list == 'delete'){
			$jsonPost = $this->checkValidAJAX();
			$postData = json_decode($jsonPost,TRUE);
			$this->DBfile->delete_data( 'shared', array('share_id'=>$postData['deleteid'],'share_uid'=>$this->session->userdata['id']));
			echo $this->db->affected_rows();
			die();
		}
		if($list != ''){
			$list = $this->DBfile->get_data('shared',array('share_uid'=>$this->session->userdata['id']));
			$i=0;
			$data = array();
			if(!empty($list)){
				foreach($list as $sList){
					$i++;
					$t = array();
					array_push($t,$i);
					array_push($t,base_url('p/'.$sList['share_id']));
					//array_push($t,'<td><img src="'.base_url().'assets/frontend/images/svg/view.svg">'.$sList['share_count'].'</td>');
					array_push($t,'<span class="traf_share"><img src="'.base_url().'assets/frontend/images/svg/share1.svg" alt="" onclick="openShareOptions('.$sList['share_id'].')"></span><span class="traf_delete"><img src="'.base_url().'assets/frontend/images/svg/delete.svg" alt="" class="deleteSharedLink" data-shareid='.$sList['share_id'].'></span><div class="d-none"><div class="quesDis_'.$sList['share_id'].'">'.$sList['share_ques'].'</div><div class="ansDis_'.$sList['share_id'].'">'.$sList['share_ans'].'</div><img src="'.$sList['share_image'].'" class="imgDis_'.$sList['share_id'].'"></div>');
					array_push($data,$t);
				}
			}
			echo json_encode(array('data'=>$data));
			die();
		}
		$data['niches'] = $this->DBfile->get_data('com_nichetbl');
		$colName = $this->db->list_fields('socialtbl');
		unset($colName[0]);
		unset($colName[1]);
		unset($colName[2]);
		unset($colName[3]);
		$colName = array_values($colName);
		$data['colName'] = $colName;

		$data['is_page'] = 'share';
		$data['social'] = $this->DBfile->get_data('socialtbl',array('visible'=>1));
		$this->load->view('backend/header',$data);
		$this->load->view('backend/shared',$data);
		$this->load->view('backend/footer',$data);
	}


	/* function share($siteId=0){
		$this->checkUserLoginStatus();
		//$data['pagename'] = 'Create';
		$res = $this->DBfile->get_data('websitetbl',array('w_uid'=>$this->session->userdata['id'],'w_id'=>$siteId),'w_sitename');
		if( !empty($res) ){
			$data['niches'] = $this->DBfile->get_data('com_nichetbl');
			$colName = $this->db->list_fields('socialtbl');
			unset($colName[0]);
			unset($colName[1]);
			unset($colName[2]);
			unset($colName[3]);
			$colName = array_values($colName);
			$data['colName'] = $colName;

			$data['is_page'] = 'share';
			
			$data['urltoshare'] = base_url('s/'.$res[0]['w_sitename']);
			$data['social'] = $this->DBfile->get_data('socialtbl',array('visible'=>1));
			$this->load->view('backend/header',$data);
			$this->load->view('backend/share',$data);
			$this->load->view('backend/footer',$data);
		}
		else
			redirect(base_url('home/mysites'));
	} */

	/* function getAffiliatePrograms($nicheid){
		$selfList = $this->DBfile->get_data('user_programs', array('prog_nicheid'=>$nicheid));
		$affList = $this->DBfile->get_data('affprogtbl', array('af_nicheid'=>$nicheid,'af_afftype'=>"cb"));
		$finalList = array_merge($selfList,$affList);
		if(!empty($finalList)){
			$data = array();
			foreach($finalList as $soloAff){
				if(isset($soloAff['prog_url'])){
					$pageUrl = $soloAff['prog_url'];
					$res = $this->DBfile->get_data('affprogtbl', array('af_id'=>$soloAff['prog_affid']));
					$pName = $res[0]['af_name'];
					$pPrice = $res[0]['af_price'];
				}
				else{
					$pageUrl = $soloAff['af_pageurl'];
					$pName = $soloAff['af_name'];
					$pPrice = $soloAff['af_price'];
				}
				$t = array(
					'id'	=>	$pageUrl,
					'text'	=> $pName .' - '. $pPrice
				);
				array_push($data,$t);
			}
			echo json_encode($data);
			die();
		}
	}

	function getContent(){
		$jsonPost = $this->checkValidAJAX();
		$postData = json_decode($jsonPost,TRUE);
		$nicheid = $postData['nicheid'];
		$quesContent = $ansContent = $imageContent = "";
		$q_no = $a_no = $i_no = "";

		$questionList = $this->DBfile->get_data('questiontbl', array('q_nicheid'=>$nicheid));

		if(!empty($questionList)){
			foreach($questionList as $soloQues){
				$q_no++;
				$quesContent .= '<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
				<div class="traf_contentBox" data-type="ques"><p>';
				$quesContent .= $soloQues['q_title'];
				$quesContent .= '</p><span class="traf_contentCheckBtn"><span><img src="'.base_url().'assets/frontend/images/svg/check.svg"></span> Question '.$q_no.'</span></div></div>';
			}
		}

		$answerList = $this->DBfile->get_data('answertbl', array('a_nicheid'=>$nicheid));

		if(!empty($answerList)){
			foreach($answerList as $soloAns){
				$a_no++;
				$ansContent .= '<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
				<div class="traf_contentBox" data-type="ans"><p>';
				$ansContent .= $soloAns['a_title'];
				$ansContent .= '</p><span class="traf_contentCheckBtn"><span><img src="'.base_url().'assets/frontend/images/svg/check.svg"></span> Answer '.$a_no.'</span></div></div>';
			}
		}

		
		$imageList = $this->DBfile->get_data('imagetbl', array('i_nicheid'=>$nicheid));

		if(!empty($imageList)){
			foreach($imageList as $soloImg){
				$i_no++;												
				$imageContent .= '<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
				<div class="traf_contentBox" data-type="img">';
				$imageContent .= '<img  src="'.base_url().'assets/upload/'.$soloImg['i_src'].'" class="img-fluid" />';
				$imageContent .= '<span class="traf_contentCheckBtn"><span><img src="'.base_url().'assets/frontend/images/svg/check.svg"></span> Image '.$i_no.'</span></div></div>';
			}
		}
		echo json_encode(array($quesContent,$ansContent,$imageContent));
		die();
	}

	function uploadImages(){
		if(isset($_FILES['userfile'])){
			$upPath = (explode('/application/',__DIR__)[0]).'/assets/upload/';
			$config['upload_path'] = $upPath;
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = '1000'; // in KB which is 1 MB
			$config['file_name'] = $_FILES['userfile']['name'];
			$responseArr = array();				
			$this->load->library('upload',$config);
			if($this->upload->do_upload('userfile')){
				$uploadData = $this->upload->data();
				$filename = $uploadData['file_name'];
				$clientname = $uploadData['client_name'];
				rename( $upPath.$filename , $upPath.$clientname );
				echo base_url().'assets/upload/'.$clientname.'|@#|'.$config['file_name'];
			}
			else{
				echo "Failed to upload <b>" . $config['file_name'] . "</b>. The reason is : " . $this->upload->display_errors().'|@#|0';
			}
			die();
		}
	}

	function saveEverything(){
		$jsonPost = $this->checkValidAJAX();
		$postData = json_decode($jsonPost,TRUE);
		$postData['share_uid'] = $this->session->userdata['id'];
		$id = $this->DBfile->put_data('shared',$postData);
		echo $id;
		die();
	} */
	
	function qwe(){
	    echo '<iframe class="playboost-iframe" src="https://playboost.co/boost/video/2783" frameborder="0" scrolling="no" allow="autoplay; fullscreen" width="560" height="315" ></iframe>';
	}
	
	function gt(){
	   // $json = '{"caffitid":"","ccustcc":"US","ccustemail":"jallohezekiel@gmail.com","ccustname":" ","ccuststate":"","cproditem":"368841","cprodtitle":"MotoKart","cprodtype":"STANDARD","ctransaction":"SALE","ctransaffiliate":"1661261","ctransamount":"43.50","ctranspaymentmethod":"PYPL","ctransreceipt":"7SP19962J5940124V","ctranstime":"1624394598","ctransvendor":"572943","cupsellreceipt":"","cvendthru":"","cverify":"42DD9134"}';
	   $temp = array(
	       '5s5Zp'  =>  array( '1:00 PM' , '4:59 PM' ),
	       '5s5Cj'  =>  array( '5:00 PM' , '9:59 PM' ),
	       '5s57d'  =>  array( '10:00 PM' , '1:59 AM' ),
	       '5s5wW'  =>  array( '2:00 AM' , '5:59 AM' ),
	       '5s5lS'  =>  array( '6:00 AM' , '9:59 AM' ),
	       '5s52c'  =>  array( '10:00 AM' , '12:59 PM' ),
	       );
	   date_default_timezone_set('US/Eastern');
	  echo $boughtTime = date('h:i A');
	   $strtotime = strtotime($boughtTime);
	   echo '<br/>';echo '<br/>';echo '<br/>';
	   foreach($temp as $listId=>$timeArray){
	       $first = strtotime($timeArray[0]);
	       $second = strtotime($timeArray[1]);
	       if( $first < $strtotime && $strtotime < $second ){
	           echo $listId;
	       }
	       else{
	           echo 'NO---'.$listId;
	       }
	       echo '<br/>';
	       /*$listID = $listId;
			$args = array(
				'campaign' => array('campaignId'=>$listID),
				'email' => $email,
				'name'  =>  $name,
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
			$result = curl_exec($ch);*/
	   }
	}

}
?>