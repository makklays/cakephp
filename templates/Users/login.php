
<div class="users form content">
    <?= $this->Form->create() ?>
    <?= $this->Form->control('email') ?>
    <?= $this->Form->control('password') ?>
    <?= $this->Form->button(__('Login')) ?>
    <?= $this->Form->end() ?>
</div>
