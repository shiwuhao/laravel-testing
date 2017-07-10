<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Team
 * @package App
 */
class Team extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @param $user
     * @return mixed
     */
    public function add($users)
    {
        $this->isTooManyMembers($users);

        $method = $users instanceof User ? 'save' : 'saveMany';

        return $this->member()->$method($users);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function member()
    {
        return $this->hasMany(User::class);
    }

    /**
     * @return mixed
     */
    public function count()
    {
        return $this->member()->count();
    }


    /**
     * @param $users
     * @throws \Exception
     */
    public function isTooManyMembers($users)
    {
        $newTeamCount = $this->count() + count($users);

        if ($newTeamCount > $this->size) {
            throw new \Exception('Two Many Members');
        }
    }

    /**
     * @param $users
     * @return bool|mixed
     */
    public function remove($users)
    {
        if ($users instanceof User) {
            return $users->update(['team_id' => null]);
        }

        return $this->removeMany($users);
    }

    /**
     * @param $users
     * @return mixed
     */
    public function removeMany($users)
    {
        return $this->member()->whereIn('id', $users->pluck('id'))->update(['team_id' => null]);
    }

    /**
     * @return int
     */
    public function resize()
    {
        return $this->member()->update(['team_id' => null]);
    }
}
