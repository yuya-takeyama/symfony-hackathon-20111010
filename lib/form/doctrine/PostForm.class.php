<?php

/**
 * Post form.
 *
 * @package    blog
 * @subpackage form
 * @author     Yuya Takeyama
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PostForm extends BasePostForm
{
    public function configure()
    {
        $this->useFields(array('id', 'title', 'body'));

        $ws = $this->getWidgetSchema();
        $ws['title']->setAttribute('maxlength', 50);
        $ws['body']->setAttribute('cols', 80)
                   ->setAttribute('rows', 8);

        $vs = $this->getValidatorSchema();
        $vs['title']->setOption('required', true)
                    ->setMessage('required', '未入力です');
        $vs['body']->setOption('required', true)
                   ->setMessage('required', '未入力です');
    }
}
