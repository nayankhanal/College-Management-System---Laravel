<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Department;
use App\Models\Subject;
use App\Models\Student;
use App\Models\Enrollment;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['name','department_id'];

    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function subjects(){
        return $this->hasMany(Subject::class);
    }

    public function students(){
        return $this->hasMany(Student::class);
    }

    public function enrollments(){
        return $this->hasMany(Enrollment::class);
    }
}
