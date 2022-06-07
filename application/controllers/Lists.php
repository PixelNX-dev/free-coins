<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lists extends CI_Controller {
		
    public function _remap($type,$list=array())
    {
        if(isset($this->session->userdata['loginstatus']) && $this->session->userdata['type'] == 1 ){
			if(!empty($list) && $list[0] == 'list'){
				$tblName = $type.'tbl';
				$initials = substr($type,0,1);
				if( $type == 'bonus' ){
					$list = $this->DBfile->get_data($tblName);
				}
				else{
					$nicheCol = $initials.'_nicheid';
					$list = $this->DBfile->get_join_data($tblName,'nichetbl',$tblName.'.'.$nicheCol.' = nichetbl.n_id');
				}
				$i=0;
				$data = array();
				if(!empty($list)){
					foreach($list as $sList){
						$editUrl = base_url('admin/addnew/'.$type.'/'.$sList[$initials.'_id']);
						$i++;
						$t = array();
						array_push($t,$i);
						if( $type != 'bonus' )
							array_push($t,$sList['n_title']);

						array_push($t,$sList[$initials.'_name']);
						array_push($t,'<a href="'.$editUrl.'">'.EDIT_ICON.'</a>');
						array_push($t,'<a style="cursor:pointer;" onclick="deleteData('.$sList[$initials.'_id'].',\''.$type.'\')">'.DELETE_ICON.'</a>');
						array_push($data,$t);
					}
				}
				echo json_encode(array('data'=>$data));
				die();
			}
			$data['pagename'] = ucfirst($type);
			$data['pagetype'] = $type;
			$this->load->view('admin/header',$data);
			$this->load->view('admin/lists',$data);
			$this->load->view('admin/footer',$data);
		}
		else
			redirect(base_url());
    }
}
?>