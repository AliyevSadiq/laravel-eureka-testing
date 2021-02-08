<?php

namespace App\Http\Controllers;

use Eureka\EurekaClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{
    public function index()
    {

       set_time_limit(10);


        $client = new EurekaClient([
            'eurekaDefaultUrl' => 'http://bpaws05L:8761/eureka',
            'hostName' => '',
            'appName' => 'address-service-1',
            'ip' => '127.0.0.1',
            'port' => ['8080', true],
          //  'homePageUrl' => 'http://localhost:8080',
            'statusPageUrl' => 'http://localhost:8080/info',
            'healthCheckUrl' => 'http://localhost:8080/health'
        ]);


        try{
            $client->register();


            //$client->start();
            $i= $client->fetchInstance ( "address-service" )->homePageUrl;
            dump($i);

            //$res=Http::get('http://localhost:8080/api/type');

        }catch (\Exception $e){
            return $e->getMessage();
        }





    }
}
