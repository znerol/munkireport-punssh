<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

class Punssh extends Migration
{
    private $tableName = 'punssh';

    public function up()
    {
        $capsule = new Capsule();
        $migrateData = false;

        $capsule::schema()->create($this->tableName, function (Blueprint $table) {
            $table->increments('id');
            $table->string('serial_number');
            $table->string('destination');
            $table->string('name');
            $table->string('status');
            $table->string('pubkey');
        });

        // (Re)create indexes
        $capsule::schema()->table($this->tableName, function (Blueprint $table) {
            $table->index('name');
            $table->index('destination');
            $table->index('status');
        });
    }
    
    public function down()
    {
        $capsule = new Capsule();
        $capsule::schema()->dropIfExists($this->tableName);
    }
}
