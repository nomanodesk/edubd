<?php

namespace App\Models;
use App\Models\ClassSection;
use App\Models\Institution;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstituteClass extends Model
{
    use HasFactory;
    protected $fillable = ['className','class_level','institution_id'];

    public function institute()
    {
        return $this->belongsTo(Institution::class, 'institution_id', 'id');
    }

    public function class_sections()
    {
        return $this->hasMany(ClassSection::class, 'institue_class_id', 'id');
    }
}
