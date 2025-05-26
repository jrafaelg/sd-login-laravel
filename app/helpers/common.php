<?php

use App\facade\ViewFacade;


/**
 * adicionar ao composer.json
 * "files": [
 *      "app/Helpers/common.php"
 * ]
 * 
 * e rodar o comando:
 * composer dump-autoload
 * 
 */

if (! function_exists('viewLib')) {

    /**
     * Get the evaluated view contents for the given view.
     *
     * @param  string|null  $view
     * @param  \Illuminate\Contracts\Support\Arrayable|array  $data
     * @param  array  $mergeData
     * @return ($view is null ? \Illuminate\Contracts\View\Factory : \Illuminate\Contracts\View\View)
     */
    function viewLib($view = null, $data = [], $mergeData = [])
    {
        $app = app(ViewFacade::class);

        if (func_num_args() === 0) {
            return $app;
        }

        return app('viewFacade')->viewL($view, $data, $mergeData);

        return $app->viewL($view, $data, $mergeData);
    }
}
