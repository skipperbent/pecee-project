<? /* @var $this \Demo\Widget\UserControl\CompanyForm */ ?>

<?= $this->showFlash(); ?>

<? if($this->company->exists()) : ?>

    <?= $this->form()->start('edit'); ?>

    <h3><?= lang('Companies.EditCompany', $this->company->name); ?></h3>

    <div class="form-group">
        <label for="email"><?= lang('Companies.Name'); ?>:</label>
        <?= $this->form()->input('name', 'text', $this->company->name)->addClass('form-control')->id('email'); ?>
    </div>

    <button type="submit" class="btn btn-default">
        <?= lang('Companies.Update'); ?>
    </button>

    <?= $this->form()->end(); ?>

<? else: ?>

    <?= $this->form()->start('create'); ?>

        <h3><?= lang('Companies.AddCompany'); ?></h3>

        <div class="form-group">
            <label for="email"><?= lang('Companies.Name'); ?>:</label>
            <?= $this->form()->input('name', 'text')->addClass('form-control')->id('email'); ?>
        </div>

        <button type="submit" class="btn btn-default">
            <?= lang('Companies.Add'); ?>
        </button>

    <?= $this->form()->end(); ?>

<? endif; ?>