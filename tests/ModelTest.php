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
}
