<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserProductSubscription extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'user_product_subscription';

    protected $fillable = [
        'user_id',
        'product_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public static function addSubscription($userId, $productId)
    {
        $subscriptionObj = new UserProductSubscription();
        $subscriptionObj->user_id = $userId;
        $subscriptionObj->product_id = $productId;
        $subscriptionObj->save();
    }
}
