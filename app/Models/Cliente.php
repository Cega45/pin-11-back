<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;

    protected $table = 'clientes';

    protected $primaryKey = 'id';

    protected $connection = 'mysql';

    protected $fillable = ['name', 'email', 'phone', 'message'];
}
