<?php


namespace App\Test;


use App\Util\FizzBuzz;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    private $fizzbuzz;

    protected function setUp():void {
        $this->fizzbuzz = new FizzBuzz();
    }

    function testIf11return11(){
        $this->assertEquals(1, $this->fizzbuzz->generate(1,1));
    }

    function testIf22return22(){
        $this->assertEquals(2, $this->fizzbuzz->generate(2,2));
    }

    function testIf77return77(){
        $this->assertEquals(7, $this->fizzbuzz->generate(7,7));
    }

    function testIf3multiiplereturnFizz(){
        $this->assertEquals('Fizz', $this->fizzbuzz->generate(3,3));
        $this->assertEquals('Fizz', $this->fizzbuzz->generate(6,6));
        $this->assertEquals('Fizz', $this->fizzbuzz->generate(27,27));
    }
    function testIf5multiiplereturnBuzz(){
        $this->assertEquals('Buzz', $this->fizzbuzz->generate(5,5));
        $this->assertEquals('Buzz', $this->fizzbuzz->generate(20,20));
    }

    function testIf15multiiplereturnBuzz(){
        $this->assertNotEquals('Buzz', $this->fizzbuzz->generate(15,15));
        $this->assertEquals('FizzBuzz', $this->fizzbuzz->generate(15,15));
        $this->assertEquals('FizzBuzz', $this->fizzbuzz->generate(30,30));
        $this->assertEquals('FizzBuzz', $this->fizzbuzz->generate(90,90));
    }

    function testIf12Return12(){
        $this->assertEquals(12, $this->fizzbuzz->generate(1,2));
    }

    function testIf345ReturnFizz4Buzz(){
        $this->assertEquals("Fizz4Buzz", $this->fizzbuzz->generate(3,5));
    }

    function testIf1To10Return12Fizz4BuzzFizz78FizzBuzz11Fizz1314FizzBuzz(){
        $this->assertEquals('12Fizz4BuzzFizz78FizzBuzz11Fizz1314FizzBuzz', $this->fizzbuzz->generate(1,15));
    }

    function testIf54ReturnBuzz(){
        $this->assertEquals("Buzz", $this->fizzbuzz->generate(5,4));
    }
}