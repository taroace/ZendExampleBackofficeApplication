<?php
namespace Formulaire_User\Form;
use Zend\Form\Form;
class UserForm extends Form
{
    public function __construct ($name = null)
    {
        parent::__construct('user');
        $this->setAttribute('method', 'post');
        $this->setAttribute('enctype', 'multipart/form-data');
        $this->add(array(
            'name' => 'user_id',
            'attributes' => array(
                'type' => 'hidden'
            )
        ));
        $this->add(array(
            'name' => 'user_surname',
            'attributes' => array(
                'type' => 'text'
            ),
            'options' => array(
                'label' => 'Nom'
            )
        ));
        $this->add(array(
            'name' => 'user_fisrt_name',
            'attributes' => array(
                'type' => 'text'
            ),
            'options' => array(
                'label' => 'Prénom'
            )
        ));        
        $this->add(array(
            'name' => 'user_civility',
            'type' => 'Zend\Form\Element\Radio',
            'options' => array(
                'label' => 'Civilité',
                'value_options' => array(
                    'M' => 'Monsieur',
                    'Mme' => 'Madame'
                )
            )
        ));
        $this->add(array(
            'name' => 'user_mail',
            'attributes' => array(
                'type' => 'text'
            ),
            'options' => array(
                'label' => 'Adresse mail'
            )
        ));
        $this->add(array(
            'name' => 'user_password',
            'attributes' => array(
                'type' => 'password'
            ),
            'options' => array(
                'label' => 'Mot de passe'
            )
        ));
        $this->add(array(
            'name' => 'user_password_confirm',
            'attributes' => array(
                'type' => 'password'
            ),
            'options' => array(
                'label' => 'Confirmer mot de passe'
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
