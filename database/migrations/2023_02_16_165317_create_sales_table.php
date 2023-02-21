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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_user_id')->unsigned();/**usuario cliente */
            $table->bigInteger('admin_user_id')->unsigned();/**Usuario administrador */
            $table->bigInteger('product_id')->unsigned();/**producto(s) a comprar*/
            $table->date('date');
            $table->timestamps();/**create_at updated_at*/
            $table->softDeletes();/**delete_at*/

            $table->foreign('customer_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('admin_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
