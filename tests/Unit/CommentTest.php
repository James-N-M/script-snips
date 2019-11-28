<?php

namespace Tests\Unit;

use App\Comment;
use App\Snippet;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_belongs_to_a_user() {
        $this->signIn();

        // a logged in user makes a comment
        $comment = factory(Comment::class)->create(['user_id' => auth()->id()]);

        // that comment should know what user wrote it
        $this->assertInstanceOf('App\User', $comment->creator);
    }

    /** @test */
    public function it_belongs_to_a_snippet() {
        $this->signIn();

        // Create a snippet from somebody
        $snippet = factory(Snippet::class)->create();

        // the logged in user creates a comment on that snippet
        $comment = factory(Comment::class)->create(['user_id' => auth()->id(), 'snippet_id' => $snippet->id]);

        $this->assertInstanceOf('App\Snippet', $comment->snippet);
    }

    /** @test */
    public function a_user_has_many_comments() {
        $this->signIn();

        $snippet = factory(Snippet::class)->create();

        factory(Comment::class)->create(['user_id' => auth()->id(), 'snippet_id' => $snippet->id]);

        // access the auth, user property then access the comments
        $this->assertNotEmpty(auth()->user()->comments);
    }



}
