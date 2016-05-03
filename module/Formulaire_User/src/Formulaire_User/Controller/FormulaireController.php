<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Formulaire_User for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Formulaire_User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Formulaire_User\Model\User;
use Formulaire_User\Form\UserForm;
use Formulaire_User\Model\Customer;
use Formulaire_User\Form\CustomerForm;

class FormulaireController extends AbstractActionController
{

    protected $userTable;
    protected $customerTable;

    public function indexAction ()
    {
        
    }
    
    public function listuserAction ()
    {
    	return new ViewModel(array(
    			'users' => $this->getUserTable()->fetchAll()
    	));
    }

    public function adduserAction ()
    {
        $form = new UserForm();
        $form->get('submit')->setValue('Ajouter');
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $user = new User();
            $form->setInputFilter($user->getInputFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $user->exchangeArray($form->getData());
                $this->getUserTable()->saveUser($user);
                
                // redirige vers la liste des utilisateurs
                return $this->redirect()->toRoute('user');
            }
        }
        return array(
            'form' => $form
        );
    }

    public function edituserAction ()
    {
        $user_id = (int) $this->params()->fromRoute('user_id', 0);
        if (! $user_id) {
            return $this->redirect()->toRoute('user', array(
                'action' => 'adduser'
            ));
        }
        try {
            $user = $this->getUserTable()->getUser($user_id);
        } catch (\Exception $ex) {
            return $this->redirect()->toRoute('user', array(
                'action' => 'listuser'
            ));
        }        
        $form = new UserForm();
        $form->bind($user);
        $form->get('submit')->setAttribute('value', 'Modifier');        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($user->getInputFilter());
            $form->setData($request->getPost());            
            if ($form->isValid()) {
                $this->getUserTable()->saveUser($form->getData());                
                return $this->redirect()->toRoute('user');
            }
        }        
        return array(            
            'form' => $form,
            'user_id' => $user_id
        );
    }

    public function deleteuserAction ()
    {
        $user_id = (int) $this->params()->fromRoute('user_id', 0);
        if (! $user_id) {
            return $this->redirect()->toRoute('user');
        }
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'Non');
            
            if ($del == 'Oui') {
                $user_id = (int) $request->getPost('user_id');
                $this->getUserTable()->deleteUser($user_id);
            }
            
            // Rediriger vers la liste des utilisateurs
            return $this->redirect()->toRoute('user');
        }
        
        return array(
            'user_id' => $user_id,
            'user' => $this->getUserTable()->getUser($user_id)
        );
    }

    public function addcustomerAction(){
        $form = new CustomerForm();
        $form->get('submit')->setValue('Ajouter');
        
        $request = $this->getRequest();
        if ($request->isPost()) {
        	$customer = new Customer();
        	$form->setInputFilter($customer->getInputFilter());
        	$form->setData($request->getPost());
        
        	if ($form->isValid()) {
        		$customer->exchangeArray($form->getData());
        		$this->getCustomerTable()->saveCustomer($customer);
        
        		// redirige vers la liste des utilisateurs
        		return $this->redirect()->toRoute('customer');
        	}
        }
        return array(
        		'form' => $form
        );
    }
    
    public function deletecustomerAction(){
        $customer_id = (int) $this->params()->fromRoute('customer_id', 0);
        if (! $customer_id) {
        	return $this->redirect()->toRoute('customer');
        }
        
        $request = $this->getRequest();
        if ($request->isPost()) {
        	$del = $request->getPost('del', 'Non');
        
        	if ($del == 'Oui') {
        		$customer_id = (int) $request->getPost('customer_id');
        		$this->getUserTable()->deleteCustomer($customer_id);
        	}
        
        	// Rediriger vers la liste des utilisateurs
        	return $this->redirect()->toRoute('customer');
        }
        
        return array(
        		'customer_id' => $customer_id,
        		'customer' => $this->getCustomerTable()->getCustomer($customer_id)
        );
    }

    public function editcustomerAction(){
        $customer_id = (int) $this->params()->fromRoute('customer_id', 0);
        if (! $customer_id) {
        	return $this->redirect()->toRoute('customer', array(
        			'action' => 'addcustomer'
        	));
        }
        
        // obtenir l'utilisateur avec l'identifiant spécifique.
        // Une exception est lancée s'il n'est pas trouvé et retourne
        // à la page listcustomer
        try {
        	$customer = $this->getCustomerTable()->getCustomer($customer_id);
        } catch (\Exception $ex) {
        	return $this->redirect()->toRoute('customer', array(
        			'action' => 'listcustomer'
        	));
        }
        
        $form = new CustomerForm();
        $form->bind($customer);
        $form->get('submit')->setAttribute('value', 'Modifier');
        
        $request = $this->getRequest();
        if ($request->isPost()) {
        	$form->setInputFilter($customer->getInputFilter());
        	$form->setData($request->getPost());
        
        	if ($form->isValid()) {
        		$this->getCustomerTable()->saveCustomer($form->getData());
        
        		// redirige vers la liste des clients
        		return $this->redirect()->toRoute('customer');
        	}
        }
        
        return array(
        
        		'form' => $form,
        		'customer_id' => $customer_id
        );
    }
    
    public function listcustomerAction(){
        return new ViewModel(array(
        		'customers' => $this->getCustomerTable()->fetchAll()
        ));
    }
    
    public function getUserTable ()
    {
        if (! $this->userTable) {
            $sm = $this->getServiceLocator();
            $this->userTable = $sm->get('Formulaire_User\Model\UserTable');
        }
        return $this->userTable;
    }
    
    public function getCustomerTable ()
    {
    	if (! $this->customerTable) {
    		$sm = $this->getServiceLocator();
    		$this->customerTable = $sm->get('Formulaire_User\Model\CustomerTable');
    	}
    	return $this->customerTable;
    }
}
