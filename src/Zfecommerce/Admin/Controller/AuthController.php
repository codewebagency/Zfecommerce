<?php

namespace Zfecommerce\Admin\Controller;

use Zend\Authentication\AuthenticationServiceInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Form\Annotation\AnnotationBuilder;
use Zend\View\Model\ViewModel;

use Zfecommerce\Admin\Model\User;

class AuthController extends AbstractActionController
{
    protected $form;
    protected $storage;
    protected $authservice;

    public function __construct(AuthenticationServiceInterface $authService)
    {
        $this->authservice = $authService;
    }

    public function getAuthService()
    {
        return $this->authservice;
    }

    public function getSessionStorage()
    {
        if (!$this->storage) {
            $this->storage = $this->getServiceLocator()
                ->get('Zfecommerce\Admin\Model\MyAuthStorage');
        }

        return $this->storage;
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

    public function loginAction()
    {
        //if already login, redirect to success page
        if ($this->getAuthService()->hasIdentity()) {
            return $this->redirect()->toRoute('success');
        }

        $form = $this->getForm();

        $data = array(
            'form' => $form,
            'messages' => $this->flashmessenger()->getMessages()
        );
        $view = new ViewModel($data);
        $view->setTemplate('zfecommerce/admin/auth/login');
        return $view;
    }

    public function authenticateAction()
    {
        $form = $this->getForm();
        $redirect = 'login';

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                //check authentication...
                $this->getAuthService()->getAdapter()
                    ->setIdentity($request->getPost('email'))
                    ->setCredential($request->getPost('password'));

                $result = $this->getAuthService()->authenticate();
                foreach ($result->getMessages() as $message) {
                    //save message temporary into flashmessenger
                    $this->flashmessenger()->addMessage($message);
                }

                if ($result->isValid()) {
                    $redirect = 'success';
                    //check if it has rememberMe :
                    if ($request->getPost('rememberme') == 1) {
                        $this->getSessionStorage()
                            ->setRememberMe(1);
                        //set storage again
                        $this->getAuthService()->setStorage($this->getSessionStorage());
                    }
                    $this->getAuthService()->getStorage()->write($request->getPost('email'));
                }
            }
        }

        return $this->redirect()->toRoute($redirect);
    }

    public function logoutAction()
    {
        $this->getSessionStorage()->forgetMe();
        $this->getAuthService()->clearIdentity();

        $this->flashmessenger()->addMessage("You've been logged out");
        return $this->redirect()->toRoute('login');
    }
}