<?php

namespace App\Policies;

use App\Models\DocumentFile;
use App\Models\User;

class FilePolicy
{
    public function status(User $user, DocumentFile $document, $status)
    {
        return in_array($document->status, explode('|', $status));
    }

    public function type(User $user, $document, $type)
    {
        return $document->type == $type;
    }
}
