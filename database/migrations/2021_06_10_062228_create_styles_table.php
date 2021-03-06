<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStylesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('styles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('author')->nullable();
            $table->string('subscription')->default('free');
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->mediumText('content')->nullable();
            $table->string('image')->nullable();
            $table->string('url')->nullable();
            $table->string('domain')->nullable();
            $table->string('regex')->nullable();
            $table->string('url-prefix')->nullable();
            $table->string('downloads')->default(0);
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
        Schema::dropIfExists('styles');
    }
}
