<?php
declare(strict_types = 1);

namespace SnoerenDevelopment\CurrencyCasting\Tests;

use SnoerenDevelopment\CurrencyCasting\Currency;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'price',
        'price_triple',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'price' => Currency::class,
        'price_triple' => Currency::class . ':3',
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
