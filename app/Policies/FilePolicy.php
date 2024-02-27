<?php

namespace App\Policies;

use App\Models\DocumentFile;
use App\Models\User;

class FilePolicy
{
    public function pending(User $user, DocumentFile $document)
    {
        return $document->status == "pending";
    }
}
