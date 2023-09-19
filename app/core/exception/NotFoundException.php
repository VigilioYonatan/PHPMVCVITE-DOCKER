<?php
namespace App\Core\Exception;

class NotFoundException extends BaseException{
    public  int $code = 400;
}