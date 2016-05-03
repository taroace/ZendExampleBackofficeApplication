<?php
namespace Formulaire_User\Form;

use Zend\Form\Form;

class CustomerForm extends Form
{
    public function __construct ($name = null)
    {
    	// on ignore le nom passé
    	parent::__construct('customer');
    	$this->setAttribute('method', 'post');
    	$this->setAttribute('enctype', 'multipart/form-data');
    	$this->add(array(
    			'name' => 'customer_id',
    			'attributes' => array(
    					'type' => 'hidden'
    			)
    	));
    	$this->add(array(
    			'name' => 'user_id',
    			'attributes' => array(
    					'type' => 'hidden'
    			)
    	));
    	$this->add(array(
    			'name' => 'customer_name',
    			'attributes' => array(
    					'type' => 'text'
    			),
    			'options' => array(
    					'label' => 'Nom de la société'
    			)
    	));
    
    	$this->add(array(
    			'name' => 'customer_company_number',
    			'attributes' => array(
    					'type' => 'text'
    			),
    			'options' => array(
    					'label' => 'Numéro de déclaration ou d\'agrément'
    			)
    	));
    	
    	$this->add(array(
    			'name' => 'customer_validate',
    			'type' => 'Zend\Form\Element\Radio',
            'options' => array(
                'label' => 'Validation',
                'value_options' => array(
                    '1' => 'Oui',
                    '0' => 'Non'
                )
            )
    	));
    	$this->add(array(
    			'name' => 'customer_number',
    			'attributes' => array(
    					'type' => 'text'
    			),
    			'options' => array(
    					'label' => 'Numéro client'
    			)
    	));
    	$this->add(array(
    			'name' => 'customer_telephone',
    			'attributes' => array(
    					'type' => 'text'
    			),
    			'options' => array(
    					'label' => 'Numéro de téléphone'
    			)
    	));
    	
    	$this->add(array(
    			'name' => 'customer_fax',
    			'attributes' => array(
    					'type' => 'text'
    			),
    			'options' => array(
    					'label' => 'Numéro de fax'
    			)
    	));
    	
    	$this->add(array(
    			'name' => 'customer_address',
    			'attributes' => array(
    					'type' => 'text'
    			),
    			'options' => array(
    					'label' => 'Adresse'
    			)
    	));
    	
    	$this->add(array(
    			'name' => 'customer_zipcode',
    			'attributes' => array(
    					'type' => 'text'
    			),
    			'options' => array(
    					'label' => 'Code postal'
    			)
    	));
    	
    	$this->add(array(
    			'name' => 'customer_city',
    			'attributes' => array(
    					'type' => 'text'
    			),
    			'options' => array(
    					'label' => 'Ville'
    			)
    	));
    	
    	$this->add(array(
    			'name' => 'customer_country',
    			'attributes' => array(
    					'type' => 'text'
    			),
    			'options' => array(
    					'label' => 'Pays'
    			)
    	));
    	
    	$this->add(array(
    			'name' => 'customer_type',
    			'type' => 'Zend\Form\Element\Radio',
    			'options' => array(
    					'label' => 'Type de client',
    					'value_options' => array(
    							'Entreprise' => 'Entreprise',
    							'Association' => 'Association'
    					)
    			)
    	));
    	
    	$this->add(array(
    			'name' => 'customer_logo_path',
    			'attributes' => array(
    					'type' => 'text'
    			),
    			'options' => array(
    					'label' => 'Chemin du logo'
    			)
    	));
    	
    	$this->add(array(
    			'name' => 'customer_sponsoring_number',
    			'attributes' => array(
    					'type' => 'hidden'
    			)
    	));
    	
    	$this->add(array(
    			'name' => 'customer_folder_path',
    			'attributes' => array(
    					'type' => 'text'
    			),
    			'options' => array(
    					'label' => 'Chemin du dossier'
    			)
    	));
    	
    	$this->add(array(
    			'name' => 'admin_id',
    			'attributes' => array(
    					'type' => 'text'
    			),
    			'options' => array(
    					'label' => 'Administration'
    			)
    	));
    	
    	$this->add(array(
    			'name' => 'commercial_id',
    			'attributes' => array(
    					'type' => 'text'
    			),
    			'options' => array(
    					'label' => 'Commercial'
    			)
    	));
    	
    	$this->add(array(
    			'name' => 'submit',
    			'attributes' => array(
    					'type' => 'submit',
    					'value' => 'Valider',
    					'id' => 'submitbutton'
    			)
    	));
    }
    
}