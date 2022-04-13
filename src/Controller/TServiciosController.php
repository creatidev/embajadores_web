<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * TServicios Controller
 *
 * @property \App\Model\Table\TServiciosTable $TServicios
 * @method \App\Model\Entity\TServicio[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TServiciosController extends AppController
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
            $query = $this->TServicios->find()->where(['tServicios.ser_nombre LIKE' => "%$key%"]);
        }else{
            $query = $this->TServicios;
        }
        $count = $this->TServicios->find()->count();
        $tServicios = $this->paginate($query,['contain'=>['tComponentes']]);

        $this->set(compact('tServicios','count'));
    }

    /**
     * View method
     *
     * @param string|null $id T Servicio id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tServicio = $this->TServicios->get($id, [
            'contain' => ['tComponentes'],
        ]);

        $this->set(compact('tServicio'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tServicio = $this->TServicios->newEmptyEntity();
        if ($this->request->is('post')) {
            $tServicio = $this->TServicios->patchEntity($tServicio, $this->request->getData());
            if ($this->TServicios->save($tServicio)) {
                $this->Flash->success(__('El servicio ha sido registrado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El servicio no se pudo registrar. Inténtelo de nuevo.'));
        }
        $this->set(compact('tServicio'));
    }

    /**
     * Edit method
     *
     * @param string|null $id T Servicio id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tServicio = $this->TServicios->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tServicio = $this->TServicios->patchEntity($tServicio, $this->request->getData());
            if ($this->TServicios->save($tServicio)) {
                $this->Flash->success(__('El servicio registrado ha sido actualizado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El servicio no se pudo actualizar. Inténtelo de nuevo.'));
        }
        $this->set(compact('tServicio'));
    }

    /**
     * Delete method
     *
     * @param string|null $id T Servicio id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tServicio = $this->TServicios->get($id);
        $tServicio->ser_eliminado = 1;
        if ($this->TServicios->save($tServicio)) {
            $this->Flash->success(__('La servicio registrado ha sido eliminado.'));
        } else {
            $this->Flash->error(__('El servicio registrado no se pudo eliminar. Inténtelo de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
