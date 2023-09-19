<?php
namespace App\Core\Exception;

class NotFoundException extends BaseException{
    protected  int $code = 500;
}