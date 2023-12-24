<?php

namespace App\Models;

use App\Models\author;
use App\Models\publisher;
use Illuminate\Database\Eloquent\Factories\BelongsToManyRelationship;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class book extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'book_code','title','cover','slug','author_id','publisher_id'
    ];

    //protected $with =['B']

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }   

   
    public function author(){
        return $this->belongsTo(author::class);
    }

    public function publisher(){
        return $this->belongsTo(publisher::class);
    }
 
    public function categories(): BelongsToMany{
        return $this->belongsToMany(Category::class, 'book_category', 'book_id', 'category_id');
    }
}