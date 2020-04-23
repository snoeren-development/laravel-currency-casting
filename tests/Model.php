<?php
declare(strict_types = 1);

namespace SnoerenDevelopment\CurrencyCasting\Tests;

use SnoerenDevelopment\CurrencyCasting\Currency;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel
{
    /**
     * The attributes that are be mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'price',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'price' => Currency::class,
    ];

    /**
     * Get the raw attribute value for testing purposes.
     *
     * @param  string $key The attribute key.
     * @return mixed
     */
    public function getRawAttribute(string $key)
    {
        return $this->attributes[$key] ?? null;
    }
}
