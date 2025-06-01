<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('News', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('sort_title');
            $table->string('image');
            $table->integer('type');
            $table->string('link')->nullable();
            $table->text('summary');
            $table->longText('content');
            $table->integer('index')->default(0);
            $table->integer('view')->default(0);
            $table->foreignIdFor(Category::class, 'category_id');
            $table->foreignIdFor(Subcategory::class, 'subcategory_id');
            $table->foreignIdFor(User::class, 'user_id');
            $table->integer('active')->default(1);
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
        Schema::dropIfExists('News');
    }
}
