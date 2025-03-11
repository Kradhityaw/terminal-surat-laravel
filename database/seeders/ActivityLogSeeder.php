<?php

namespace Database\Seeders;

use App\Models\ActivityLog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivityLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $actions = ['create', 'view', 'update', 'download'];
        $details = [
            'create' => 'Membuat surat baru',
            'view' => 'Melihat detail surat',
            'update' => 'Memperbarui informasi surat',
            'download' => 'Mengunduh dokumen surat'
        ];
        
        // Generate 30 activity logs (more than 20 to have good distribution)
        for ($i = 1; $i <= 30; $i++) {
            $userId = rand(1, 10); // Random user from all 10 users
            $letterId = rand(1, 20); // Random letter from all 20 letters
            $action = $actions[array_rand($actions)]; // Random action
            
            $additionalDetail = '';
            if ($action == 'update') {
                $fields = ['subject', 'description', 'sender', 'recepient'];
                $field = $fields[array_rand($fields)];
                $additionalDetail = " - mengubah " . $field;
            } elseif ($action == 'download') {
                $additionalDetail = " - untuk keperluan dokumentasi";
            }
            
            ActivityLog::create([
                'user_id' => $userId,
                'letter_id' => $letterId,
                'action' => $action,
                'details' => $details[$action] . $additionalDetail,
                'created_at' => now()->subDays(rand(0, 30))->addHours(rand(0, 23))->addMinutes(rand(0, 59)),
            ]);
        }
    }
}
