<? /* @var $this \Demo\Widget\UserControl\CompanyForm */ ?>

<div class="card mb-4 mt-1">
    <div class="card-header">
        <? if($this->company->exists()) : ?>
            <h5 class="mb-0 pb-0"><?= lang('Companies.EditCompany', $this->company->name); ?></h5>
        <? else: ?>
            <h5 class="mb-0 pb-0"><?= lang('Companies.AddCompany'); ?></h5>
        <? endif; ?>
    </div>
    <div class="card-block">

        <?= $this->showFlash(); ?>

        <? if($this->company->exists()) : ?>

            <?= $this->form()->start('edit'); ?>

                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label"><?= lang('Companies.Name'); ?></label>
                    <div class="col-sm-4">
                        <?= $this->form()->input('name', 'text', $this->company->name)->addClass('form-control')->id('email'); ?>
                    </div>
                </div>

                <?= $this->form()->button(lang('Companies.Update'), 'submit')->addClass('btn btn-primary'); ?>

            <?= $this->form()->end(); ?>

        <? else: ?>

            <?= $this->form()->start('create'); ?>

                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label"><?= lang('Companies.Name'); ?></label>
                    <div class="col-sm-4">
                        <?= $this->form()->input('name', 'text')->addClass('form-control')->id('email'); ?>
                    </div>
                </div>

                <?= $this->form()->button(lang('Companies.Add'), 'submit')->addClass('btn btn-primary'); ?>

            <?= $this->form()->end(); ?>

        <? endif; ?>

    </div>
</div>