<? /* @var $this \Demo\Widget\UserControl\CompanyForm */ ?>

<?= $this->showFlash(); ?>

<? if($this->company && $this->company->hasRow()) : ?>

    <?= $this->form()->start('edit'); ?>

    <h3>Edit company: <?= $this->company->getName(); ?></h3>

    <div class="form-group">
        <label for="email">Company name:</label>
        <?= $this->form()->input('name', 'text', $this->company->getName(), true)->addClass('form-control')->addAttribute('id', 'email'); ?>
    </div>

    <button type="submit" class="btn btn-default">
        Update
    </button>

    <?= $this->form()->end(); ?>

<? else: ?>

    <?= $this->form()->start('create'); ?>

        <h3>Add company</h3>

        <div class="form-group">
            <label for="email">Company name:</label>
            <?= $this->form()->input('name', 'text', null, true)->addClass('form-control')->addAttribute('id', 'email'); ?>
        </div>

        <button type="submit" class="btn btn-default">
            Add
        </button>

    <?= $this->form()->end(); ?>

<? endif; ?>