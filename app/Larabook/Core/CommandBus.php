<?php
/**
 * Created by PhpStorm.
 * User: jasonjones
 * Date: 8/25/14
 * Time: 8:18 AM
 */

namespace Larabook\Core;
use App;

trait CommandBus {
    //Execute command
    public function execute($command)
    {
        return $this->getCommandBus()->execute($command);
    }

    //Fetch the command bus
    public function getCommandBus()
    {
        return App::make('Laracasts\Commander\CommandBus');
    }
} 