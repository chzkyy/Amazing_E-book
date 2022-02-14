<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['account_id', 'ebook_id'];

    public function user()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    public function Book()
    {
        return $this->belongsTo(EBook::class, 'ebook_id', 'id');
    }
}
