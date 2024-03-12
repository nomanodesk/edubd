<?php

namespace App\Models;
use App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory;
    protected $fillable = ['operatorName'];
    
    public function students()
    {
        return $this->hasMany(Student::class, 'operator_id', 'id');
    }
}
