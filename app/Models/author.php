<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class author extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
    'name','slug'
    ];
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function book(){
        return $this->hasMany(book::class);
    }
}