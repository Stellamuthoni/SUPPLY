<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class Stock extends Model
{
   
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'stock';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'quantity', 'cost'];
}
