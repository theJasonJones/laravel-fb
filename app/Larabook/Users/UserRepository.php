<?php namespace Larabook\Users;

class UserRepository{

    //Persist a user
    public function save(User $user)
    {
        return $user->save();
    }
}