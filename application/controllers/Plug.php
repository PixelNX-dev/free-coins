<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plug extends CI_Controller {
		
    public function initialize()
    {
        if(isset($_POST['content'])){
            $_SESSION['content'] = $_POST['content'];
            $_SESSION['title'] = $_POST['title'];
            die();
        }
    }

    function download(){
        if( isset($_SESSION['content']) ){
            $content = json_decode($_SESSION['content'],true);
            $filename = $_SESSION['title'] == '' ? 'File' : $_SESSION['title'];
            $filename = $filename.'.csv';
            $csvPath = (explode('/application/',__DIR__)[0]).'/assets/plug/';
            $f = fopen($csvPath.$filename, "w");
            $array = explode('|@|@|',$content);
            fputcsv($f, array('Product Name','Product Url','Product Image','Product Image','Type','Price','Feature1 Type','Feature1','Feature2 Type','Feature2','Feature3 Type','Feature3'));
            foreach ($array as $line) { 
                $l = explode('|7-Plug-4|',$line);
                fputcsv($f, $l); 
            }
            redirect(base_url('assets/plug/'.$filename));
            sleep(5);
            unlink($csvPath.$filename);
            die();
        }
    }
    

    function test(){
        echo '<pre>';
        $res = $this->DBfile->get_data( 'usertbl',array('u_id >'=>8));
        print_r($res);
        die();
        foreach($res as $soloUser){
            $listID = '52P4I';
            $args = array(
                'campaign' => array('campaignId'=>$listID),
                'email' => $soloUser['u_email'],
                'name'  =>  $soloUser['u_name'],
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
        }
    }
}
?>