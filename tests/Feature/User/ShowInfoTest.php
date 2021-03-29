<?php

namespace Tests\Feature\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Laravel\Sanctum\Sanctum;

class ShowInfoTest extends TestCase
{
    /**
     * @test
     */
    public function lookupUserInfo()
    {
        $activeUser = Sanctum::actingAs(User::factory()->create($userInfo = [

            'user_id' => Str::random(12),
            'password' => Str::random(12),
            'first_name' => Str::random(12),
            'last_name'  => Str::random(12),
            'email' => Str::random(12) . '@' . Str::random(12),
            'contact_number' => random_int(1000, 5000),
            'user_type' => Arr::random(['chef', 'customer']),
        ]));

        $tryLookupLoginedUserInfo = $this->getJson(route('user.show'))->assertOk();
        $lookupedUserInfo = $tryLookupLoginedUserInfo['user'];

        $this->assertEquals(
            $userInfo['user_id'],
            $lookupedUserInfo['user_id'],
        );

        $this->assertEquals(
            $activeUser->id,
            $lookupedUserInfo['id'],
        );
    }
}
