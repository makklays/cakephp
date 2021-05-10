<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Auth\AbstractPasswordHasher;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Datasource\ConnectionManager;
use Cake\Event\EventInterface;
use Cake\Utility\Hash;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth');
        //Allow non-auth page
        //$this->Auth->allow(['login','add','forgotpassword','resetpassword','verification']);
        //To call current auth fullname
        //$this->set('fullname',$this->Auth->user('fullname'));
    }

    //
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    //
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Tasks'],
        ]);

        $this->set(compact('user'));
    }

    //
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    //
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    //
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    //
    public function login()
    {
        $email = $this->request->getData('email');
        $password = $this->request->getData('password');

        //$user = $this->Auth->identify();
        if ($this->request->getMethod() == 'POST') {

            $hasher = new DefaultPasswordHasher();
            $password = $hasher->hash($password);

            $connection = ConnectionManager::get('default');
            $user = $connection
                ->newQuery()
                ->select('*')
                ->from('users')
                ->where(['email' => $email], ['password' => $password])
                ->execute()
                ->fetch('assoc');

            if (!empty($user)) {
                $this->Auth->setUser($user);

                // User of data in session
                $session = $this->request->getSession();
                $session->write('user', $user);
                $session->write('user_name', $user['name']);
                $session->write('user_id', $user['id']);
                $session->write('user_email', $user['email']);

                return $this->redirect(['controller' => 'Tasks', 'action' => 'index']);
                //return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error("Incorrect email or password !");
            }
        }
    }

    //
    public function register()
    {
        $user = $this->Users->newEmptyEntity();

        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if ($this->Users->save($user)) {
                $this->Flash->success(__('Your registration was successful.'));

                //return $this->redirect(['controller' => 'Tasks', 'action' => 'index']);
                return $this->redirect('/');
            }

            $this->Flash->error(__('Your registration failed.'));
        } else {
            pr($this->Auth->user());
        }
    }

    // Logout
    public function logout(){
        // destroy session
        $session = $this->request->getSession();
        $session->destroy();

        return $this->redirect($this->Auth->logout());
    }
}
