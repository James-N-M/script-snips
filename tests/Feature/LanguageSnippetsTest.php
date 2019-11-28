<?php

namespace Tests\Feature;

use App\Snippet;
use App\Language;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LanguageSnippetsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_a_user_can_view_snippets_by_language()
    {
        $this->withoutExceptionHandling();
        $this->signIn();

        $language = factory(Language::class)->create();
        $snippet = factory(Snippet::class)->create(['language_id' => $language->id]);

        $this->get("/snippets/languages/$language->name")->assertSee($snippet->body);
    }
}
