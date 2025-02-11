<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transaction_detail';
    protected $fillable =[
        "transaction_id",
        "movie_id",
        "quantity",
    ];
    public $timestamps = true;
}
