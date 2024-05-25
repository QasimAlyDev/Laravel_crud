<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrudOperations extends Model
{
    use HasFactory;
    protected $table = 'crud_operations';
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'contact',
        'gender',
        'hobbies',
        'address',
        'country',
        'profile',
    ];

    //mutators start
    public function setEmailAttribute($value){
        $this->attributes['email'] = strtolower($value);
    }

    public function setHobbiesAttribute($value){
        $this->attributes['hobbies'] = implode(',', $value);
    }
    public function getHobbiesArrAttribute()
    {
        return explode(',', $this->hobbies);
    }
    //mutators end

    //Relate the Crude Operations table to the Countries table
    public function getCountry(){
        return $this->belongsTo(Country::class, 'country', 'id');
}
}