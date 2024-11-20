<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text('banner');
            $table->string('title');
            $table->string('slug');
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->text('location');
            $table->text('shortdesc');
            $table->longtext('description');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE products ADD FULLTEXT Search(title,shortdesc,description)');
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};