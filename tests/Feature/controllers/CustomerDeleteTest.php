<?php

namespace Tests\Feature\controllers;

use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerDeleteTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testCustomerDeleteTest(): void
    {
        $this->withoutExceptionHandling();
        $customer=Customer::factory()->create();
       // $response = $this->get(route('customers.delete',$customer->id));
        $notification = array(
            'message' => 'Customer Deleted Successfully',
            'alert-type' => 'info'

        );
       $this->get(route('customers.delete',$customer->id))
           ->assertSessionHasAll( $notification)
      ->assertRedirect(route('customers.view'));
       $this->assertDatabaseMissing('customer',['id'=>$customer->id]);

     //
    }
}
