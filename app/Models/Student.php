<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Assignment;

class Student extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id','course_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function enrollments(){
        return $this->hasMany(Enrollment::class);
    }

    public function assignments(){
        return $this->hasMany(Assignment::class);
    }
}
