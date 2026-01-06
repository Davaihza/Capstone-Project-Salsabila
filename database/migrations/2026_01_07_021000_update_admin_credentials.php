<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Cara Aman: Update lewat DB Facade supaya admin lama berubah jadi admin baru
        // Cek apakah user lama ada?
        $exists = DB::table('users')->where('email', 'test@example.com')->exists();

        if ($exists) {
            DB::table('users')
                ->where('email', 'test@example.com')
                ->update([
                        'name' => 'Admin Warung',
                        'email' => 'admin@admin.com',
                        'password' => Hash::make('admin123'),
                        'updated_at' => now(),
                    ]);
        } else {
            // Jika tidak ada, buat baru (jaga-jaga)
            // Cek dulu admin@admin.com udah ada blm
            $newExists = DB::table('users')->where('email', 'admin@admin.com')->exists();
            if (!$newExists) {
                DB::table('users')->insert([
                    'name' => 'Admin Warung',
                    'email' => 'admin@admin.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('admin123'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Kembalikan ke asal (Optional)
    }
};
