<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalRecord extends Model
{
    protected $table = 'personal_record';

    protected $fillable = ['user_id', 'movement_id', 'value', 'date'];
}
