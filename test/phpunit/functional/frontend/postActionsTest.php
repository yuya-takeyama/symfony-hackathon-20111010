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
      end()->

      with('response')->begin()->
        isStatusCode(200)->
        checkElement('body', '/Blog posts/')->
      end()
    ;
  }
}
