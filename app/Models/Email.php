<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Email extends Model
{
    use SoftDeletes;

    const TABLE_NAME = 'emails';

    protected $fillable = [
        'email', 'contact_id'
    ];

    public function contact() {
        return $this->belongsTo(Contact::class);
    }
}
