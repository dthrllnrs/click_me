<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyClick extends Model
{
    /**
     * Table name for model.
     * @var string
     */
    protected $table = 'daily_clicks';

    /**
     * Primary key field for model.
     * @var string
     */
    protected $primaryKey = 'day';

    /**
     * Mass assignable fields for model
     *
     * @var Array
     */
    protected $fillable = [
        'day',
        'clicks'
    ];

    /**
     * Determines if primary key is an incrementing integer
     * @var bool
     */
    public $incrementing = false;


    public function uniqueClickers() {
        return $this->hasMany(UniqueClicker::class, 'day', 'day');
    }
}
