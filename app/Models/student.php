<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;

    protected $primaryKey = 'nim';
    protected $keyType = 'string';

    protected $fillable = ['nim', 'nama', 'alamat', 'no_telp', 'tgl_lahir', 'jurusan'];

    public function projects(){
        return $this->belongsToMany(Project::class, 'members', 'nim', 'project_id')->withPivot('created_at');
    }
}
