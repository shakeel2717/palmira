<?php

namespace App\Models\admin;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentControl extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'user_id',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
