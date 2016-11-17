<?php
namespace Demo\UI\Validation;

use Pecee\UI\Form\Validation\ValidateNotNullOrEmpty;

class NotNullOrEmpty extends ValidateNotNullOrEmpty   {

    public function getError() {
        return lang('Validation.Required', $this->name);
    }

}