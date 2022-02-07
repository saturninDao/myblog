<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class RouteTest extends TestCase
{
    public function testAccesAdminWithGuestRole()
    {
        $response = $this->get('/admin/articles');
        $response->assertRedirect('/login');
    }

        public function testAccessAdminWithAdminRole()
        {
            $admin = Auth::loginUsingId(1);
            $this->actingAs($admin);
            $response = $this->get('/admin/articles');
            $response->assertStatus(200);

        }

}
