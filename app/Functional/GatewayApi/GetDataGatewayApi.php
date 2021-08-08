<?php
namespace App\Functional\GatewayApi;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\ConnectionException;

use function PHPUnit\Framework\isEmpty;

class  GetDataGatewayApi implements IGetDataGatewayApi
{

    // public $url = 'http://hiring.rewardgateway.net/list';
    // public $userName = 'hard';
    // public $password = 'hard';
    // public $token = 'Basic';

    public $response = null;
    public $jsonResponse = null;

    public function __construct($url = null, $userName = null, $password = null, $token= null ) {
        $this->url = $url ?? 'http://hiring.rewardgateway.net/list';
        $this->userName = $userName ?? 'hard';
        $this->password = $password ?? 'hard';
        $this->token = $token ?? 'Basic';
    }

    public function setResponseUrl($url)
    {
        $this->url = $url;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getResponseFromApi(){

        try{
            $this->response = Http::withBasicAuth( $this->userName, $this->password)
            ->withToken($this->token)
            ->timeout(10)
            ->post($this->url);
        }catch(ConnectionException $e){
            //for now i only neeed to know there is a error
            //Todo maybe add more logic if needed
            // like add the message to DB
        }

        return $this->response;
    }

    public function getResponse(){
        if($this->response === null){
            $this->response = $this->getResponseFromApi();
        }
        return $this->response;
    }

    public function getJsonFromResponse(Http $response = null){
        if($response === null){
            $response = $this->getResponse();
        }

        if( $response && $response->successful()){

            $data =  $response->json();
            if(!isset($data[0]) ){
                return false;
            }

            return $this->jsonResponse = $data;
        }
        return false;
    }


    public function getTestData(){
        return
        [
            [
                "uuid" => "47a8f8f9-47e9-3d4a-a223-8aa4947e74ed",
                "company" => "Towne-Bayer 1 ",
                "bio" => "<pre>Voluptatem similique et sequi velit porro qui et tempore. Quis maxime fugit voluptas.",
                "name" => "Dr. Kasandra Tillman",
                "title" => "Locker Room Attendant",
                "avatar" => "0",
            ],
            [
                "uuid" => "47a8f8f9-47e9-3d4a-a223-8aa4947e74ed",
                "company" => "Towne-Bayer 2",
                "bio" => "<pre>Voluptatem similique et sequi velit porro qui et tempore. Quis maxime fugit voluptas.",
                "name" => "Dr. Kasandra Tillman",
                "title" => "Locker Room Attendant",
                "avatar" => "0",
            ],
            [
                "uuid" => "47a8f8f9-47e9-3d4a-a223-8aa4947e74ed",
                "company" => "Towne-Bayer 3 ",
                "bio" => "<pre>Voluptatem similique et sequi velit porro qui et tempore. Quis maxime fugit voluptas.",
                "name" => "Dr. Kasandra Tillman",
                "title" => "Locker Room Attendant",
                "avatar" => "0",
            ],
            [
                "uuid" => "47a8f8f9-47e9-3d4a-a223-8aa4947e74ed",
                "company" => "Towne-Bayer 4 ",
                "bio" => "<pre>Voluptatem similique et sequi velit porro qui et tempore. Quis maxime fugit voluptas.",
                "name" => "Dr. Kasandra Tillman",
                "title" => "Locker Room Attendant",
                "avatar" => "0",
            ],
            [
                "uuid" => "47a8f8f9-47e9-3d4a-a223-8aa4947e74ed",
                "company" => "Towne-Bayer 5 ",
                "bio" => "<pre>Voluptatem similique et sequi velit porro qui et tempore. Quis maxime fugit voluptas.",
                "name" => "Dr. Kasandra Tillman",
                "title" => "Locker Room Attendant",
                "avatar" => "0",
            ],
            [
                "uuid" => "47a8f8f9-47e9-3d4a-a223-8aa4947e74ed",
                "company" => "Towne-Bayer 6",
                "bio" => "<pre>Voluptatem similique et sequi velit porro qui et tempore. Quis maxime fugit voluptas.",
                "name" => "Dr. Kasandra Tillman",
                "title" => "Locker Room Attendant",
                "avatar" => "0",
            ],
            [
                "uuid" => "47a8f8f9-47e9-3d4a-a223-8aa4947e74ed",
                "company" => "Towne-Bayer 7 ",
                "bio" => "<pre>Voluptatem similique et sequi velit porro qui et tempore. Quis maxime fugit voluptas.",
                "name" => "Dr. Kasandra Tillman",
                "title" => "Locker Room Attendant",
                "avatar" => "0",
            ],
            [
                "uuid" => "47a8f8f9-47e9-3d4a-a223-8aa4947e74ed",
                "company" => "Towne-Bayer 8",
                "bio" => "<pre>Voluptatem similique et sequi velit porro qui et tempore. Quis maxime fugit voluptas.",
                "name" => "Dr. Kasandra Tillman",
                "title" => "Locker Room Attendant",
                "avatar" => "0",
            ],
            [
                "uuid" => "47a8f8f9-47e9-3d4a-a223-8aa4947e74ed",
                "company" => "Towne-Bayer 9",
                "bio" => "<pre>Voluptatem similique et sequi velit porro qui et tempore. Quis maxime fugit voluptas.",
                "name" => "Dr. Kasandra Tillman",
                "title" => "Locker Room Attendant",
                "avatar" => "0",
            ]

        ];
    }
}
