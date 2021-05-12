<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'contact_id',
        'category_id',
        'title',
        'priority',
        'message',
        'status'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function contact(){
        return $this->belongsTo(Contact::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
