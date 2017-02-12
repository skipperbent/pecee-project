<? /* @var $this \Demo\Widget\Companies */ ?>

<h3 class="mb-3"><?= lang('Companies.Companies'); ?></h3>

<?= $this->widget(new Demo\Widget\UserControl\CompanyForm($this->companyId)); ?>

<? if(!$this->companies->hasRows()): ?>
    <?= lang('Companies.NoCompaniesAdded'); ?>
<? else: ?>

    <table class="table table-hover table-striped table-bordered">
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
                    <a href="<?= url('companies', ['id' => $company->id ]); ?>"><?= lang('Companies.Edit'); ?></a>
                </td>
            </tr>
            <? endforeach; ?>
        </tbody>
    </table>

<? endif; ?>