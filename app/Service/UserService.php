<?php



namespace App\Service;


use \Exception;
use App\Models\User;


class UserService {


    public function testApi(){
        return new BaseResponse(true, 200, "La api esta funcionando y su usuario esta autenticado.");
    }

    public function createNewUser($request){
        
        try{
            $result = User::create([
                'user_name' => $request['user_name'],
                'password' => bcrypt($request['password'])
            ]);

            return new BaseResponse(true, 201, "Usuario Creado Correctamente.", $result);

        }catch(Exception $ex){
            return new BaseResponse(false, 500, $ex->getMessage(), $ex);
        }        
    }

    public function searchUsersByName($request){

        try{
            $result = User::where('user_name', 'like', '%' . $request['user_name'] . '%')
                                ->paginate(5);

            return new BaseResponse(true, 200, "Usuarios encontrados correctamente", $result);

        }catch(Exception $ex){
            return new BaseResponse(false, 500, $ex->getMessage(), $ex);
        }
    }


}