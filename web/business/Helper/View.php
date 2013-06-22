<?php
namespace Helper;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Symfony\Component\HttpFoundation\Response;

class View implements ServiceProviderInterface
{
    protected $app = null;
    public function register(Application $app)
    {
        $thisVar = $this;
        $app['helper.view'] = $app->protect(function ($templateFile, $data = array()) use ($app, $thisVar) {            
            extract($data);
            ob_start();
            include APP_VIEW_DIR.'/'.$templateFile;
            $out = ob_get_contents();
            ob_end_clean();

            return new Response($out);
        });        
    }

    public function boot(Application $app)
    {
    }

}
