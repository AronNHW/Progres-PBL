<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('prestasis', function (Blueprint $table) {
            // Rename column
            $table->renameColumn('nama', 'nama_mahasiswa');

            // Drop old columns
            $table->dropColumn(['sistem_kuliah', 'ipk', 'periode']);

            // Add new columns
            $table->string('program_studi')->after('nama_mahasiswa');
            $table->string('nama_kegiatan')->after('program_studi');
            $table->date('waktu_penyelenggaraan')->after('nama_kegiatan');
            $table->enum('tingkat_kegiatan', ['Internal (Kampus)', 'Kabupaten/Kota', 'Provinsi', 'Nasional', 'Internasional'])->after('waktu_penyelenggaraan');
            $table->string('prestasi_yang_dicapai')->after('tingkat_kegiatan');
            $table->enum('keterangan', ['Akademik', 'Non-Akademik'])->after('prestasi_yang_dicapai');
            $table->string('bukti_prestasi')->nullable()->after('keterangan');
            $table->string('pembimbing')->nullable()->after('bukti_prestasi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prestasis', function (Blueprint $table) {
            // Rename column back
            $table->renameColumn('nama_mahasiswa', 'nama');

            // Add old columns back
            $table->string('sistem_kuliah');
            $table->float('ipk');
            $table->string('periode');

            // Drop new columns
            $table->dropColumn([
                'program_studi',
                'nama_kegiatan',
                'waktu_penyelenggaraan',
                'tingkat_kegiatan',
                'prestasi_yang_dicapai',
                'keterangan',
                'bukti_prestasi',
                'pembimbing',
            ]);
        });
    }
};
