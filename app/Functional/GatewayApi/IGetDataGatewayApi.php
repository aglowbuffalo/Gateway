<?php
namespace App\Functional\GatewayApi;

interface IGetDataGatewayApi {

    public function setResponseUrl($url);
    public function setToken($token);
    public function setUserName($userName);
    public function setPassword($password);

    public function getResponseFromApi();
    public function getJsonFromResponse();

}
