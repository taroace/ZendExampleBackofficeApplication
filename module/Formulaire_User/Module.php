<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Formulaire_User for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Formulaire_User;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
/* use Zend\Mvc\ModuleRouteListener; */
use Formulaire_User\Model\User;
use Formulaire_User\Model\UserTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Formulaire_User\Model\Customer;
use Formulaire_User\Model\CustomerTable;

class Module implements AutoloaderProviderInterface
{

    public function getAutoloaderConfig ()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php'
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    // if we're in a namespace deeper than one level we need to fix the \ in the path
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__
                )
            )
        );
    }

    public function getConfig ()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
    /*
     * public function onBootstrap($e) { // You may not need to do this if you're doing it elsewhere in your // application $eventManager = $e->getApplication()->getEventManager(); $moduleRouteListener = new ModuleRouteListener(); $moduleRouteListener->attach($eventManager); }
     */
    public function getServiceConfig ()
    {
        return array(
            'factories' => array(
                'Formulaire_User\Model\UserTable' => function  ($sm)
                {
                    $tableGateway = $sm->get('UserTableGateway');
                    $table = new UserTable($tableGateway);
                    return $table;
                },
                'UserTableGateway' => function  ($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new User());
                    return new TableGateway('user', $dbAdapter, null, $resultSetPrototype);
                },
                'Formulaire_User\Model\CustomerTable' => function  ($sm)
                {
                	$tableGateway = $sm->get('CustomerTableGateway');
                	$table = new CustomerTable($tableGateway);
                	return $table;
                },
                'CustomerTableGateway' => function  ($sm)
                {
                	$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                	$resultSetPrototype = new ResultSet();
                	$resultSetPrototype->setArrayObjectPrototype(new Customer());
                	return new TableGateway('customer', $dbAdapter, null, $resultSetPrototype);
                }
            )
        );
    }
}
