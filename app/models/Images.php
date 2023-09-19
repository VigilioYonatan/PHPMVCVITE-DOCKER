<?php
namespace App\Models;

use App\Core\Model;

class Images extends Model{
    protected $table = "images";
    protected $fillable=["url","imagesables_type","imagesables_id"];
}