<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = ['name', 'url', 'key'];

    public function logs()
    {
        return $this->hasMany(SubscriptionLog::class);
    }
}
