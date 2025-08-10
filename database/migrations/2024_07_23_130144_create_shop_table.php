<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('shop', function (Blueprint $table) {
            $table->id();
            $table->string('saletag')->nullable();
            $table->string('imgurl', 500);
            $table->string('addtocart')->nullable();
            $table->string('pname', 100);
            $table->string('description', 5000);
            $table->string('information', 5000);
            $table->string('company', 100);
            $table->string('duration', 100);
            $table->decimal('actualprice', 8, 2);
            $table->decimal('afterdiscount')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('bestselling', 10)->default(0);
            $table->integer('quantity', 200)->default(100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop');
    }
};
