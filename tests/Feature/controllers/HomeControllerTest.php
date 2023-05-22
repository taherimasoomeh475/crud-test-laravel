<?php

namespace Tests\Feature\controllers;

use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    public function testIndexMethod(): void
    {
        \App\Models\Customer::factory(100)->create();
        $response = $this->get(route('customers.view'));

        $response->assertStatus(200);
        $response->assertViewIs('customers.view_customer');
        $response->assertViewHas('allData',Customer::simplePaginate(10));
    }
}
