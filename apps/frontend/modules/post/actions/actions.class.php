<?php

/**
 * post actions.
 *
 * @package    blog
 * @subpackage post
 * @author     Yuya Takeyama
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class postActions extends sfActions
{
    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {
        $style = $request->getParameter('style');
        if (isset($style)) {
            $this->setLayout("layout/{$style}");
            $this->setTemplate("{$style}/index");
        }
        $this->posts = Doctrine_Core::getTable('Post')->findAll();
    }

    /**
     * Executes new action
     *
     * @param sfRequest $request A request object
     */
    public function executeNew(sfWebRequest $request)
    {
        $this->form = new PostForm;
        if ($request->isMethod(sfRequest::POST)) {
            $this->form->bind($request->getParameter($this->form->getName()));
        }
        if ($this->form->isValid()) {
            $this->form->save();
            $this->getUser()->setFlash('info', 'データを保存しました。');
            $this->redirect('post/index');
        }
    }

    /**
     * Executes edit action
     *
     * @param sfRequest $request A request object
     */
    public function executeEdit(sfWebRequest $request)
    {
        $id = $request->getParameter('id');
        $this->forward404Unless($id);
        $this->form = new PostForm(
            Doctrine_Core::getTable('Post')->findOneById($id)
        );
        if ($request->isMethod(sfRequest::PUT)) {
            $this->form->bind($request->getParameter($this->form->getName()));
            if ($this->form->isValid()) {
                $this->form->save();
                $this->getUser()->setFlash('info', 'データを更新しました。');
                $this->redirect('post/index');
            }
        }
    }

    /**
     * Executes delete action
     *
     * @param sfRequest $request A request object
     */
    public function executeDelete(sfWebRequest $request)
    {
        $id = $request->getParameter('id');
        $this->forward404Unless($id);
        Doctrine_Query::create()
            ->delete()
            ->from('Post p')
            ->where('p. id = ?', $id)
            ->execute();
        $this->getUser()->setFlash('info', 'データを削除しました。');
        $this->redirect('post/index');
    }
}
