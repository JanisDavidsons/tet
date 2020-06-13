<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static latest(string $string)
 * @method static where(string $string, string $string1, $latestDate)
 */
class Currency extends Model
{
    protected $fillable = [
      'currency',
      'value',
      'recorded_at'
    ];
}
