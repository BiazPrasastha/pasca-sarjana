<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    protected $casts = [
        'timestamp' => 'datetime'
    ];

    public function test()
    {
        return $this->belongsTo(DocumentTest::class);
    }

    public function files()
    {
        return $this->hasMany(DocumentFile::class);
    }
}
