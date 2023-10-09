<?php

namespace App\Service;

class BaseResponse {
    public $Succes;
    public $Error;
    public $StatusCode; 
    public $Messege;
    public $Data;

    function __construct($Succes, $ResultCode, $Messege, $Data = null){
        $this->Succes = $Succes;
        $this->Error = !$Succes;
        $this->StatusCode = $ResultCode; 
        $this->Messege = $Messege;
        $this->Data = $Data;
    }
}