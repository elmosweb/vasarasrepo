<?php


namespace Quiz\Models;


use Illuminate\Database\Eloquent\Model;
//Extends elequent model
abstract class BaseModel extends Model
{

    public $timestamps = false;
}