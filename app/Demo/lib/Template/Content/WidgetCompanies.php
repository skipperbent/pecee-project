<? /* @var $this \Demo\Widget\WidgetCompanies */ ?>

<?= $this->widget(new Demo\Widget\UserControl\CompanyForm($this->companyId)); ?>

<h1>Companies</h1>

<? if(!$this->companies->hasRows()): ?>
    No companies added.
<? else: ?>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <? foreach($this->companies->getRows() as $company) : ?>
            <tr>
                <td><?= $company->getName(); ?></td>
                <td>
                    <a href="<?= url('companies', ['id' => $company->getId()]); ?>">Edit</a> - Delete
                </td>
            </tr>
            <? endforeach; ?>
        </tbody>
    </table>

<? endif; ?>