<?php

namespace Zfecommerce\Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Authentication\AuthenticationServiceInterface;
use Zfecommerce\Admin\Form\LoginForm;
use Zfecommerce\Admin\Model\User;
use Zfecommerce\Admin\Model\UserTable;
use Zfecommerce\Admin\Form\UserForm;

class UserController extends AbstractActionController
{

    protected $form;
    private $table;
    protected $storage;
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

    public function indexAction()
    {
        if (! $this->authservice->hasIdentity()){
            return $this->redirect()->toUrl('user/login');
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

    public function loginAction(){
        //if already login, redirect to success page
        if ($this->getAuthService()->hasIdentity()) {
            return $this->redirect()->toRoute('success');
        }
        $form = new LoginForm();
        $data = [
            'form'      => $form,
            'messages'  => $this->flashmessenger()->getMessages(),
        ];
        $view = new ViewModel($data);
        $view->setTemplate('zfecommerce/admin/user/login');
        return $view;
    }

    public function getSessionStorage()
    {
        if (!$this->storage) {
            $this->storage = $this->getServiceLocator()
                ->get('Zfecommerce\Admin\Model\MyAuthStorage');
        }

        return $this->storage;
    }

    public function authenticateAction() {
        $form = new LoginForm();
        $redirect = 'login';
        $request = $this->getRequest();
        if($request->isPost()) {
            $form->setData($request->getPost());
            if($form->isValid()) {
                //check authentication...
                $this->getAuthService()->getAdapter()
                    ->setIdentity($request->getPost('email'))
                    ->setCredential($request->getPost('password'));
                $result = $this->getAuthService()->authenticate();
                foreach($result->getMessages() as $message) {
                    //save message temporary into flashmessenger
                    $this->flashMessenger()->addMessage($message);
                }
                if($result->isValid()) {
                    $redirect = 'user';
                    //check if it has rememberMe :
                    if($request->getPost('rememberme') == 1) {
                        $this->getSessionStorage()
                            ->setRememberMe(1);
                        //set storage again
                        $this->getAuthService()->setStorage($this->getSessionStorage());
                    }
                    $this->getAuthService()->getStorage()->write($request->getPost('email'));
                }
            }
        }
        return $this->redirect()->toUrl($redirect);
    }

    public function logoutAction()
    {
        $this->getSessionStorage()->forgetMe();
        $this->getAuthService()->clearIdentity();

        $this->flashmessenger()->addMessage("You've been logged out");
        return $this->redirect()->toRoute('login');
    }

}





























