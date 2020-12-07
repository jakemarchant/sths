<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    public function media()
    {
        return $this->hasMany('\App\Models\Media', 'type_id')->where('type', 'product_id');
    }

    public function background()
    {
        return $this->hasOne('\App\Models\Media', 'type_id')->where('type', 'product_id')->orderBy('id', 'ASC');
    }

    public function getStatusAttribute($value)
    {
        if($value){
            return $value;
        }

        if($this->active == '0'){
            return 'Inactive';
        }

        return 'Active';
    }
}
