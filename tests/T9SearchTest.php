<?php

use App\Helper\T9Helper;
use PHPUnit\Framework\TestCase;

class T9HelperTest extends TestCase {

    public function testT9Generator()
    {
        $return = T9Helper::generateT9Sequence('Doe');
        $this->assertEquals('363', $return);
    }

    public function testT9GeneratorNumber()
    {
        $return = T9Helper::generateT9Sequence(123);
        $this->assertEquals('123', $return);
    }
}
