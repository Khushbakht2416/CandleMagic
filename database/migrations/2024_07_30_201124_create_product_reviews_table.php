<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_reviews', function (Blueprint $table) {
            $table->id();
            $table->string("rname")->default("null");
            $table->string('email', 100)->default('null');
            $table->date('date')->default(DB::raw('CURRENT_DATE'));
            $table->string("rmessage")->default("null");
            $table->string("imageurl")->default("../../frontend/images/user/user.png");
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('shop')->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_reviews');
    }
};
