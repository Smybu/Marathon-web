<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Avis extends Model
{
    use HasFactory;
    protected $table = "avis";

    protected $fillable = [
        "contenu",
        'user_id',
        'contenu_id'
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class,'user_id');
    }
    public function histoire() : BelongsTo
    {
        return $this->belongsTo(Histoire::class, 'histoire_id');
    }


}
