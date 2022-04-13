<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * TRoles Controller
 *
 * @property \App\Model\Table\TRolesTable $TRoles
 * @method \App\Model\Entity\TRole[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TRolesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $tRoles = $this->paginate($this->TRoles);

        $this->set(compact('tRoles'));
    }

    /**
     * View method
     *
     * @param string|null $id T Role id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tRole = $this->TRoles->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tRole'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tRole = $this->TRoles->newEmptyEntity();
        if ($this->request->is('post')) {
            $tRole = $this->TRoles->patchEntity($tRole, $this->request->getData());
            if ($this->TRoles->save($tRole)) {
                $this->Flash->success(__('El rol ha sido registrado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El rol no se pudo registrar. Inténtelo de nuevo.'));
        }
        $this->set(compact('tRole'));
    }

    /**
     * Edit method
     *
     * @param string|null $id T Role id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tRole = $this->TRoles->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tRole = $this->TRoles->patchEntity($tRole, $this->request->getData());
            if ($this->TRoles->save($tRole)) {
                $this->Flash->success(__('El rol registrado ha sido actualizado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El rol registrado no se pudo actualizar. Inténtelo de nuevo.'));
        }
        $this->set(compact('tRole'));
    }

    /**
     * Delete method
     *
     * @param string|null $id T Role id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tRole = $this->TRoles->get($id);
        $tRole->rol_eliminado = 1;
        if ($this->TRoles->save($tRole)) {
            $this->Flash->success(__('El rol registrado ha sido eliminado.'));
        } else {
            $this->Flash->error(__('El rol registrado no pudo ser eliminado, inténtelo de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
