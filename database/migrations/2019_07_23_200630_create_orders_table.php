<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantity_products')->nullable();
            $table->decimal('unitary_value',10,2)->nullable();
            $table->enum   ('status', ['PENDENTE', 'ENVIADO', 'ENTREGUE'])->nullable();
            $table->string ('requester')->nullable();
            $table->string ('forwarding_agent')->nullable();
            $table->integer('code')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->unsignedBigInteger('address_id')->nullable(); // unsigned: somente inteiros positivos
            $table->foreign('address_id')->references('id')->on('addresses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
