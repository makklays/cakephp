<?php

namespace App\Controller;

use App\Form;
use Cake\Datasource\ConnectionManager;
use Cake\Validation\Validator;

class TasksController extends AppController
{
    protected $user;

    // init
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Paginator');
        //$this->loadComponent('Flash');

        $session = $this->request->getSession();
        $user = $session->read('user');
        $this->user = $user;
    }

    // All tasks page
    public function index() {
        // only my tasks
        if (!empty($this->user['id'])) {
            $tasks = $this->Tasks->query()->where(['user_id' => $this->user['id']]);
            $tasks = $this->Paginator->paginate($tasks);

            $this->set('tasks', $tasks);
            $this->set('user', $this->user);
        } else {
            return $this->redirect(['controller' => 'users', 'action' => 'index']);
        }
    }

    // Add task page
    public function add() {
        $task = $this->Tasks->newEmptyEntity();

        if ($this->request->is('post') ) {
            $task = $this->Tasks->patchEntity($task, $this->request->getData());
            //$task->user_id = 1;

            if ($this->Tasks->save($task)) {
                $this->Flash->success('Your Task has been saved :-)');
                return $this->redirect(['action' => 'index']);
            }

            // Couldn't save
            $this->Flash->error('Unable to save Task :-(');
        }

        $this->set('task', $task);
        $this->set('user', $this->user);
    }

    // View task page
    public function view($id = null)
    {
        $task = $this->Tasks->get($id);

        // check owner
        if (!empty($this->user['id']) && !empty($task->user_id) && $this->user['id'] != $task->user_id) {
            return $this->redirect(['action' => 'index']);
        }

        $this->set('task', $task);
    }

    // Edit task page
    public function edit($id = null)
    {
        $task = $this->Tasks->get($id, [
            'contain' => [],
        ]);

        // check owner
        if (!empty($this->user['id']) && !empty($task->user_id) && $this->user['id'] != $task->user_id) {
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is(['patch', 'post', 'put']) && $task->getErrors()) {

            $task = $this->Tasks->patchEntity($task, $this->request->getData());
            if ($this->Tasks->save($task)) {
                $this->Flash->success('Your Task has been saved :-)');
                return $this->redirect(['action' => 'index']);
            }

            // No puede guardar
            $this->Flash->error('Unable to save Task :-(');
        }

        $this->set('task', $task);
    }

    // Delete task page
    public function delete($id = null)
    {
        // allow para
        $this->request->allowMethod(['post', 'delete']);
        $task = $this->Tasks->get($id);

        // check owner
        if (!empty($this->user['id']) && !empty($task->user_id) && $this->user['id'] != $task->user_id) {
            return $this->redirect(['action' => 'index']);
        }

        // delete
        if ($this->Tasks->delete($task)) {
            $this->Flash->success('The task has been deleted.');
        } else {
            $this->Flash->error('The task could not be deleted. Please, try again.');
        }

        return $this->redirect(['action' => 'index']);
    }
}
