<?php

namespace App\Pages\Admin;

use Quantum\Authorization;
use Quantum\BasePage;
use Quantum\Core;
use Smarty;

class About extends BasePage{
    use Authorization;

    /**
     * Automatic called before smarty display is called
     * @param $core Core
     * @param $smarty Smarty
     * @return void
     */
    public function preRender($core, $smarty)
    {
        // TODO: Implement preRender() method.
    }

    /**
     * Automatic called after preRender and before smarty display is called
     * @param $core Core
     * @param $smarty Smarty
     * @return string template file for page content
     */
    public function getTemplate($core, $smarty){
        return 'pages/admin/about.tpl';
    }

    /**
     * Automatic called after smarty display is called. Example usage: clean up cache
     * @param $core Core
     * @param $smarty Smarty
     * @return void
     */
    public function postRender($core, $smarty)
    {
        // TODO: Implement postRender() method.
    }
}