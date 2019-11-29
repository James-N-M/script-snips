<?php

namespace Tests\Feature;

use App\Comment;
use App\Snippet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LikesTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function a_user_can_like_a_snippet()
    {
        // user and logged in
        $this->signIn();

        // given i have a snippet
        $snippet = factory(Snippet::class)->create();

        // when they like a snippet
        $snippet->like();

        // then we should see evidence in the database, and the snippet should be liked
        $this->assertDatabaseHas('likes', [
            'user_id' => auth()->id(),
            'likeable_id' => $snippet->id, // id of the like able object
            'likeable_type' => get_class($snippet), // which just be snippet
        ]);

        $this->assertTrue($snippet->isLiked());
    }

    /** @test */
    public function a_user_can_unlike_a_snippet()
    {
        // user and logged in
        $this->signIn();

        // given i have a snippet
        $snippet = factory(Snippet::class)->create();

        // when they like a snippet
        $snippet->like();
        $snippet->unlike();

        // then we should see evidence in the database, and the snippet should be liked
        $this->assertDatabaseMissing('likes', [
            'user_id' => auth()->id(),
            'likeable_id' => $snippet->id, // id of the like able object
            'likeable_type' => get_class($snippet), // which just be snippet
        ]);

        $this->assertFalse($snippet->isLiked());
    }

    /** @test */
    public function a_user_may_toggle_a_snippets_like_status()
    {
        // user and logged in
        $this->signIn();

        // given i have a snippet
        $snippet = factory(Snippet::class)->create();

        $snippet->toggle();

        $this->assertTrue($snippet->isLiked());

        $snippet->toggle();

        $this->assertFalse($snippet->isLiked());
    }

    /** @test */
    public function a_snippet_knows_how_many_likes_it_has()
    {
        // user and logged in
        $this->signIn();

        // given i have a snippet
        $snippet = factory(Snippet::class)->create();

        $snippet->toggle();

        $this->assertEquals(1, $snippet->likesCount);
    }

    /** @test */
    public function a_user_can_like_a_comment()
    {
        // user and logged in
        $this->signIn();

        // given there is a snippet
        $snippet = factory(Snippet::class)->create();

        // given theres a comment on that snippet
        $comment = factory(Comment::class)->create(['snippet_id' => $snippet->id]);

        // when user likes that comment
        $comment->like();

        // then we should see evidence in the database, and the comment should be liked
        $this->assertDatabaseHas('likes', [
            'user_id' => auth()->id(),
            'likeable_id' => $comment->id, // id of the like able object
            'likeable_type' => get_class($comment), // which just be snippet
        ]);

        $this->assertTrue($comment->isLiked());
    }

}
