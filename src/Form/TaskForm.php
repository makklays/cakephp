<?php
declare(strict_types=1);

namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

class TaskForm extends Form
{
    protected function _buildSchema(Schema $schema)
    {
        return $schema->addField('user_id', ['type' => 'integer'])
            ->addField('name', 'string')
            ->addField('email', ['type' => 'string'])
            ->addField('description', ['type' => 'text'])
            ->addField('address', ['type' => 'text'])
            ->addField('cp', ['type' => 'text']);
    }

    protected function _buildValidator(Validator $validator)
    {
        return $validator->add('name', 'length', ['rule' => ['minLength', 10]])
            ->add('email', 'format', ['rule' => 'email', 'message' => 'A valid email address is required']);
    }

    protected function _execute(array $data): bool
    {
        // Va a enviar a correo
        return true;
    }

    public function setErrors($errors)
    {
        $this->_errors = $errors;
    }
}
