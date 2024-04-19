<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Course;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'course_id'];

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function assignments(){
        return $this->hasMany(Assignment::class);
    }
}
