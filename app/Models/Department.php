<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Course;
use App\Models\Teacher;

class Department extends Model
{
    use HasFactory;
    protected $fillable=['name'];

    public function courses() {
        return $this->hasMany(Course::class);
    }

    public function teachers() {
        return $this->hasMany(Teacher::class);
    }
}
