<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTenantNameAndPurposeToXeroAccessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('xero_access', function (Blueprint $table) {
            $table->string('tenant_name')->nullable()->after('tenant_id');            
            $table->string('purpose')->nullable()->after('tenant_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('xero_access', function (Blueprint $table) {
            $table->dropColumn(['tenant_name', 'purpose']);
        });
    }
}