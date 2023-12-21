<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static find()
 * @method static create(array $array)
 * @method static latest()
 */
class Histoire extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        "titre",
        "pitch",
        "photo",
        "active",
        "user_id",
        "genre_id",
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function chapitres() {
        return $this->hasMany(Chapitre::class);
    }

    /**
     * @return Model|HasMany|object|null
     */
    public function premier() {
        return $this->chapitres()->where("premier", true)->first();
    }

    public function genre() {
        return $this->belongsTo(Genre::class);
    }

    public function avis() {
        return $this->hasMany(Avis::class, 'histoire_id');
    }

    public function terminees() {
        return $this->belongsToMany(User::class, "terminees", "histoire_id", "user_id")->withPivot("nombre");
    }

    public function add_avis(string $contenu, int $user_id, int $id_histoire) : void
    {
        $this->avis()->create([
            'contenu' => $contenu,
            'user_id' => $user_id,
            'histoire_id' => $id_histoire,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function delete_avis(int $id_avis) : void
    {
        $this->avis()->where('id', $id_avis)->delete();
    }

}
