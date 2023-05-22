<?php

namespace Tests\Feature\Models;

use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase ;
    public function testInsertData(): void
    {
    $data=Customer::factory()->create()->toArray();
      //  $data=Customer::factory()->make()->toArray();

     //   Customer::created($data);
   // $this->assertDatabaseCount('customer',1);
        $this->assertDatabaseHas('customer',$data);

    }
}
