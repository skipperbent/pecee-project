<?php
namespace Demo\CustomValidation;

use Pecee\Http\Input\Validation\ValidateInput;

class ValidateInputNotNullOrEmpty extends ValidateInput {

    public function validate() {
        return (!empty($this->value));
    }

    public function getErrorMessage() {
        return lang('Validation.Required', $this->name);
    }

}