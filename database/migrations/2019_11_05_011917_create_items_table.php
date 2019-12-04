<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('item_name',128);
            $table->boolean('can_be_sold')->default(true);
            $table->boolean('is_online')->default(false);
            $table->enum('condition', ['new', 'used','refurbished'])->default('new');
            $table->string('handle',64)->nullable();
            $table->mediumText('description')->nullable();
            $table->integer('category_id')->unsigned()->nullable();
            $table->integer('type_id')->unsigned()->nullable();
            $table->integer('brand_id')->unsigned()->nullable();
            $table->decimal('quantity',13,2)->default(0.00);
            $table->decimal('reorder_point',13,2)->default(0.00);
            $table->decimal('reorder_amount',13,2)->default(0.00);
            $table->string('sale_account_code',64)->nullable();
            $table->string('purchase_account_code',64)->nullable();
            $table->boolean('is_composite')->default(false);
            $table->string('sku',64)->nullable();;
            $table->integer('parent_item_id')->unsigned()->nullable();
            $table->timestamps();
            $table->timestamp('delete_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
