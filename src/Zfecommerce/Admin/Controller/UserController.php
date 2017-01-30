<?php

namespace Zfecommerce\Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Authentication\AuthenticationServiceInterface;
use Zend\Form\Annotation\AnnotationBuilder;
use Zfecommerce\Admin\Model\User;

class UserController extends AbstractActionController
{

    protected $form;
    private $table;
    protected $authservice;

    public function __construct(AuthenticationServiceInterface $authService)
    {
        $this->authservice = $authService;
    }

    public function getAuthService()
    {
        return $this->authservice;
    }

    public function getForm()
    {
        if (!$this->form) {
            $user = new User();
            $builder = new AnnotationBuilder();
            $this->form = $builder->createForm($user);
        }

        return $this->form;
    }

    public function indexAction()
    {
        if (! $this->authservice->hasIdentity()){
            return $this->redirect()->toRoute('login');
        }

        return new ViewModel();
    }

    public function registerAction() {
        //if already login, redirect to success page
        if ($this->getAuthService()->hasIdentity()) {
            return $this->redirect()->toRoute('success');
        }
        $user = new User();
        $form = $this->getForm();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->bind($user);
            $form->setData($request->getPost());
            if ($form->isValid()) {
                print_r($form->getData());
            }
        }
        else {
            $data = array(
                'form' => $form,
                'messages' => $this->flashmessenger()->getMessages()
            );
            $view = new ViewModel($data);
            $view->setTemplate('zfecommerce/admin/user/register');
            return $view;
        }
    }
}