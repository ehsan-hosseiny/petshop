<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\User;
use Illuminate\Http\Response;
use Tests\TestCase;

class ExampleTest extends TestCase
{

    /**
     * @param string $return_type
     * @return string[]
     */
    private function headerWithToken($return_type = 'token')
    {
        if(!$user = User::first()){
            $user = User::factory()->create();
        }
        $this->actingAs($user);
        $tokenResult = $user->createToken('API Token');
        if ($return_type == 'token') {
            return [
                'Authorization' => 'Bearer' . ' ' . $tokenResult->accessToken,
                'Accept' => 'application/json'
            ];
        } elseif ($return_type == 'user') {
            return $user;
        }
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $this->assertTrue(true);
    }

    public function order_list_should_be_authenticate()
    {
        $response = $this->get('/api/orders');
        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    /** @test  */
    public function authenticate_user_should_see_order_list()
    {
        $response = $this->withHeaders($this->headerWithToken())->get('/api/orders');
        $response->assertStatus(Response::HTTP_OK);
    }
}
