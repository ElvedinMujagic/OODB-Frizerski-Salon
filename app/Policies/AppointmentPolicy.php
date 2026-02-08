<?php

namespace App\Policies;

use App\Models\Appointment;
use App\Models\User;

class AppointmentPolicy
{
    /**
     * Only the assigned stylist can update (accept/reject) the appointment.
     */
    public function update(User $user, Appointment $appointment): bool
    {
        return $user->id === $appointment->stylist_id && $appointment->isPending();
    }

    /**
     * Only the client can cancel their own appointment (if pending or accepted).
     */
    public function cancel(User $user, Appointment $appointment): bool
    {
        return $user->id === $appointment->client_id && $appointment->canBeCancelledByClient();
    }
}
