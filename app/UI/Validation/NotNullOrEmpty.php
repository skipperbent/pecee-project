<?php
/**
 * Class NotNullOrEmpty
 *
 * We modify the validation to add our custom text
 *
 * @package Demo\UI\Validation
 */

namespace Demo\UI\Validation;

use Pecee\UI\Form\Validation\ValidateNotNullOrEmpty;

class NotNullOrEmpty extends ValidateNotNullOrEmpty {

    public function getError() {
        return lang('Validation.Required', $this->input->getName());
    }

}