<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;

    const TABLE_NAME = 'contacts';

    protected $fillable = [
        'name'
    ];

    private $search_columns = [
        'id','name'
    ];

    public function scopeSearch($query, $string) {
        if ($string) {
            $columns = $this->search_columns;
            $query->where(function ($query) use($string, $columns) {
                foreach ($columns as $column){
                    $query->orWhere($column, 'like',  '%' . $string .'%');
                }
            });
        }
        return $query;
    }

    public function emails() {
        return $this->hasMany(Email::class, 'contact_id', 'id');
    }

    public function phones() {
        return $this->hasMany(Phone::class, 'contact_id', 'id');
    }
}
