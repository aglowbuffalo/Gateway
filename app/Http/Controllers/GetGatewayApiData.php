<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Functional\GatewayApi\GetDataGatewayApi;

use function PHPUnit\Framework\isEmpty;

class GetGatewayApiData extends Controller
{

    public $perPage = 20;

    public function index(){
        dd('aaaaa');
    }

    public function getListFromApi(){

        $getDataApi = new GetDataGatewayApi();

        $data = $getDataApi->getJsonFromResponse();

        // $data = $getDataApi->getTestData();


        $numEmployees = ($data) ? count($data) : 0;
        $pageEmpNum = ($numEmployees > $this->perPage) ? $this->perPage : $numEmployees;

        return view('employees.index')
        ->with( [
            'employees' => $data,
            'perPage' => $this->perPage,
            'pageEmpNum' => $pageEmpNum,
            'numEmployees' => $numEmployees,

        ]);

    }
    /**
     * load list from api
     */
    public function getEmployeesListView(Request $request){

        $getDataApi = new GetDataGatewayApi();
        $employees  = $getDataApi->getJsonFromResponse();
        // $data = $getDataApi->getTestData();

        // $employees = $request->input('employees');
        $page = $request->input('page');
        if(!empty($employees)){
            $data = array_slice($employees, $page * $this->perPage , $this->perPage);
        }else{
            $data = false;
        }

        $dataNumEmp = ($data)  ?  count($data): 0;
        $numEmployees = ($employees) ? count($employees) : 0;

        $pageEmpNum = ($numEmployees > $this->perPage * $page + 1) ? $this->perPage : $dataNumEmp;


        if( ($this->perPage * $page + 1) > $numEmployees  && $data){
            return response()->json(['lastPagee' => true]);
        }

        return view('employees.list')
        ->with( [
            'employees' => $data,
            'perPage' => $this->perPage,
            'pageEmpNum' => $pageEmpNum,
            'numEmployees' => $dataNumEmp,
        ]);
    }

    /**
     *
     */
    public function getListFromDB(){

    }
}
