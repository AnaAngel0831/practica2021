<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boards extends Model
{
    use HasFactory;
    public $table = 'boards';

protected $fillable = [
      'name',
      'id',
      'user',
      'members'

  ];

}
