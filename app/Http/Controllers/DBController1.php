<?php

namespace App\Http\Controllers;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Session;
use DB;

class DBController1 extends Controller
{


    public function create()
    {

        $this->up();
    }

    public function rollback()
    {
        $this->down();
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

                    
                   Schema::create('in_activerecord', function (Blueprint $table) {
                   $table->increments('id');
                   $table->timestamps();
                   $table->integer('in_activerecord')->unique()->nullable()->comment('1 o 0');
                   $table->string('nb_activerecord',2)->unique()->nullable()->comment('SI o NO');
                   });
                    
                   Schema::create('projects', function (Blueprint $table) {
                   $table->increments('id');
                   $table->timestamps();
                   $table->string('nb_project',190)->unique();
                   $table->string('nb_description',200)->nullable();
                   $table->string('nb_acronym',190)->unique();
                   $table->integer('in_activo')->default(1);
                   });
                    
                   Schema::create('projects_modules', function (Blueprint $table) {
                   $table->increments('id');
                   $table->timestamps();
                   $table->integer('id_projects')->unsigned()->nullable();
                   $table->string('nb_module',190);
                   $table->integer('in_activerecord')->default(1);
				   $table->integer('nu_order')->default(1);
                   });
                    
                    
                   $this->relaciones();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

                   Schema::disableForeignKeyConstraints();

                   Schema::dropIfExists('in_activerecord');
                   Schema::dropIfExists('projects');
                   Schema::dropIfExists('projects_modules');
                    
                   Schema::enableForeignKeyConstraints();

    }

    /**
     * Relaciones de las Tablas.
     *
     * @return void
     */
    public function relaciones()
    {

                   Schema::table('projects_modules', function (Blueprint $table) {
                   $table->foreign('id_projects','fk_reference_13')->references('id')->on('projects');
                   });

    }


 
}

