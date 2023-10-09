<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\UserService;

class UserController extends Controller
{

    private $UserService;

    public function __construct(UserService $UserService){
        $this->UserService = $UserService;
    }

    public function test(){

        $result = $this->UserService->testApi();

        return response()->json($result, $result->StatusCode);
    }


    public function create(){

        $request = request(['user_name', 'password']);

        $result = $this->UserService->createNewUser($request);

        return response()->json($result, $result->StatusCode);
    }

    public function search(){

        $request = request(['user_name']);

        $result = $this->UserService->searchUsersByName($request);

        return response()->json($result, $result->StatusCode);
    }



}
