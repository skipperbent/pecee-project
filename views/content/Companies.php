<? /* @var $this \Demo\Widget\Companies */ ?>

<?= $this->widget(new Demo\Widget\UserControl\CompanyForm($this->companyId)); ?>

<h1><?= lang('Companies.Companies'); ?></h1>

<? if(!$this->companies->hasRows()): ?>
    <?= lang('Companies.NoCompaniesAdded'); ?>
<? else: ?>

    <table class="table table-hover">
        <thead>
            <tr>
                <th><?= lang('Companies.Name'); ?></th>
                <th><?= lang('Companies.Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <? foreach($this->companies as $company) : ?>
            <tr>
                <td><?= $company->name; ?></td>
                <td>
                    <a href="<?= url('companies', ['id' => $company->id ]); ?>"><?= lang('Companies.Edit'); ?></a> -
                    <?= lang('Companies.Delete'); ?>
                </td>
            </tr>
            <? endforeach; ?>
        </tbody>
    </table>

<? endif; ?>