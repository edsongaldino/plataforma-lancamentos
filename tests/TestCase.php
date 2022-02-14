<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Faker\Factory as Faker;

abstract class TestCase extends BaseTestCase
{
    protected function setUp() : void
    {
        parent::setUp();
        $this->faker = Faker::create();
    }

    use CreatesApplication;
}
