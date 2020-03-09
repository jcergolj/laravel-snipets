<?php

namespace Tests\Unit;

use App\Events\MyCustomEvent;
use App\Listeners\MyCustomListener;
use Tests\CustomAssertions;
use Tests\TestCase;

class EventServiceProviderTest extends TestCase
{
    use CustomAssertions;

    /** @test */
    public function my_custom_event_has_my_custom_listener()
    {
        $this->assertEventHasListener(MyCustomEvent::class, MyCustomListener::class);
    }
}