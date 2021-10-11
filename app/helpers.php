<?php
/**
 * Retrieve our Locale instance
 *
 * @return App\Locale
 */
function locale()
{
    return app()->make(App\Locale::class);
}