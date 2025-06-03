<?php
// Create this migration file: database/migrations/xxxx_xx_xx_xxxxxx_fix_orders_table_status.php
// Run: php artisan make:migration fix_orders_table_status

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
            // Change status column to handle all required values
            $table->enum('status', ['pending', 'approved', 'rejected', 'returned', 'cancelled'])
                  ->default('pending')
                  ->change();
            
            // Ensure notes column exists and can handle longer text
            if (!Schema::hasColumn('orders', 'notes')) {
                $table->text('notes')->nullable();
            } else {
                $table->text('notes')->nullable()->change();
            }
            
            // Ensure other required columns exist
            if (!Schema::hasColumn('orders', 'borrowed_at')) {
                $table->timestamp('borrowed_at')->nullable();
            }
            
            if (!Schema::hasColumn('orders', 'due_at')) {
                $table->timestamp('due_at')->nullable();
            }
            
            if (!Schema::hasColumn('orders', 'returned_at')) {
                $table->timestamp('returned_at')->nullable();
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
            // Revert back to original status enum if needed
            $table->enum('status', ['pending', 'approved', 'returned', 'cancelled'])
                  ->default('pending')
                  ->change();
        });
    }
};