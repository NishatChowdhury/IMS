<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChartOfAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chart_of_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('coa_parent_id');
            $table->text('description')->nullable();
            $table->integer('is_active');
            $table->integer('created_by')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
        DB::table('chart_of_accounts')->insert(
            ['name' => 'cash', 'coa_parent_id' => 0, 'is_active' => 1]
        );
        DB::table('chart_of_accounts')->insert(
            ['name' => 'purchase', 'coa_parent_id' => 0, 'is_active' => 1]
        );
        DB::table('chart_of_accounts')->insert(
            ['name' => 'furniture', 'coa_parent_id' => 0, 'is_active' => 1]
        );
        DB::table('chart_of_accounts')->insert(
            ['name' => 'sales', 'coa_parent_id' => 0, 'is_active' => 1]
        );
        DB::table('chart_of_accounts')->insert(
            ['name' => 'accounts receivable', 'coa_parent_id' => 0, 'is_active' => 1]
        );
        DB::table('chart_of_accounts')->insert(
            ['name' => 'accounts payable', 'coa_parent_id' => 0, 'is_active' => 1]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chart_of_accounts');
    }
}
