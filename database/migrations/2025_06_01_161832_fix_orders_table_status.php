<?php
// database\migrations\2025_06_03_add_issued_status_to_orders.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Update status column to include 'issued' status
            $table->enum('status', ['pending', 'approved', 'issued', 'returned', 'rejected', 'cancelled'])
                  ->default('pending')
                  ->change();
            
            // Add issued_at timestamp for tracking when books were issued
            if (!Schema::hasColumn('orders', 'issued_at')) {
                $table->timestamp('issued_at')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Remove issued_at column
            if (Schema::hasColumn('orders', 'issued_at')) {
                $table->dropColumn('issued_at');
            }
            
            // Revert status enum to previous values
            $table->enum('status', ['pending', 'approved', 'returned', 'rejected', 'cancelled'])
                  ->default('pending')
                  ->change();
        });
    }
};