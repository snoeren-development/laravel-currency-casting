<?php
declare(strict_types = 1);

namespace SnoerenDevelopment\CurrencyCasting\Tests;

use PHPUnit\Framework\TestCase;
use SnoerenDevelopment\CurrencyCasting\Currency;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class ModelTest extends TestCase
{
    /**
     * Test if the constructor throws an exception on invalid digits.
     *
     * @return void
     * @test
     */
    public function constructorThrowsExceptionOnInvalidInput(): void
    {
        // Create a new anonymous model class.
        $model = new class extends EloquentModel {
            protected $fillable = ['test'];
            protected $casts = [
                'test' => Currency::class. ':0',
            ];
        };

        $this->expectException(\InvalidArgumentException::class);
        $model->test = 12.3;
    }

    /**
     * Test if the attribute is set to an integer value.
     *
     * @return void
     * @test
     */
    public function attributeIsSetToIntegerValue(): void
    {
        $model = new Model(['price' => 17.51]);
        $this->assertSame(1751, $model->getRawAttribute('price'));
    }

    /**
     * Test if the attribute is retrieved as a float.
     *
     * @return void
     * @test
     */
    public function attributeIsRetrievedAsFloat(): void
    {
        $model = (new Model)->setRawAttributes(['price' => 1751]);
        $this->assertSame(17.51, $model->price);
    }

    /**
     * Test if the caster handles string values too.
     *
     * @return void
     * @test
     */
    public function casterHandlesStringValues(): void
    {
        $model = new Model(['price' => '193.47']);
        $this->assertSame(19347, $model->getRawAttribute('price'));
        $this->assertSame(193.47, $model->price);
    }

    /**
     * Test if the caster ignores values after the second decimal.
     *
     * @return void
     * @test
     */
    public function casterIgnoresDecimalsAfterSecondPosition(): void
    {
        $model = new Model(['price' => 472.18951753]);
        $this->assertSame(47218, $model->getRawAttribute('price'));
        $this->assertSame(472.18, $model->price);
    }

    /**
     * Test if the caster handles full numbers correctly.
     *
     * @return void
     * @test
     */
    public function casterHandlesFullNumbers(): void
    {
        $model = (new Model)->setRawAttributes(['price' => 1700]);
        $this->assertSame(17.0, $model->price);
    }

    /**
     * Test if the caster handles null values.
     *
     * @return void
     * @test
     */
    public function casterHandlesNullValues(): void
    {
        $model = new Model(['price' => null]);
        $this->assertSame(null, $model->price);

        $model = new Model(['price' => 0]);
        $this->assertSame(0.0, $model->price);

        $model->price = null;
        $this->assertSame(null, $model->getRawAttribute('price'));
    }

    /**
     * Test if the multiplier correctly multiplies the price.
     *
     * @return void
     * @test
     */
    public function moreDigitsMultipliesThePrice(): void
    {
        $model = new Model(['price_triple' => 17.576]);
        $this->assertSame(17576, $model->getRawAttribute('price_triple'));
        $this->assertSame(17.576, $model->price_triple);
    }
}
