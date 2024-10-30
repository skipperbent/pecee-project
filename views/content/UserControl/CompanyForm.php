<?php /* @var $this \Demo\Widget\UserControl\CompanyForm */ ?>

<div class="card mb-4 mt-1">
    <div class="card-header">
        <?php if($this->company->exists()) : ?>
            <h5 class="mb-0 pb-0"><?= lang('Companies.EditCompany', $this->company->name); ?></h5>
        <?php else: ?>
            <h5 class="mb-0 pb-0"><?= lang('Companies.AddCompany'); ?></h5>
        <?php endif; ?>
    </div>
    <div class="card-block p-3">

        <?= $this->showFlash(); ?>

        <?= $this->form()->start('company'); ?>

            <?php if($this->company->exists()) : ?>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label"><?= lang('Companies.Name'); ?></label>
                        <div class="col-sm-4">
                            <?= $this->form()->input('name', 'text', $this->company->name)->addClass('form-control')->id('email'); ?>
                            <?= $this->renderValidationFor('name'); ?>
                        </div>
                    </div>

                    <?= $this->form()->button(lang('Companies.Update'), 'submit')->addClass('btn btn-primary'); ?>

            <?php else: ?>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label"><?= lang('Companies.Name'); ?></label>
                        <div class="col-sm-4">
                            <?= $this->form()->input('name', 'text')->addClass('form-control')->id('email'); ?>
                            <?= $this->renderValidationFor('name'); ?>
                        </div>
                    </div>

                    <?= $this->form()->button(lang('Companies.Add'), 'submit')->addClass('btn btn-primary'); ?>

            <?php endif; ?>

        <?= $this->form()->end(); ?>

    </div>
</div>