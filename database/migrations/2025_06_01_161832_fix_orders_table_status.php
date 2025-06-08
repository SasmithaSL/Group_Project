<?php
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
            $table->enum('status', ['pending', 'approved', 'issued', 'returned', 'rejected', 'cancelled'])
                  ->default('pending')
                  ->change();
            
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
            if (Schema::hasColumn('orders', 'issued_at')) {
                $table->dropColumn('issued_at');
            }
            
            $table->enum('status', ['pending', 'approved', 'returned', 'rejected', 'cancelled'])
                  ->default('pending')
                  ->change();
        });
    }
};