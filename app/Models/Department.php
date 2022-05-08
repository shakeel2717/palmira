<?php

namespace App\Models;

use App\Models\admin\Counter;
use App\Models\admin\Token;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public function token()
    {
        return $this->hasMany(Token::class);
    }

    public function departmentControl()
    {
        return $this->hasMany(DepartmentControl::class);
    }


    public function counter()
    {
        return $this->hasMany(Counter::class);
    }
}
