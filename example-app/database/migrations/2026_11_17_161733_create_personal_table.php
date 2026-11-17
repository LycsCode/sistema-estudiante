
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('personal', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';

            $table->integer('ID')->primary();
            $table->string('Nombre', 120);
            $table->string('Correo', 200);
            $table->string('Asignatura', 200);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('personal');
    }
};
