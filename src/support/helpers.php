<?php
    /**
     * AuthUser Helpers.
     * 
     * Common helper functions for AuthUser applications
     *
     *-------------------------------------------------------- */
/*
    * Check if access available
    *
    * @param string $accessId
    * 
    * @return bool.
    *-------------------------------------------------------- */

    if (!function_exists('canAccess')) {
        function canAccess($accessId = null)
        {
            if(is_array($accessId)) {
                return array_merge(
                    AuthUser::check($accessId),
                    AuthUser::isPublicAccess($accessId)
                );
            }

            if(AuthUser::check($accessId) === false) {

                if(AuthUser::isPublicAccess($accessId)) {
                    return true;
                }

                return false;
            }

            return true;
        }
    }

    /*
    * Check if access available
    *
    * @param string $accessId
    * 
    * @return bool.
    *-------------------------------------------------------- */
    if (!function_exists('canPublicAccess')) {
        function canPublicAccess($accessId = null)
        {
            return ::isPublicAccess($accessId);
        }
    }

    /*
    * Check for entity access
    *
    * @param string $accessId
    * 
    * @return bool.
    *-------------------------------------------------------- */

    if (!function_exists('canAccessEntity')) {
        function canAccessEntity($entityKey, $entityId, $accessId = null)
        {
            if(is_array($accessId)) {
                return array_merge(
                    AuthUser::isPublicAccess($accessId)
                );
            }

            // check for entity permissions  
            if(AuthUser::checkEntity($entityKey, $entityId)->check($accessId) === true 
                or AuthUser::isPublicAccess($accessId)) {

                return true;
            }

            return false;
        }
    }