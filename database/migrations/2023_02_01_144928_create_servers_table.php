<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servers', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('profile_id');
            $table->unsignedBigInteger('cpu_id');
            $table->unsignedBigInteger('ram_id');
            $table->unsignedBigInteger('disk_id');
            $table->unsignedBigInteger('system_id');
            $table->boolean('ic_ag');
            $table->boolean('dis_ag');
            $table->text('kayit');
            $table->text('reason');
            $table->text('description');
            $table->unsignedBigInteger('status_id')->default('1');
            $table->timestamps();

            $table->softDeletes();

            $table->index('profile_id', 'server_profile_idx');
            $table->index('cpu_id', 'server_cpu_idx');
            $table->index('ram_id', 'server_ram_idx');
            $table->index('disk_id', 'server_disk_idx');
            $table->index('system_id', 'server_system_idx');
            $table->index('status_id', 'server_status_idx');



            $table->foreign('profile_id', 'server_profile_fk')->references('id')->on('profiles')->onDelete('cascade');
            $table->foreign('cpu_id', 'server_cpu_fk')->references('id')->on('cpus')->onDelete('cascade');
            $table->foreign('ram_id', 'server_ram_fk')->references('id')->on('rams')->onDelete('cascade');
            $table->foreign('disk_id', 'server_disk_fk')->references('id')->on('disks')->onDelete('cascade');
            $table->foreign('system_id', 'server_system_fk')->references('id')->on('systems')->onDelete('cascade');
            $table->foreign('status_id', 'server_status_fk')->references('id')->on('statuses')->onDelete('cascade');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servers');
    }
};
