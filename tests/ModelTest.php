<?php
declare(strict_types = 1);

namespace SnoerenDevelopment\CurrencyCasting\Tests;

use PHPUnit\Framework\TestCase;

class ModelTest extends TestCase
{
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
}
