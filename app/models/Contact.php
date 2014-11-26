<?php

use Illuminate\Database\Eloquent\Model as Eloquent;


class Contact extends Eloquent
{
    protected $fillable = ['firstname','lastname','dial_profile','user_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo('User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function numbers()
    {
        return $this->hasMany('Number');
    }

    public static function boot()
    {
        parent::boot();

        static::deleted(function($contact)
        {
            $contact->numbers()->delete();
        });
    }
}