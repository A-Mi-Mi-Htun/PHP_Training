<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    use Searchable {
        Searchable::search as parentSearch;
    }

    public static function search($query = '', $callback = null)
    {
        return static::parentSearch($query, $callback)->query(function ($builder) {
            $builder->join('majors', 'students.major_id', '=', 'majors.id');
        });
    }

    protected $fillable = ['name','email','phone','major_id','address'];
    
    public function major()
    {
        return $this->belongsTo('App\Models\Major');
    }

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'major' => $this->major,
        ];
    }
}
