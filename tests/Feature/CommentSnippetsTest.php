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

        $snippet = factory(Snippet::class)->create(['language_id' => $language->id]);

        $this->get("/snippets/languages/$language->name")->assertSee($snippet->body);
    }
}
