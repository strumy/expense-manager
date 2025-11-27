<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Transaction;
use Tests\TestCase;

class TransactionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test to check if the transaction record exists.
     */
    public function test_transaction_record_exists()
    {
        $transaction = Transaction::factory()->create();
        $this->assertModelExists($transaction);
    }
    
    /**
     * INSERT TEST: Test to check if the transaction record can be instantiated.
     */
    public function test_transaction_record_can_be_created(): void
    {
        $transaction = Transaction::factory()->create();
        $this->assertInstanceOf(Transaction::class, $transaction);
    }


    /**
     * UPDATE TEST: Test to check if the transaction record can be updated.
     */
    public function test_transaction_record_can_be_updated(): void
    {
        $transaction = Transaction::factory()->create(['title' => 'This is the original title']);

        $transaction->update(['title' => 'Updated Title']);
    
        $this->assertDatabaseHas('transactions', [
            'id' => $transaction->id,
            'title' => 'Updated Title',
        ]);
    }

    /**
     * DELETE TEST: Test to check if a Transaction record is missing in database
     */
    public function test_transaction_record_can_be_deleted(): void
    {
        $transaction = Transaction::factory()->create();
        $transaction->delete();
 
        $this->assertModelMissing($transaction);
    }

    /**
     * COUNT TEST: Test if the transaction database has 50 records existing
     */
    public function test_transaction_records_count_is_50(): void
    {
        $this->assertDatabaseCount('transactions', 50);
    }

    /**
     * COUNT TEST: Test if the transaction database has 100 records existing 
     * after adding 50 data to initial database
     */
    public function test_transaction_records_count_is_100(): void
    {
        $transactions = Transaction::factory()->count(50)->create();
        $this->assertDatabaseCount('transactions', 100);
    }

}
