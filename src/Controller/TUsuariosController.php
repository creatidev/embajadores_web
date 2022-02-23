<?php
declare(strict_types=1);

namespace App\Controller;

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\Mailer\Mailer;
use Cake\ORM\TableRegistry;

/**
 * TUsuarios Controller
 *
 * @property \App\Model\Table\TUsuariosTable $TUsuarios
 * @method \App\Model\Entity\TUsuario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TUsuariosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $key = $this->request->getQuery('key');
        if($key){
            $query = $this->TUsuarios->find()->where(['Or'=>[
                'tUsuarios.usu_nombre LIKE' => "%$key%", 'tUsuarios.usu_email LIKE' => "%$key%"
            ]]);
        }else{
            $query = $this->TUsuarios;
        }
        $count = $this->TUsuarios->find()->count();
        $users = $this->paginate($query,['contain'=>['tRoles']]);
        $this->set(compact('users','count'));
    }

    /**
     * View method
     *
     * @param string|null $id T Usuario id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->TUsuarios->get($id, [
            'contain' => ['tRoles'],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $roles = $this->fetchTable('tRoles')->find()->select(['id_rol', 'rol_nombre'])->where(['rol_estado'=>1])->toList();

        $user = $this->TUsuarios->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->TUsuarios->patchEntity($user, $this->request->getData());
            $newPass = password_hash($this->request->getData('password'), PASSWORD_BCRYPT);
            $user->usu_contrasena = $newPass;

            if ($this->TUsuarios->save($user)) {
                $this->Flash->success(__('El usuario ha sido registrado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El usuario no pudo ser registrado. Inténtelo de nuevo.'));
        }
        $this->set(compact('user','roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id T Usuario id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $roles = $this->fetchTable('tRoles')->find()->select(['id_rol', 'rol_nombre'])->where(['rol_estado'=>1])->toList();

        $user = $this->TUsuarios->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->TUsuarios->patchEntity($user, $this->request->getData());
            if ($this->TUsuarios->save($user)) {
                $this->Flash->success(__('El registro del usuario ha sido actualizado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El registro del usuario no pudo ser actualizado. Inténtelo de nuevo.'));
        }
        $this->set(compact('user','roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id T Usuario id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tUsuario = $this->TUsuarios->get($id);
        if ($this->TUsuarios->delete($tUsuario)) {
            $this->Flash->success(__('El registro del usuario ha sido eliminado.'));
        } else {
            $this->Flash->error(__('El registro del usuario no pudo ser actualizado. Inténtelo de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function update($id = null){
        $roles = $this->fetchTable('tRoles')->find()->select(['id_rol', 'rol_nombre'])->where(['rol_estado'=>1])->toList();

        $user = $this->TUsuarios->get($id, [
            'contain' => ['tRoles'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->TUsuarios->patchEntity($user, $this->request->getData());
            if ($this->TUsuarios->save($user)) {
                $this->Flash->success(__('El registro del usuario ha sido actualizado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El registro del usuario no pudo ser actualizado. Inténtelo de nuevo.'));
        }
        $this->set(compact('user','roles'));
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $email = $this->request->getData('email');
            $password = $this->request->getData('password');
            $user = $this->TUsuarios->findByUsuEmail($email)->first();

            if (!$user) {
                $this->Flash->error('Dirección de correo no registrada. Contacte a un administrator.');
            } else {
                $this->Authentication->setIdentity($user);
                if ((password_verify($password, $user->usu_contrasena))) {
                    if ($user['usu_estado'] == 0){
                        $this->Flash->error('La cuenta se encuentra deshabilitada. Contacte con un administrador o supervisor.');
                    } else {
                        if ($user['id_rol'] > 2) {
                            $this->Flash->error('Su rol no está autorizado para ingresar a esta aplicación.');
                        } else {
                            $redirect = $this->request->getQuery('redirect', [
                                'controller' => 'Pages',
                                'action' => 'home',
                                'prefix' => false
                            ]);
                            return $this->redirect($redirect);
                        }
                    }

                } else {
                    $this->Flash->error('Contraseña incorrecta.');
                }
            }
        }
    }

    public function logout()
    {
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $this->Authentication->logout();
            $this->Flash->success(__('Sesión cerrada correctamente.'));
            return $this->redirect(['controller' => 'tUsuarios', 'action' => 'login']);
        }
    }

    public function forgotpassword() {
        if ($this->request->is('post')) {
            $email = $this->request->getData('email');
            $user = $this->TUsuarios->findByUsuEmail($email)->first();
            if(!$user){
                $this->Flash->error('Dirección electrónica no registrada');
            } else if ($user['usu_estado'] == 0) {
                $this->Flash->error('La cuenta se encuentra deshabilitada. Contacte con un administrador o supervisor.');
            } else {
                $this->Flash->success(__("Se ha enviado un correo electrónico a $email con las instrucciones para realizar el cambio de contraseña."));
                //return $this->redirect(['controller' => 'tUsuarios', 'action' => 'login']);

                $mailer = new Mailer();
                $mailer->setTransport('gmail',[
                    'host' => 'smtp.gmail.com',
                ]);
/*                $mailer = new Mailer('default');
                $mailer->setTransport('smtp');
                $mailer->setFrom(['noreply[at]quantic.com.co' => 'myCake4'])
                    ->setTo($email)
                    ->setEmailFormat('html')
                    ->setSubject('Forgot Password Request')
                    ->deliver('Hello<br/>Please click link below to reset your password<br/>');*/

/*                $mailer = new Mailer();
                $mailer
                    ->setEmailFormat('both')
                    ->setTo($email)
                    ->setFrom(['noreply[at]quantic.com.co' => 'Embajadores'])
                    ->viewBuilder();*/
                 /*   ->setTemplate('welcome')
                    ->setLayout('fancy');*/

                //$mailer->deliver();

            }
        }
    }

    public function resetpassword($id) {
        $user = $this->TUsuarios->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->TUsuarios->patchEntity($user, $this->request->getData());
            $newPass = password_hash($this->request->getData('password'), PASSWORD_BCRYPT);
            $user->usu_contrasena = $newPass;
            if ($this->TUsuarios->save($user)) {
                $this->Flash->success(__('La contraseña ha sido actualizada.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La contraseña no ha sido actualizada. Intentelo de nuevo.'));
        }
        $this->set(compact('user'));
    }

    public function register() {
        $roles = $this->fetchTable('tRoles')->find()->select(['id_rol', 'rol_nombre'])->where(['rol_estado'=>1])->toList();

        $user = $this->TUsuarios->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->TUsuarios->patchEntity($user, $this->request->getData());
            $newPass = password_hash($this->request->getData('password'), PASSWORD_BCRYPT);
            $user->usu_contrasena = $newPass;
            $user->id_rol = 4;
            $user->usu_estado = 0;
            if ($this->TUsuarios->save($user)) {
                $this->Flash->success(__('El usuario ha sido registrado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El usuario no pudo ser registrado. Inténtelo de nuevo.'));
        }
        $this->set(compact('user','roles'));
    }
}
