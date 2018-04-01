<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('author')->nullable();
            $table->text('description')->nullable();
            $table->binary('cover_photo')->nullable();
            $table->unsignedInteger('viewed')->default(0);
            $table->text('download_url')->nullable();
            $table->unsignedInteger('created_by');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('created_by')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });

        DB::statement('ALTER TABLE books MODIFY cover_photo LONGBLOB');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
