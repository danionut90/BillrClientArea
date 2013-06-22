<?php
namespace Helper;

use Silex\Application;
use Silex\ServiceProviderInterface;

class BillrApi implements ServiceProviderInterface
{
    protected $app = null;
    public function register(Application $app)
    {
        $thisVar = $this;
        $app['helper.billrApi.query'] = $app->protect(function ($repository, $filters = array()) use ($app, $thisVar) {            
            $post = array(
                'repository' => $repository
            );
            foreach ($filters as $k => $v) {
                $post['filters['.$k.']'] = $v;
            }

            $data = $thisVar->callApi('util/database/query/'.BILLR_API_UTIL_KEY, $post);
            return $data;
        });        

        $app['helper.billrApi.verifyClient'] = $app->protect(function ($username, $password) use ($app, $thisVar) {
            $post = array(
                'username' => $username,
                'password' => $password
            );
            return $thisVar->callApi('util/database/verifyClient/'.BILLR_API_UTIL_KEY, $post);
        });
    }

    public function boot(Application $app)
    {
    }

    public function callApi($url, $data) {
        $curl = curl_init();        
        curl_setopt($curl, CURLOPT_HEADER,0);           
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);   
        curl_setopt($curl, CURLOPT_URL, BILLR_API_URL.$url);            
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            
        $result = curl_exec($curl);
        if ($result == false) {
            // Log error
            return array();
        }
        curl_close($curl);

        return json_decode($result, true);
    }
}