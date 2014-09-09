<?php
/**
 * Created by PhpStorm.
 * User: jasonjones
 * Date: 8/24/14
 * Time: 11:11 PM
 */

namespace Larabook\Registration;

use Laracasts\Commander\CommandHandler;
use Larabook\Users\UserRepository;
use Larabook\Users\User;
use Laracasts\Commander\Events\DispatchableTrait;

class RegisterUserCommandHandler implements CommandHandler{

    use DispatchableTrait;
    protected $repository;

    function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    //Handle the command
    public function handle($command)
    {
        $user = User::register(
           $command->username, $command->email, $command->password
        );

        $this->repository->save($user);

        $this->dispatchEventsFor($user);

        return $user;
    }
} 