<?php

namespace Tests\Feature;

use App\Snippet;
use App\Language;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SnippetsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_a_user_can_create_a_snippet()
    {
        $this->withoutExceptionHandling();
        $this->signIn();

        $attributes = [
            'title' => $this->faker->name,
            'body' => $this->faker->sentence,
            'user_id' => auth()->id()
        ];

        $this->get('/snippets/create')->assertStatus(200);

        $this->post('/snippets', $attributes);

        $this->assertDatabaseHas('snippets', $attributes);
    }

    public function test_a_user_can_create_a_snippet_with_a_language()
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        $attributes = [
            'title' => $this->faker->name,
            'body' => $this->faker->sentence,
            'user_id' => auth()->id(),
            'language_id' => factory(Language::class)->create()->id
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

    public function test_a_user_can_fork_a_snippet()
    {
        $this->signIn();

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
            'body' => $snippet->body,
            'user_id' => auth()->id()
        ]);

        $this->assertDatabaseHas('snippets', ['forked_id' => $snippet->id]);
    }

    public function test_a_user_can_view_their_snippets() {
        $this->signIn();

        $snippet = factory(Snippet::class)->create(['user_id' => auth()->id()]);

        $this->get("user/" . auth()->id() . "/snippets")->assertSee($snippet->body);
    }
}
