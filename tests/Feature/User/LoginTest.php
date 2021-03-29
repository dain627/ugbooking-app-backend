<?php

namespace Tests\Feature\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Laravel\Sanctum\Sanctum;

class LoginTest extends TestCase
{

    /**
     * @test
     */
    public function successLoginTest()
    {
        $user = User::factory()->create($userInfo = [

            'user_id' => Str::random(12),
            'password' => Str::random(12),
            'first_name' => Str::random(12),
            'last_name'  => Str::random(12),
            'email' => Str::random(12) . '@' . Str::random(12),
            'contact_number' => random_int(1000, 5000),
            'user_type' => Arr::random(['chef', 'customer']),
        ]);


        $tryLogin = $this->postJson(route('user.login'), [
            'user_id' => $userInfo['user_id'],
            'password' => $userInfo['password'],
        ])->assertOk();



    }
}
