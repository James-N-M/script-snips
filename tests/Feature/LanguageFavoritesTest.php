<?php

namespace Tests\Feature;

use App\Language;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LanguageFavoritesTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function a_user_can_favorite_a_language()
    {
        // sign in with a user
        $this->signIn();

        // Given we have a language
        $language = factory(Language::class)->create();

        // when they favorite a language
        $language->favorite();

        $this->assertDatabaseHas('favorites', [
            'user_id' => auth()->id(),
            'favorable_id' => $language->id, // id of the like able object
            'favorable_type' => get_class($language), // which just be snippet
        ]);

        $this->assertTrue($language->isFavorited());
    }

    /** @test */
    public function a_user_has_favorites()
    {
        // sign in with a user
        $this->signIn();

        // Given we have a language
        $language = factory(Language::class)->create();

        // when they favorite a language
        $language->favorite();

        $this->assertNotEmpty(auth()->user()->favoritedLanguages());
    }
}
