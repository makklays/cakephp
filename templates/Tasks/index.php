
<div class="tasks index content">
    <?= $this->Html->link('New Task', ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h1>Tasks <?=(!empty($user['name']) ? $user['name'] : '')?></h1>
    <div class="table-responsive">
        <table>
            <head>
                <tr>
                    <th>Task #</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Created</th>
                    <th class="actions">Actions</th>
                </tr>
            </head>

            <!-- ITERATE TASKS QUERY OBJECT -->
            <?php foreach($tasks as $item): ?>
                <tbody>
                    <tr>
                        <td><?= $item->id ?></td>
                        <td><?= $this->Html->link($item->name, ['action' => 'view', $item->id]) ?></td>
                        <td><?= $item->email ?></td>
                        <td><?= $item->address ?></td>
                        <td><?= $item->created->format('d.m.Y H:i') ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $item->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $item->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]) ?>
                        </td>
                    </tr>
                </tbody>
            <?php endforeach; ?>
        </table>
    </div>
</div>
