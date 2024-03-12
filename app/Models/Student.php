<?php

namespace App\Models;
use App\Models\Institution;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['studentName','studentImage','institue_class_id','rollNo','class_section_id','contactNo','institution_id','operator_id'];

    public function institute()
    {
        return $this->belongsTo(Institution::class, 'institution_id', 'id');
    }
}
