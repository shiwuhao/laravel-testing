<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name'];

    public function add($team)
    {
        $this->isTooManyMembers();

        return $this->member()->save($team);
    }

    public function member()
    {
        return $this->hasMany(User::class);
    }

    public function count()
    {
        return $this->member()->count();
    }

    public function isTooManyMembers()
    {
        if ($this->count() >= $this->size) {
            throw new \Exception('Two Many Members');
        }
    }
}
