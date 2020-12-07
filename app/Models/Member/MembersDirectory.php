<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembersDirectory extends Model
{
    use HasFactory;

    public function media()
    {
        return $this->hasMany('\App\Models\Media', 'type_id')->where('type', 'directory_id');
    }

    public function background()
    {
        return $this->hasOne('\App\Models\Media', 'type_id')->where('type', 'directory_id')->orderBy('id', 'ASC');
    }
}
