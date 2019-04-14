<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubscriptionLog extends Model
{
    protected $fillable = ['subscription_id', 'status', 'event', 'unit'];
}
