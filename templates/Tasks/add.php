
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading">Tasks <?=(!empty($user['name']) ? $user['name'] : '')?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $task->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $task->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link('List Tasks', ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tasks index content">
            <h1>Add Task</h1>
            <?php
            $templates = [
                'inputContainer' => '<div class="form-group">{{content}}</div>',
                //'input' => '<input type="{{type}}" class="form-control is-invalid" name="{{name}}" {{attrs}} />',
                'inputContainerError' => '<div class="form-group {{required}} error">{{content}}{{error}}</div>',
                'error' => '<div class="invalid-feedback">{{content}}</div>'
            ];
            $this->Form->setTemplates($templates);

            echo $this->Form->create($task/*, ['templates' => [
                'formGroup' => '{{input}}{{label}}',
                'error' => '<div class="invalid-feedback">{{content}}</div>'
            ]]*/);

            /*if ($this->Form->isFieldError('name')) {
                echo $this->Form->error('name');
            }
            var_dump($this->Form->isFieldError('name'));*/

            echo $this->Form->control('user_id', ['type' => 'hidden', 'value' => (!empty($user['id']) ? $user['id'] : 1)]);
            echo $this->Form->control('name', [
                'label' => 'Your name ',
                'placeholder' => 'Your name',
                'class' => ($this->Form->isFieldError('name')) ? 'form-control is-invalid' : 'form-control'
            ]);
            echo $this->Form->control('email', ['placeholder' => 'Email', 'required' => true]);
            echo $this->Form->control('description', ['type' => 'textarea', 'rows' => '7', 'cols' => '5']);
            echo $this->Form->control('address', ['placeholder' => 'Your address']);
            echo $this->Form->control('cp');

            // ejemplo - select
            //$sizes = ['s' => 'Small', 'm' => 'Medium', 'l' => 'Large'];
            //echo $this->Form->select('size', $sizes, ['default' => 'm']);

            echo $this->Form->button('Add Task', ['class' => 'btn btn-success']);

            echo $this->Form->end();
            ?>
        </div>
    </div>
</div>
