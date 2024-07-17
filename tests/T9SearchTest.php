<?php

use App\Helper\T9Search;
use PHPUnit\Framework\TestCase;

class T9SearchTest extends TestCase {

    public function testT9Search()
    {
        $return = T9Search::generateT9Sequence('Doe');
        $this->assertEquals('363', $return);
    }

    public function testT9SearchNumber()
    {
        $return = T9Search::generateT9Sequence(123);
        $this->assertEquals('123', $return);
    }
}
