<?php

namespace Tests\Feature;

use Tests\TestCase;

class PlayTest extends TestCase
{
    public function test_play_page_can_be_rendered()
    {
        $response = $this->get('/play');
        $response->assertStatus(200);
    }
}
