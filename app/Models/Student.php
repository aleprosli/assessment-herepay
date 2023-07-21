<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'class',
        'level',
        'parent_contact',
    ];

    public function scopeSearchStudent($query, $search)
    {
        return $query->where('name','LIKE','%'.$search.'%')
        ->orWhere('level','LIKE','%'.$search.'%')
        ->orWhere('class','LIKE','%'.$search.'%')
        ->orWhere('parent_contact','LIKE','%'.$search.'%');
    }
}
