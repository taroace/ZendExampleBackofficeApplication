<?php
namespace Formulaire_User\Model;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
class User implements InputFilterAwareInterface
{
    public $user_id;
    public $user_surname;
    public $user_fisrt_name;
    public $user_mail;
    public $user_password;
    public $user_civility;
    protected $inputFilter;
    public function exchangeArray ($data)
    {
        $this->user_id = (isset($data['user_id'])) ? $data['user_id'] : null;
        $this->user_surname = (isset($data['user_surname'])) ? $data['user_surname'] : null;
        $this->user_fisrt_name = (isset($data['user_fisrt_name'])) ? $data['user_fisrt_name'] : null;
        $this->user_mail = (isset($data['user_mail'])) ? $data['user_mail'] : null;
        $this->user_password = (isset($data['user_password'])) ? $data['user_password'] : null;
        $this->user_civility = (isset($data['user_civility'])) ? $data['user_civility'] : null;
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
                        
            // filtre et validateur de l'id
            $inputFilter->add($factory->createInput(array(
                'name' => 'user_id',
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'Int'
                    )
                )
            )));  
                      
            // filtre et validateur du nom
            $inputFilter->add($factory->createInput(array(
                'name' => 'user_surname',
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
                            'max' => 25
                        )
                    )
                )
            )));
            
            // filtre et validateur du prénom
            $inputFilter->add($factory->createInput(array(
                'name' => 'user_fisrt_name',
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
                            'max' => 25
                        )
                    )
                )
            )));
            
            // filtre et validateur de l'email
            $inputFilter->add($factory->createInput(array(
                'name' => 'user_mail',
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
                        'name' => 'Zend\validator\EmailAddress',
                        'options' => array(
                            'encoding' => 'UTF-8'
                        )
                        
                    )
                )
            )));
            
            // filtre et validateur du mot de passe
            $inputFilter->add($factory->createInput(array(
                'name' => 'user_password',
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 6
                        )
                    )
                )
            )));
            
            // filtre et validateur de la confirmation du mot de passe
            $inputFilter->add($factory->createInput(array(
                'name' => 'user_password_confirm',
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 6
                        )
                    ),
                    array(
                        'name' => 'identical',
                        'options' => array(
                            'token' => 'user_password'
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