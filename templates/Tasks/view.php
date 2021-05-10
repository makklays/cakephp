
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Task'), ['action' => 'edit', $task->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Task'), ['action' => 'delete', $task->id], ['confirm' => __('Are you sure you want to delete # {0}?', $task->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Tasks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Task'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tasks view content">
            <h3>Task #<?= h($task->id) ?></h3>
            <table>
                <tr>
                    <th>Name</th>
                    <td><?= h($task->name) ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><a href="mailto:<?=$task->email?>" ><?= h($task->email) ?></a></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><?= h($task->description) ?></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><?= h($task->address) ?></td>
                </tr>
                <tr>
                    <th>CP</th>
                    <td><?= h($task->cp) ?></td>
                </tr>
                <tr>
                    <th>User ID</th>
                    <td><?= $this->Number->format($task->user_id) ?></td>
                </tr>
                <tr>
                    <th>Created</th>
                    <td><?= h($task->created->format(DATE_RFC850)) ?></td>
                </tr>
                <tr>
                    <th>Modified</th>
                    <td><?= h($task->modified->format(DATE_RFC850)) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

