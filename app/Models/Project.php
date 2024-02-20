<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table = 'projects';
    protected $fillable = ['title', 'type_id', 'user_id', 'description', 'date', 'complete'];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    // tabella ponte manyToMany
    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
