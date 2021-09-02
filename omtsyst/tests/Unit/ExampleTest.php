<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
       $response = $this->get('test');

       $this->assertResonpseOk();

       $this->assertEquals('route test', $response->getContent());
    }
}
