<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterLevel extends Model
{
    use HasFactory, CrudTrait;

    protected $guarded = ['id'];
}
