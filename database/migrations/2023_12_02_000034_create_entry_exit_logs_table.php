<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('entry_exit_logs', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('user_id');
        });
    }

    public function down()
    {   
        //
    }
};
