<?php
namespace Demo\CustomValidation;

use Pecee\Http\InputValidation\ValidateInput;

class ValidateInputNotNullOrEmpty extends ValidateInput {

    public function validates() {
        return (!empty($this->value));
    }

    public function getError() {
        return lang('Validation.Required', $this->input->getName());
    }

}