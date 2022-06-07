<?php
defined('BASEPATH') OR exit('Access Denied');

class Autoresponder {
    protected $CI;
    
    public function __construct() {
        $this->CI = &get_instance();
    }

    public function switch_responder( $apikey, $action, $responder, $postData = array() ){
        switch($responder){
            case 'Aweber':
                return $this->Aweber( $apikey, $action, $responder, $postData );
            break;
            case 'CustomHTML':
                return $this->CustomHTML( $apikey, $action, $postData );
            break;
        }
    }
    
    public function CustomHTML( $apikey, $action, $postData = array() ){
        return array( 'success' => 1 );
    }
    
    public function Aweber( $apikey, $action, $responder, $postData = array() ){
        
        require_once(APPPATH . 'third_party/autoresponder/Aweber/aweber_api.php');
        
        if(isset($apikey['access_secret'])){
            $consumer_key = $apikey['consumer_key'];
            $consumer_secret = $apikey['consumer_secret']; 
            $access_key = $apikey['access_key']; 
            $access_secret = $apikey['access_secret'];
        }
        
        if($action === 'getList'){
            $list = array();

            $descr = '';
            if(!isset($apikey['access_secret'])){
                try{
                    list($consumer_key, $consumer_secret, $access_key, $access_secret) = AWeberAPI::getDataFromAweberID($apikey['aweber_code']);
                }catch (AWeberAPIException $exc){
                    list($consumer_key, $consumer_secret, $access_key, $access_secret) = null;
                    if(isset($exc->message))
                    {
                        $descr = $exc->message;
                        $descr = preg_replace('/http.*$/i', '', $descr);     # strip labs.aweber.com documentation url from error message
                        $descr = preg_replace('/[\.\!:]+.*$/i', '', $descr); # strip anything following a . : or ! character
                        $descr = '('.$descr.')';

                    }
                }catch (AWeberOAuthDataMissing $exc){
                    list($consumer_key, $consumer_secret, $access_key, $access_secret) = null;
                }catch (AWeberException $exc){
                    list($consumer_key, $consumer_secret, $access_key, $access_secret) = null;
                }
            }

            if (!$access_secret){
                $result = array('error'=>'Error occur may be somethig wrong.');
            }else{
                $aweber = new AWeberAPI($consumer_key, $consumer_secret);
                $account = $aweber->getAccount($access_key, $access_secret);
                $aweber_result = $account->lists;
                if( $aweber_result->data['total_size'] != '' && $aweber_result->data['total_size'] != 0 ){
                    foreach ($aweber_result->data['entries'] as $solo_list){
                        $list[$solo_list['id']] = $solo_list['name'];
                    }
                    $result['list'] = $list;
                }else {
                    $result = array('error'=>'There is no list in your account.');
                }
                
                if(!isset($apikey['access_secret'])){           
                    $result['data'] = array(
                        'aweber_code' => $apikey['aweber_code'],
                        'consumer_key' => $consumer_key,
                        'consumer_secret' => $consumer_secret,
                        'access_key' => $access_key,
                        'access_secret' => $access_secret
                    );
                }
                
            }
        }
        
        if($action == 'subsCribe'){
            try{

                $email = $postData['email'];
                $listID = $postData['listid'];

                $aweber = new AWeberAPI($consumer_key, $consumer_secret);

                $account = $aweber->getAccount($access_key, $access_secret);

                $aweber_list = $listID;
                $list = $account->loadFromUrl('/accounts/' . $account->id . '/lists/' . $aweber_list);

                $subscriber = array(
                    'email' => $email,
                    'ip' => $_SERVER['REMOTE_ADDR']
                );

                if (!empty($postData['name'])){
                    $subscriber['name'] = $postData['name'];
                }else {
                    $fname = '';
                }

                $list->subscribers->create($subscriber);
                
                $result = array('success'=>'Subscribe successfully.');

            }catch (AWeberException $e){
                $result = array('error'=>'Subscribe unsuccessfully, please contact administrator for more information.');
            }
        }
        
        return $result;
    }

}
