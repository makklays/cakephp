
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading">Tasks</h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $task->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $task->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link('List Tasks', ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tasks form content">
            <?= $this->Form->create($task) ?>
                <h1>Edit Task</h1>
                <?php
                echo $this->Form->control('user_id', ['type' => 'hidden', 'value' => $task->user_id]);
                echo $this->Form->control('name', ['value' => $task->name]);
                echo $this->Form->control('email', ['value' => $task->email]);
                echo $this->Form->control('description', ['value' => $task->description]);
                echo $this->Form->control('address', ['value' => $task->address]);
                echo $this->Form->control('cp', ['value' => $task->cp]);
                ?>
            <?= $this->Form->button('Submit') ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
