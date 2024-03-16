<?php

namespace App\Policies;

use App\Models\Document;
use App\Models\User;

class DocumentPolicy
{
    public function status(User $user, Document $document, $status)
    {
        return in_array($document->status, explode('|', $status));
    }
}
