<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('portofolio_1073s', function (Blueprint $table) {
            $table->id();
            $table->string('foto')->nullable();
            $table->string('nama_lengkap');
            $table->string('profesi_title');
            $table->text('tentang_saya');

            // Data Pribadi
            $table->string('ttl');
            $table->text('alamat');
            $table->string('telepon');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('kewarganegaraan');
            $table->string('email');
            $table->string('status');
            $table->string('website')->nullable();

            // Riwayat & Teks Panjang
            $table->text('keahlian');
            $table->text('pendidikan');
            $table->text('pengalaman');
            $table->text('hobi');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('portofolio_1073');
    }
};
