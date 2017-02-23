<?php

namespace App\Http\Middleware;

use Closure;

/**
 * Class RouteNeedsPacket
 * @package App\Http\Middleware
 */
class RouteNeedsPacket
{

	/**
     * @param $request
     * @param Closure $next
     * @param $packet
     * @param bool $needsAll
     * @return mixed
     */
    public function handle($request, Closure $next, $packet, $needsAll = false)
    {
        /**
         * Packets array
         */
        if (strpos($packet, ";") !== false) {
            $packets = explode(";", $packet);
            $access = access()->hasPacks($packets, ($needsAll === "true" ? true : false));
        } else {
            /**
             * Single pack
             */
            $access = access()->hasPack($pack);
        }


        if (! $access) {
            return redirect()
                ->route('frontend.index')
                ->withFlashDanger(trans('auth.general_error'));
        }

        return $next($request);
    }
}