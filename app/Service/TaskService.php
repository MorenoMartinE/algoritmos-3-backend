<?php


namespace App\Service;


use \Exception;
use App\Models\UsersTask;


class TaskService {

    public function createTask($request){

        try{
            $result = UsersTask::create($request);
            return new BaseResponse(true, 201, "Entidad creada correctamente", $result);
        }catch(Exception $ex){
            return new BaseResponse(false, 500, $ex->getMessage(), $ex);
        }
    }

    public function editTaskById($request){
        try{
            $result = UsersTask::where('id', '=', $request['id'])
                                    ->update($request);
            
            return new BaseResponse(true, 201, "Entidad actualizada correctamente", $result);
        }catch(Exception $ex){
            return new BaseResponse(false, 500, $ex->getMessage(), $ex);
        }
    }

    public function getTaskById($request){
        try{
            $result = UsersTask::where('id', '=', $request['id'])->first();

            if($result == null){
                return new BaseResponse(false, 404, "La entidad no fue encontrada");
            }else{
                return new BaseResponse(true, 200, "La entidad fue encontrado");
            }

        }catch(Exception $ex){
            return new BaseResponse(false, 500, $ex->getMessage(), $ex);
        }
    }

    public function deleteTaskById($requset){
        try{
            $result = UsersTask::where('id', '=', $requset['id'])->delete();

            if($result == 0){
                return new BaseResponse(true, 200, "La entidad no fue encontrada");
            }else{
                return new BaseResponse(true, 200, "La entidad fue eliminada");
            }

        }catch(Exception $ex){
            return new BaseResponse(false, 500, $ex->getMessage(), $ex);
        }
    }

    public function getTasksList(){
        try{
            $result = UsersTask::paginate(5);

            return new BaseResponse(true, 200, "La pagina de la lista fue encontrada", $result);
        }catch(Exception $ex){
            return new BaseResponse(false, 500, $ex->getMessage(), $ex);
        }
    }

}