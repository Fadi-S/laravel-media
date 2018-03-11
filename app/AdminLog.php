<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminLog extends Model
{
    protected $guarded = [];
    protected $dates = ['done_at'];
    protected $table = 'admin_log';
    public $timestamps = false;

    public function logable()
    {
        return $this->morphTo();
    }

    public function setMessageAttribute($message) {
        $this->attributes['message'] = json_encode($message);
    }

    public function getChangeMessageAttribute($message) {
        return json_decode($message, true);
    }

    public function action()
    {
        $change = $this->change_message;
        reset($change);
        return key($change);
    }

    public function humanReadableType()
    {
        return str_replace('App\\', '', $this->logable_type);
    }

    public function admin()
    {
        return $this->hasOne(Admin::class, 'id', 'admin_id');
    }

    public function old()
    {
        return $this->change_message['updated']['old'];
    }

    public function new()
    {
        return $this->change_message['updated']['new'];
    }

    public function restoredBy()
    {
        return $this->hasOne(Admin::class, 'id', 'restored_by');
    }

    public function isRestored()
    {
        return !is_null($this->restored);
    }
}
