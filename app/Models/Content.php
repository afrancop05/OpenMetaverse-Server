<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable=[
        'file',
        'public'
    ];

    protected $hidden = [
        'checksum'
    ];

    public function type() {
        return $this->belongsTo(Type::class,"type_id","id");
    }

    public function user() {
        return $this->belongsTo(User::class,"owner_id","id");
    }
}
