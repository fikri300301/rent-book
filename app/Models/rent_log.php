<?php

namespace App\Models;

use App\Models\book;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class rent_log extends Model
{
    use HasFactory;

    // protected $table ='rent_logs';

    protected $fillable =[
      'user_id',
      'book_id',
      'rent_date',
      'renturn_date'  
    ];

    public function user(){
      return $this->belongsTo(User::class);
    }
    
    public function book(){
      return $this->belongsTo(book::class);
    }
}