<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categories;
class Categories extends Model
{
    protected $fillable=['name','slug'];
}
