<?php
namespace Formulaire_User\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Customer implements InputFilterAwareInterface
{

    public $customer_id;

    public $user_id;

    public $customer_name;

    public $customer_company_number;

    public $customer_validate;

    public $customer_number;

    public $customer_telephone;

    public $customer_fax;

    public $customer_address;

    public $customer_zipcode;

    public $customer_city;

    public $customer_country;

    public $customer_type;

    public $customer_logo_path;

    public $customer_sponsoring_number;

    public $customer_folder_path;

    public $admin_id;

    public $commercial_id;

    protected $inputFilter;

    public function exchangeArray ($data)
    {
        $this->customer_id = (isset($data['customer_id'])) ? $data['customer_id'] : null;
        $this->user_id = (isset($data['user_id'])) ? $data['user_id'] : null;
        $this->customer_name = (isset($data['customer_name'])) ? $data['customer_name'] : null;
        $this->customer_company_number = (isset($data['customer_company_number'])) ? $data['customer_company_number'] : null;
        $this->customer_validate = (isset($data['customer_validate'])) ? $data['customer_validate'] : null;
        $this->customer_number = (isset($data['customer_number'])) ? $data['customer_number'] : null;
        $this->customer_telephone = (isset($data['customer_telephone'])) ? $data['customer_telephone'] : null;
        $this->customer_fax = (isset($data['customer_fax'])) ? $data['customer_fax'] : null;
        $this->customer_address = (isset($data['customer_address'])) ? $data['customer_address'] : null;
        $this->customer_zipcode = (isset($data['customer_zipcode'])) ? $data['customer_zipcode'] : null;
        $this->customer_city = (isset($data['customer_city'])) ? $data['customer_city'] : null;
        $this->customer_country = (isset($data['customer_country'])) ? $data['customer_country'] : null;
        $this->customer_type = (isset($data['customer_type'])) ? $data['customer_type'] : null;
        $this->customer_logo_path = (isset($data['customer_logo_path'])) ? $data['customer_logo_path'] : null;
        $this->customer_sponsoring_number = (isset($data['customer_sponsoring_number'])) ? $data['customer_sponsoring_number'] : null;
        $this->customer_folder_path = (isset($data['customer_folder_path'])) ? $data['customer_folder_path'] : null;
        /* $this->admin_id = (isset($data['admin_id'])) ? $data['admin_id'] : null;
        $this->commercial_id = (isset($data['commercial_id'])) ? $data['commercial_id'] : null; */
    }
    
    /*
     * (non-PHPdoc) @see \Zend\InputFilter\InputFilterAwareInterface::setInputFilter()
     */
    public function setInputFilter (InputFilterInterface $inputFilter)
    {
        throw new \Exception("Non utilisé");
    }
    
    /*
     * (non-PHPdoc) @see \Zend\InputFilter\InputFilterAwareInterface::getInputFilter()
     */
    public function getInputFilter ()
    {
        if (! $this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory = new InputFactory();
            
            // filtre et valadteur pour l'id
            $inputFilter->add($factory->createInput(array(
                'name' => 'customer_id',
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'Int'
                    )
                )
            )));
            
            // filtre et validateur pour le nom
            $inputFilter->add($factory->createInput(array(
                'name' => 'customer_name',
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 1,
                            'max' => 50
                        )
                    )
                )
            )));
            
            // filtre et validateur pour le numéro de la compagnie
            $inputFilter->add($factory->createInput(array(
                'name' => 'customer_compagny_number',
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 1
                        )
                    )
                )
            )));
            
            // filtre et validteur pour la validation
            
            // filtre et validateur pour le numéro de client
            $inputFilter->add($factory->createInput(array(
                'name' => 'customer_number',
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 1
                        )
                    )
                )
            )));
            
            // filtre et validateur pour le téléphone
            $inputFilter->add($factory->createInput(array(
                'name' => 'customer_telephone',
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 1,
                            'max' => 20
                        )
                    )
                )
            )));
            
            // filtre et validateur pour le fax
            $inputFilter->add($factory->createInput(array(
                'name' => 'customer_telephone',
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 1,
                            'max' => 20
                        )
                    )
                )
            )));
            
            // filtre et validateur pour l'adresse
            $inputFilter->add($factory->createInput(array(
                'name' => 'customer_address',
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 1,
                            'max' => 20
                        )
                    )
                )
            )));
            
            // filtre et validateur pour le code postal
            $inputFilter->add($factory->createInput(array(
                'name' => 'customer_zipcode',
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 1,
                            'max' => 20
                        )
                    )
                )
            )));
            
            // filtre et validateur pour la ville
            $inputFilter->add($factory->createInput(array(
                'name' => 'customer_city',
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 1,
                            'max' => 20
                        )
                    )
                )
            )));
            
            // filtre et validateur pour le pays
            $inputFilter->add($factory->createInput(array(
                'name' => 'customer_country',
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 1,
                            'max' => 20
                        )
                    )
                )
            )));
            
            // filtre et validateur pour le type
            $inputFilter->add($factory->createInput(array(
                'name' => 'customer_type',
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 1,
                            'max' => 15
                        )
                    )
                )
            )));
            
            // filtre et validateur pour le chemin du logo
            $inputFilter->add($factory->createInput(array(
                'name' => 'customer_logo_path',
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 1
                        )
                    )
                )
            )));
            
            // filtre et validateur pour le nombre de parrainage
            $inputFilter->add($factory->createInput(array(
                'name' => 'customer_sponsoring_number',
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'Int'
                    )
                )
            )));
            
            // filtre et validateur pour le chemin du dossier
            $inputFilter->add($factory->createInput(array(
            		'name' => 'customer_folder_path',
            		'required' => true,
            		'filters' => array(
            				array(
            						'name' => 'StripTags'
            				),
            				array(
            						'name' => 'StringTrim'
            				)
            		),
            		'validators' => array(
            				array(
            						'name' => 'StringLength',
            						'options' => array(
            								'encoding' => 'UTF-8',
            								'min' => 1
            						)
            				)
            		)
            )));
            
            $this->inputFilter = $inputFilter;
        }
        
        return $this->inputFilter;
    }

    public function getArrayCopy ()
    {
        return get_object_vars($this);
    }
}