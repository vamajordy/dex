<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const STATUS_SUCCESS = 'success';
    const STATUS_FAIL = 'fail';

    protected $table = 'orders';

    protected $fillable = ['id', 'status'];
}
