<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    use HasFactory;

    public function directory()
    {
        return $this->hasOne('\App\Models\Member\MembersDirectory', 'member_id');
    }

    public function products()
    {
        return $this->hasMany('\App\Models\Product\Products', 'member_id')->orderBy('id', 'DESC');
    }

}
