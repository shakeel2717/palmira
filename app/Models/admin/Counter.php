<?php

namespace App\Models\admin;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    use HasFactory;


    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function tokens()
    {
        return $this->hasOne(Token::class);
    }

    public function CounterDepartment()
    {
        return $this->hasMany(CounterDepartment::class);
    }
}
