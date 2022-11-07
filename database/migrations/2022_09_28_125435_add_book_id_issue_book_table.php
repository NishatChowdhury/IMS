<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBookIdIssueBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('issue_books', function (Blueprint $table) {
            $table->integer('book_id')->after('student_id');
            $table->integer('is_return')->after('book_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('issue_books', function (Blueprint $table) {
            $table->dropColumn('book_id');
            $table->dropColumn('is_return');
        });
    }
}
