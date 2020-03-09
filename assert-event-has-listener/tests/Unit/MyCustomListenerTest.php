<?php

namespace Tests\Unit;

use App\Listeners\MyCustomListener;
use Tests\TestCase;

class MyCustomListenerTest extends TestCase
{
    /** @test */
    public function test_the_listener_logic()
    {
        $listener = new MyCustomListener();
        $listener->handle();
        
        //$this->assertWhatever();
    }
}