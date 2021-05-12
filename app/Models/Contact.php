<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'age',
        'address',
        'mobile',
        'email',
        'currentaccountbalance',
        'credit'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function ticket(){
        return $this->belongsTo(Ticket::class);
    } 
}
