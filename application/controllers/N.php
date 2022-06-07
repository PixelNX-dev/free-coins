<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class N extends CI_Controller {
		
	public function _remap($websiteName='',$params = array()){
        if( $websiteName == 'index' )
            redirect(base_url());
        else{
            $webRes = $this->DBfile->get_data('websitetbl',array('w_sitename'=>$websiteName));
            if(empty($webRes))
                redirect(base_url());
                
            $data['websiteData'] = $webRes[0];

            $data['nicheList'] = $this->DBfile->get_join_data('frontwebtbl','nichetbl','frontwebtbl.f_nicheid=nichetbl.n_id',array('f_webid'=>$webRes[0]['w_id']),'n_title,n_id,n_slug');
            
            if(empty($params)){
                $data['articles'] = $this->DBfile->get_join_data('website_article','nichetbl','website_article.webart_nicheid=nichetbl.n_id',array('webart_webid'=>$webRes[0]['w_id']), 'webart_blog,webart_title,webart_slug,webart_date,n_slug',array('webart_id'=>'DESC'),'','',8);
                
                $nicheSlug = "";
                $data['nicheName'] = "" ;
                $data['nicheid'] = 0 ;

                $fRes = $this->DBfile->get_data('frontwebtbl',array('f_webid'=>$webRes[0]['w_id']),'*','',1);
                $data['frontWebData'] =  !empty($fRes) ? $fRes[0] : array();
            }
            else{
                $nicheSlug = $params[0];
                $nicheRes =  $this->DBfile->get_data('nichetbl',array('n_slug'=>$nicheSlug));
                if(empty($nicheRes))
                    redirect(base_url('artist/'.$webRes[0]['w_sitename']));

                $data['nicheName'] = $nicheRes[0]['n_title'];
                $data['nicheid'] = $nicheRes[0]['n_id'];
                $data['articles'] = $this->DBfile->get_join_data('website_article','nichetbl','website_article.webart_nicheid=nichetbl.n_id',array('webart_webid'=>$webRes[0]['w_id'],'webart_nicheid'=>$nicheRes[0]['n_id']), 'webart_blog,webart_title,webart_slug,webart_date,n_slug',array('webart_date'=>'DESC'));

                $fRes = $this->DBfile->get_data('frontwebtbl',array('f_webid'=>$webRes[0]['w_id'],'f_nicheid'=>$nicheRes[0]['n_id']));
                $data['frontWebData'] =  !empty($fRes) ? $fRes[0] : array();
            }

            $data['bonuses'] =  $this->DBfile->get_data('bonustbl');
            if(isset($params[1])){
                $data['singleArticle'] = $this->DBfile->get_join_data('website_article','nichetbl','website_article.webart_nicheid=nichetbl.n_id',array('webart_webid'=>$webRes[0]['w_id'],'webart_slug'=>$params[1]), 'webart_id,webart_blog,webart_title,webart_slug,webart_date,n_slug,webart_views,webart_widget');

                if(empty($data['singleArticle']))
                    redirect(base_url('artist/'.$webRes[0]['w_sitename']));

                //Update Views
                $views = $data['singleArticle'][0]['webart_views'] + 1 ;
                $this->DBfile->set_data('website_article',array('webart_views'=>$views),array('webart_id'=>$data['singleArticle'][0]['webart_id']));

                $this->load->view('frontend/blogpage',$data);
            }
            else
                $this->load->view('frontend/website',$data);
        }
    }	
}
?>