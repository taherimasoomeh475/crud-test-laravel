<?php

namespace Tests\Feature\Controllers;

use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class CustomeraddTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase ;
    public function testCustomeraddTest(): void
    {
        $response = $this->get(route('customers.add'));

        $response->assertStatus(200);
       $response->assertViewIs('customers.create_customer');
    }
    public function testStoreMethod(): void {
        $this->withoutExceptionHandling();
       $data= \App\Models\Customer::factory(1)->make()->toArray();

   // dd($data);
        $notification = array(
            'message' => 'Customer Inserted Successfully',
            'alert-type' => 'success'
        );

      $this->post(route('customers.store'),$data);
      $this->post(route('customers.store'),$data)
         ->assertSessionHas( $notification)
         ->assertRedirect(route('customers.view'));
      //$this->assertDatabaseHas('customer',$data);
    }

}
