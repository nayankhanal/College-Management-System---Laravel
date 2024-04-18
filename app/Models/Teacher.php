<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Department;
use App\Models\User;
use App\Models\Assignment;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'department_id'];

    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function assignments(){
        return $this->hasMany(Assignment::class);
    }
}
