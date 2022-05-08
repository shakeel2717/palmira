<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentControl extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'user_id',
    ];
}
