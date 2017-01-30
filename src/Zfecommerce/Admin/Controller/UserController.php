<?php

namespace Zfecommerce\Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Authentication\AuthenticationServiceInterface;
use Zend\Form\Annotation\AnnotationBuilder;
use Zfecommerce\Admin\Model\User;
use Zfecommerce\Admin\Model\UserTable;
use Zfecommerce\Admin\Form\UserForm;

class UserController extends AbstractActionController
{

    protected $form;
    private $table;
    protected $authservice;

    public function __construct(UserTable $table,AuthenticationServiceInterface $authService)
    {
        $this->authservice = $authService;
        $this->table = $table;
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
        $form = new UserForm();
        $form->get('submit')->setValue('Register');
        $request = $this->getRequest();

        if ($request->isPost()) {
            $form->setInputFilter($user->getInputFilter());
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $user->exchangeArray($form->getData());
                $this->table->saveUser($user);
                // Redirect to list of users
                return $this->redirect()->toRoute('user');
            }
        }
        $data = array(
           'form' => $form,
        );
        $view = new ViewModel($data);
        $view->setTemplate('zfecommerce/admin/user/register');
        return $view;
    }
}