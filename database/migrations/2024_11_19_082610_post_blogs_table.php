<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('post_blogs', function (Blueprint $table) {
            $table->id();
            $table->text('thumbnail');
            $table->string('title');
            $table->string('slug');
            $table->foreignId('catblog_id')->constrained('cat_blogs')->cascadeOnDelete();
            $table->text('exceprt');
            $table->longtext('description');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE post_blogs ADD FULLTEXT Search(title,exceprt,description)');
    }

    public function down(): void
    {
        Schema::dropIfExists('post_blogs');
    }
};
