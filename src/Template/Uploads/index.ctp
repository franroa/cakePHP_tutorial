<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Upload'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="uploads index large-9 medium-8 columns content">
    <h3><?= __('Uploads') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('model') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('attachment') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dir') ?></th>
                <th scope="col"><?= $this->Paginator->sort('size') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($uploads as $upload): ?>
            <tr>
                <td><?= $this->Number->format($upload->id) ?></td>
                <td><?= h($upload->model) ?></td>
                <td><?= $upload->has('user') ? $this->Html->link($upload->user->id, ['controller' => 'Users', 'action' => 'view', $upload->user->id]) : '' ?></td>
                <td><?= h($upload->attachment) ?></td>
                <td><?= h($upload->dir) ?></td>
                <td><?= h($upload->size) ?></td>
                <td><?= h($upload->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $upload->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $upload->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $upload->id], ['confirm' => __('Are you sure you want to delete # {0}?', $upload->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
