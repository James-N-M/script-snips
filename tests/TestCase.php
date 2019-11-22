<?php

namespace Tests;
use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function signIn($user = null) {
        if($user) {
            $this->actingAs($user);
        }
        else {
            $this->actingAs(factory(User::class)->create());
        }
    }
}
