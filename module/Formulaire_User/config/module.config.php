<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Formulaire_User\Controller\Formulaire' => 'Formulaire_User\Controller\FormulaireController'
        )
    ),
    'router' => array(
        'routes' => array(
            'user' => array(
                'type' => 'segment',
                'options' => array(
                    // Change this to something specific to your module
                    'route' => '/user[/][:action][/:user_id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'user_id' => '[0-9]+'
                    ),
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        
                        'controller' => 'Formulaire_User\Controller\Formulaire',
                        'action' => 'listuser'
                    )
                )
            ),
            'backoffice' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/backoffice',
                    'defaults' => array(
                        'controller' => 'Formulaire_User\controller\Formulaire',
                        'action' => 'index'
                    )
                )
            ),
            'customer' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/customer[/][:action][/:customer_id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'customer_id' => '[0-9]+'
                    ),
                    'defaults' => array(
                        'controller' => 'Formulaire_User\controller\Formulaire',
                        'action' => 'listcustomer'
                    )
                )
            )
        )
        
    )
    ,
    'view_manager' => array(
        'template_path_stack' => array(
            'user' => __DIR__ . '/../view'
        )
    )
);
