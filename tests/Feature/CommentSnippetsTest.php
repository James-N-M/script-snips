<?php

namespace Tests\Feature;

use App\Snippet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentSnippetsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_a_user_can_comment_on_a_snippet()
    {
        $this->withoutExceptionHandling();
        $this->signIn();


        $snippet = factory(Snippet::class)->create();

        $attributes = [
            'body' => $this->faker->sentence,
            'snippet_id' => $snippet->id
        ];

        $this->get('/snippets/' . $snippet->id)->assertStatus(200);

        $this->post("/snippets/$snippet->id/comments", $attributes);

        $this->assertDatabaseHas('comments', [
            'user_id' => auth()->id(),
            'snippet_id' => $snippet->id, // id of the like able object
            'body' => $attributes['body'], // which just be snippet
        ]);
    }
}
