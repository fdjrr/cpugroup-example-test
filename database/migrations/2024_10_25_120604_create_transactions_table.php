<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->integer('quantity')->default(0);
            $table->decimal('price', 18, 2)->default(0);
            $table->decimal('discount', 18,2)->default(0);
            $table->decimal('total_discount', 18,2)->default(0);
            $table->decimal('total', 18, 2)->default(0);
            $table->enum('transaction_type', ['In', 'Out'])->nullable();
            $table->date('transaction_date');
            $table->string('description')->nullable();
            $table->foreignId('settled_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->dateTime('settled_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
