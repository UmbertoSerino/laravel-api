<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Technology extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'doc_link',
        'version',
        'released_date',
        'icon'
    ];
    // relazione manyToMany su project
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
