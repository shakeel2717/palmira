<?php

namespace App\Models\admin;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounterDepartment extends Model
{
    use HasFactory;

    public $fillable = ['counter_id','department_id'];


    public function counter()
    {
        return $this->belongsTo(Counter::class);
    }


    public function department()
    {
        return $this->belongsTo(Department::class);
    }

}
