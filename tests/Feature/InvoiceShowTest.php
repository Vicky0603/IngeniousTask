<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Infrastructure\Models\Invoice;

class InvoiceShowTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test()
    {
        $invoice = Invoice::factory()->create();

        $response = $this->get("/api/invoice/$invoice->id");
        $response->assertStatus(200);
    }
}
