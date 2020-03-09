<?php

namespace Tests\Feature;

use App\Events\MyCustomEvent;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class WelcomeControllerTest extends TestCase
{
    /** @test */
    public function fire_event_test()
    {
        Event::fake();

        $this->get('/');

        Event::assertDispatched(MyCustomEvent::class, function ($event) {
            // additional assertions
        });
    }
}