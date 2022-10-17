<?php

namespace App\Models;

use Database\Factories\RegisterPeopleFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterPeople extends Model
{
    use HasFactory;

    protected $table = 'register_people';

    protected static function newFactory()
    {
        return RegisterPeopleFactory::new();
    }
}
