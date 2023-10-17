<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\TaskService;

class TaskController extends Controller
{
    
    private $TaskService;

    public function __construct(TaskService $TaskService){
        $this->TaskService = $TaskService;
    }

    public function create(){
        $request = request()->all();

        $result = $this->TaskService->createTask($request);
        return response()->json($result, $result->StatusCode);
    }

    public function edit(){
        $request = request()->all();

        $result = $this->TaskService->editTaskById($request);
        return response()->json($result, $result->StatusCode);
    }

    public function get(){
        $request = request(['id']);

        $result = $this->TaskService->getTaskById($request);
        return response()->json($result, $result->StatusCode);
    }

    public function delete(){
        $request = request(['id']);

        $result = $this->TaskService->deleteTaskById($request);

        return response()->json($result, $result->StatusCode);
    }

    public function getList(){
        $result = $this->TaskService->getTasksList();

        return response()->json($result, $result->StatusCode);
    }

}
