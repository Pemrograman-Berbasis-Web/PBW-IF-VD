<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            if (!Schema::hasTable('posts')) {
                $table->id();
                $table->string('title');
                $table->text('body')->nullable();
                $table->timestamps();
            }
        });
        

        Schema::table('posts', function (Blueprint $table) {
            $table->text('content')->nullable()->after('title');
            $table->string('image')->nullable()->after('content');
            $table->string('country', 100)->after('image');
            $table->string('phone')->after('country');
            $table->text('description')->nullable()->after('phone');
            
            // Hapus baris berikut, karena tidak valid untuk MySQL
            // $table->text('body')->default('')->change();
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['content', 'image', 'country', 'phone', 'description']);
        });

        Schema::dropIfExists('posts');
    }
};
