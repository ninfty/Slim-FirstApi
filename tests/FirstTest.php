<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class FirstTest extends TestCase
{
    public function test()
    {
        $request = 1 + 1;

        $this->assertSame($request, 2);
    }
}