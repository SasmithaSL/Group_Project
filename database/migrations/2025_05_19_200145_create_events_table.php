<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_events_table.php

public function up()
{
    Schema::create('events', function (Blueprint $table) {
        $table->id();
        $table->string('topic');
        $table->text('description');
        $table->date('event_date');
        $table->time('start_time');
        $table->time('end_time');
        $table->string('venue');
        $table->string('image')->nullable(); // for image upload path
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
