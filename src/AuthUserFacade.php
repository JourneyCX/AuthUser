<?php

namespace JourneyCX\AuthUser;

/*
 * Facade for AuthUser
 *-------------------------------------------------------- */

use Illuminate\Support\Facades\Facade;

/**
 * AuthUser.
 *-------------------------------------------------------------------------- */
class AuthUserFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'authuser';
    }
}
