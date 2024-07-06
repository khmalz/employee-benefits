<?php

namespace App\Actions\Notification;

use App\Models\User;

class ReadNotification
{
    public function handle(User $user, ?string $id)
    {
        $user->unreadNotifications()->when($id, function ($query) use ($id) {
            $query->find($id);
        })->update(['read_at' => now()]);
    }
}
