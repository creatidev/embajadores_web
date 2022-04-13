<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * TTiposFalla Controller
 *
 * @property \App\Model\Table\TTiposFallaTable $TTiposFalla
 * @method \App\Model\Entity\TTiposFalla[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TTiposFallaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $tTiposFalla = $this->paginate($this->TTiposFalla);

        $this->set(compact('tTiposFalla'));
    }

    /**
     * View method
     *
     * @param string|null $id T Tipos Falla id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tTiposFalla = $this->TTiposFalla->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tTiposFalla'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tTiposFalla = $this->TTiposFalla->newEmptyEntity();
        if ($this->request->is('post')) {
            $tTiposFalla = $this->TTiposFalla->patchEntity($tTiposFalla, $this->request->getData());
            if ($this->TTiposFalla->save($tTiposFalla)) {
                $this->Flash->success(__('El tipo de falla ha sido registrado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El tipo de falla no se pudo registrar. Inténtelo de nuevo.'));
        }
        $this->set(compact('tTiposFalla'));
    }

    /**
     * Edit method
     *
     * @param string|null $id T Tipos Falla id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tTiposFalla = $this->TTiposFalla->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tTiposFalla = $this->TTiposFalla->patchEntity($tTiposFalla, $this->request->getData());
            if ($this->TTiposFalla->save($tTiposFalla)) {
                $this->Flash->success(__('El registro de tipo de falla ha sido actualizado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El registro de tipo de falla no se pudo actualizar. Inténtelo de nuevo.'));
        }
        $this->set(compact('tTiposFalla'));
    }

    /**
     * Delete method
     *
     * @param string|null $id T Tipos Falla id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tTiposFalla = $this->TTiposFalla->get($id);
        $tTiposFalla->tpf_eliminado = 1;
        if ($this->TTiposFalla->save($tTiposFalla)) {
            $this->Flash->success(__('El registro de tipo de falla, ha sido eliminado.'));
        } else {
            $this->Flash->error(__('El registro de tipo de falla no pudo ser eliminado, inténtelo de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
