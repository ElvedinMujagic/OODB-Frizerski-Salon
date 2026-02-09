<?php

namespace App\Policies;

use App\Models\Appointment;
use App\Models\User;

class AppointmentPolicy
{
    /**
     * Samo frizeri mogu prihvatiti ili odbiti termin. Ako je njima upućen.
     */
    public function update(User $user, Appointment $appointment): bool
    {
        return $user->id === $appointment->stylist_id && $appointment->isPending();
    }

    /**
     * Samo klijent može otkazati termin
     */
    public function cancel(User $user, Appointment $appointment): bool
    {
        return $user->id === $appointment->client_id && $appointment->canBeCancelledByClient();
    }
}
