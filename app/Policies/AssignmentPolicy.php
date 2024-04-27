<?php

namespace App\Policies;

use App\Models\Assignment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AssignmentPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->role === 'admin' || $user->role === 'teacher' || $user->role === 'student';
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Assignment $assignment): bool
    {
        // if($user->role === 'admin'){
        //     return true;
        // }elseif($user->role === 'teacher'){
        //     return $assignment->teacher_id === $user->teacher->id;
        // }elseif($user->role === 'student'){
        //     return $user->student->course->contains($assignment->subject->course);
        // }
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role === 'admin' || $user->role === 'teacher';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Assignment $assignment): bool
    {
        if($user->role === 'admin'){
            return true;
        }elseif($user->role === 'teacher'){
            return $assignment->teacher_id === $user->student->id;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Assignment $assignment): bool
    {
        if($user->role === 'admin'){
            return true;
        }elseif($user->role === 'teacher'){
            return $assignment->teacher_id === $user->student->id;
        }

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Assignment $assignment): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Assignment $assignment): bool
    {
        //
    }
}
