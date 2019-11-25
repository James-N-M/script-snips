<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Snippet;
use Tests\TestCase;

class LikeSnippetsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function a_user_can_like_a_snippet_endpoint()
    {
        $this->withoutExceptionHandling();
        // user creation and logged in
        $this->signIn();

        // given I have a snippet
        $snippet = factory(Snippet::class)->create();

        // when they hit an endpoint they like a snippet
        $this->post("/snippets/$snippet->id/like");

        // then we should see evidence in the database, and the snippet should be liked
        $this->assertDatabaseHas('likes', [
            'user_id' => auth()->id(),
            'likeable_id' => $snippet->id, // id of the like able object
            'likeable_type' => get_class($snippet), // which just be snippet
        ]);

        $this->assertTrue($snippet->isLiked());
    }

    /** @test */
    public function a_user_can_unlike_a_snippet_endpoint()
    {
        $this->withoutExceptionHandling();
        // user creation and logged in
        $this->signIn();

        // given I have a snippet
        $snippet = factory(Snippet::class)->create();

        // given that snippet is liked
        $snippet->like();

        // when they hit an endpoint they can unlike a snippet
        $this->post("/snippets/$snippet->id/unlike");

        // then we should see evidence in the database, and the snippet should be liked
        $this->assertDatabaseMissing('likes', [
            'user_id' => auth()->id(),
            'likeable_id' => $snippet->id, // id of the like able object
            'likeable_type' => get_class($snippet), // which just be snippet
        ]);

        $this->assertFalse($snippet->isLiked());
    }
}
