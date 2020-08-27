<?php
declare(strict_types = 1);

namespace SnoerenDevelopment\CurrencyCasting;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class Currency implements CastsAttributes
{
    /**
     * The currency multiplier.
     *
     * @var integer
     */
    protected $multiplier;

    /**
     * Constructor
     *
     * @param  integer $digits The amount of digits to handle.
     * @return void
     *
     * @throws \InvalidArgumentException Thrown on invalid input.
     */
    public function __construct(int $digits = 2)
    {
        if ($digits < 1) {
            throw new \InvalidArgumentException('Digits should be a number larger than zero.');
        }

        $this->multiplier = 10 ** $digits;
    }

    /**
     * Transform the attribute from the underlying model values.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model      The model object.
     * @param  string                              $key        The property name.
     * @param  mixed                               $value      The property value.
     * @param  array                               $attributes The model attributes array.
     * @return float
     */
    public function get($model, string $key, $value, array $attributes)
    {
        return $value !== null
            ? round($value / $this->multiplier, 2)
            : null;
    }

    /**
     * Transform the attribute to its underlying model values.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model      The model object.
     * @param  string                              $key        The property name.
     * @param  mixed                               $value      The property value.
     * @param  array                               $attributes The model attributes array.
     * @return array
     */
    public function set($model, string $key, $value, array $attributes)
    {
        return (int) ($value * $this->multiplier);
    }
}
