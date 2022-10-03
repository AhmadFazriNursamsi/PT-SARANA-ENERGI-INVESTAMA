<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPenawaran extends Model
{
    use HasFactory;
    protected $table = "item_penawaran";
    public $timestamps = false;

    // protected $fillabele = ['item_id','nama_item', 'harga', 'quantity'];
}
