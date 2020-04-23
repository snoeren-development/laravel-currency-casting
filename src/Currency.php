<?php
declare(strict_types = 1);

namespace SnoerenDevelopment\CurrencyCasting;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class Currency implements CastsAttributes
{
    /**
     * Transform the attribute from the underlying model values.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model      The model object.
     * @param  string                              $key        The property name.
     * @param  mixed                               $value      The property value.
     * @param  array                               $attributes The attributes array.
     * @return float
     */
    public function get($model, string $key, $value, array $attributes)
    {
        return round($value / 100, 2);
    }

    /**
     * Transform the attribute to its underlying model values.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model      The model object.
     * @param  string                              $key        The property name.
     * @param  mixed                               $value      The property value.
     * @param  array                               $attributes The attributes array.
     * @return array
     */
    public function set($model, string $key, $value, array $attributes)
    {
        return (int) ($value * 100);
    }
}
