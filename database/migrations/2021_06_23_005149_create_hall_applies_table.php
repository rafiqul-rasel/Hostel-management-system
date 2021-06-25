<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHallAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hall_applies', function (Blueprint $table) {
            $table->id();
            $table->integer("Student_id");
            $table->integer("user_id");
            $table->string("Department");
            $table->string("CGPA");
            $table->integer("hall_id")->nullable();
            $table->integer("room_id")->nullable();
            $table->integer("seat_id")->nullable();
            $table->integer("status")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hall_applies');
    }
}
