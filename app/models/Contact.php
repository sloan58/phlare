<?php

class Contact extends Eloquent
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contacts()
    {
        return $this->hasMany('Contact');
    }

}