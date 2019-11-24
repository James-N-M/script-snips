<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class SnippetTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_has_an_original_snippet() {
        $snippet = factory('App\Snippet')->create();

        $forkedSnippet = factory('App\Snippet')->create(['forked_id' => $snippet->id]);

        $this->assertInstanceOf('App\Snippet', $forkedSnippet->originalSnippet);
    }

    /** @test */
    public function it_is_a_forked_snippet() {
        $snippet = factory('App\Snippet')->create();

        $forkedSnippet = factory('App\Snippet')->create(['forked_id' => $snippet->id]);

        $this->assertTrue($forkedSnippet->isAFork());
    }

    /** @test */
    public function it_has_many_forked_snippets() {
        $snippet = factory('App\Snippet')->create();
        factory('App\Snippet')->create(['forked_id' => $snippet->id]);
        factory('App\Snippet')->create(['forked_id' => $snippet->id]);

        $this->assertNotEmpty($snippet->forks());
    }

    /** @test */
    public function it_belongs_to_a_user() {
        $this->signIn();

        $snippet = factory('App\Snippet')->create(['user_id' => auth()->id()]);

        $this->assertInstanceOf('App\User', $snippet->creator);
    }
}
