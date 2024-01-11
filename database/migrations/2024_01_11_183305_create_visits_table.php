<?php

// database/migrations/xxxx_xx_xx_create_visits_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitsTable extends Migration
{
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->integer('count')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('visits');
    }
}
