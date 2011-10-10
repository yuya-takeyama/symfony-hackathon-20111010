<?php
require_once dirname(__FILE__).'/../../bootstrap/functional.php';

class functional_frontend_postActionsTest extends sfPHPUnitBaseFunctionalTestCase
{
    protected function getApplication()
    {
        return 'frontend';
    }

    public function testDefault()
    {
        $browser = $this->getBrowser();

        $browser->
            get('/post/index')->

            with('request')->begin()->
                isParameter('module', 'post')->
                isParameter('action', 'index')->
                isParameter('style',  NULL)->
            end()->

            with('response')->begin()->
                isStatusCode(200)->
                checkElement('body', '/Blog posts/')->
                matches('#/css/main.css#')->
            end()
        ;
    }

    public function testDefaultWithStyleParameter()
    {
        $browser = $this->getBrowser();

        $browser->
            get('/black/post/index')->

            with('request')->begin()->
                isParameter('module', 'post')->
                isParameter('action', 'index')->
                isParameter('style',  'black')->
            end()->

            with('response')->begin()->
                isStatusCode(200)->
                checkElement('body', '/Blog posts/')->
                matches('#/css/themes/black/main.css#')->
            end()
        ;
    }
}
