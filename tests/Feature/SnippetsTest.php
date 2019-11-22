<?php

namespace Tests\Feature;

use App\Snippet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SnippetsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_a_guest_can_create_a_snippet()
    {
        $attributes = [
            'title' => $this->faker->name,
            'body' => $this->faker->sentence,
        ];

        $this->get('/snippets/create')->assertStatus(200);

        $this->post('/snippets', $attributes);

        $this->assertDatabaseHas('snippets', $attributes);
    }

    public function test_a_guest_can_view_snippets()
    {
        $snippet = factory(Snippet::class)->create();

        $this->get('/snippets')->assertSee($snippet->body);
    }

    public function test_a_guest_can_view_a_snippet()
    {
        $snippet = factory(Snippet::class)->create();

        $this->get("/snippets/$snippet->id")->assertSee($snippet->body);
    }

    public function test_a_guest_can_fork_a_snippet()
    {
        $snippet = factory(Snippet::class)->create();

        // View the snippet
        $this->get("/snippets/$snippet->id")->assertSee($snippet->body);

        // click fork
        $this->get("/snippets/$snippet->id/fork")->assertSee($snippet->body);

        // Modify the snippet
        $snippet->title = "Modified title";
        $snippet->body .= "Modified body";

        $this->post('/snippets', [
            'forked_id' => $snippet->id,
            'title' => $snippet->title,
            'body' => $snippet->body
        ]);

        $this->assertDatabaseHas('snippets', ['forked_id' => $snippet->id]);
    }
}
