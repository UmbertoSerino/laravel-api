<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Type extends Model
{
    use HasFactory;
    public $table = 'types';
    protected $fillable = ['name'];

    public function project()
    {

        return $this->hasMany(Project::class);
    }
}
