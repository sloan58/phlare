<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Number extends Eloquent
{
    protected $fillable = ['number','label','contact_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contacts()
    {
        return $this->belongsTo('Contact');
    }

}