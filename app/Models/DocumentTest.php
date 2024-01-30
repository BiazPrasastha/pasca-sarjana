<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentTest extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    protected $casts = [
        'timestamp' => 'datetime'
    ];

    public function examiners()
    {
        return $this->hasMany(DocumentExaminer::class, 'document_test_id', 'id');
    }
}
