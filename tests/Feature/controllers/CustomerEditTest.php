<?php

namespace Tests\Feature\controllers;

use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerEditTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testCustomerEditTest(): void
    {
        $customer=Customer::factory()->create();
        $response = $this->get(route('customers.edit',$customer->id));
        $id=rand(1,100);
       // $response=$this->actingAs($customer)->get(route('customers.edit'),['id'=>$customer['id']]);
        $this->withoutExceptionHandling();
       // $response->assertStatus(200);
       $response->assertOk();
      $response->assertViewIs('customers.edit_customer');
        $response->assertViewHas('editData',Customer::find($id));

    }
    public function testupdatecustomer(): void
    {
        $this->withoutExceptionHandling();
        $customer=Customer::factory()->create();
        $data= \App\Models\Customer::factory(1)->make()->toArray();

        $response = $this->post(route('customers.update',$customer->id,$data));
        $notification = array(
            'message' => 'Customer Inserted Successfully',
            'alert-type' => 'success'
        );

       $this->post(route('customers.update'),$data)
            ->assertSessionHas( $notification)
            ->assertRedirect(route('customers.view'));

    }
}
