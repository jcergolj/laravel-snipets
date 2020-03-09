<?php

namespace Tests;

trait CustomAssertions
{
    public function assertEventHasListener($event, $listener)
    {
        $events = [];

        foreach ($this->app->getProviders(EventServiceProvider::class) as $provider) {
            $providerEvents = array_merge_recursive(
                $provider->shouldDiscoverEvents() ? $provider->discoverEvents() : [], $provider->listens()
            );

            $events = array_merge_recursive($events, $providerEvents);
        }

        $this->assertTrue(in_array($listener, $events[$event]));
    }
}