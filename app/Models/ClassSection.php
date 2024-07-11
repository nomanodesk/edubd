<?php

namespace App\Models;
use App\Models\InstituteClass;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSection extends Model
{
    use HasFactory;
    protected $fillable = ['sectionName','class_shift','class_version','institue_class_id'];
    public function institute()
    {
        return $this->belongsTo(InstituteClass::class, 'institue_class_id', 'id');
    }
}
