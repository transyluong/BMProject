<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetailModel extends Model
{
    use HasFactory;
    protected $table = 'tbloderdetail';

    public function belongtoOrder(){
        return $this->belongsTo(OrderModel::class,'oid','odid');
    }

    public function belongtoProduct(){
        return  $this->belongsTo(ProductModel::class,'pid','odid');
    }
}
