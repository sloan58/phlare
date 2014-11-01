<?php

class Number extends Eloquent
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function numbers()
    {
        return $this->hasMany('Number');
    }

}