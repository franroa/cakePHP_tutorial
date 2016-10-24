<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Upload'), ['action' => 'edit', $upload->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Upload'), ['action' => 'delete', $upload->id], ['confirm' => __('Are you sure you want to delete # {0}?', $upload->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Uploads'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Upload'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="uploads view large-9 medium-8 columns content">
    <h3><?= h($upload->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Model') ?></th>
            <td><?= h($upload->model) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $upload->has('user') ? $this->Html->link($upload->user->id, ['controller' => 'Users', 'action' => 'view', $upload->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Attachment') ?></th>
            <td><?= h($upload->attachment) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dir') ?></th>
            <td><?= h($upload->dir) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Size') ?></th>
            <td><?= h($upload->size) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= h($upload->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($upload->id) ?></td>
        </tr>
    </table>
</div>
