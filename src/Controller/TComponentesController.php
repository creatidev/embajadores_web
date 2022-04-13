<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * TComponentes Controller
 *
 * @property \App\Model\Table\TComponentesTable $TComponentes
 * @method \App\Model\Entity\TComponente[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TComponentesController extends AppController
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
            $query = $this->TComponentes->find()->where(['tComponentes.com_nombre LIKE' => "%$key%"]);
        }else{
            $query = $this->TComponentes;
        }
        $count = $this->TComponentes->find()->count();
        $tComponentes = $this->paginate($query,['contain'=>['tServicios']]);

        $this->set(compact('tComponentes','count'));
    }

    /**
     * View method
     *
     * @param string|null $id T Componente id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tComponente = $this->TComponentes->get($id, [
            'contain' => ['tServicios'],
        ]);

        $this->set(compact('tComponente'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $servicios = $this->fetchTable('tServicios')->find()->select(['id_servicio','ser_nombre'])->where(['ser_estado'=>1])->order(['ser_nombre' => 'ASC'])->all();

        $tComponente = $this->TComponentes->newEmptyEntity();
        if ($this->request->is('post')) {
            $tComponente = $this->TComponentes->patchEntity($tComponente, $this->request->getData());
            if ($this->TComponentes->save($tComponente)) {
                $this->Flash->success(__('El componente ha sido registrado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El componente no pudo ser registrado. Inténtelo de nuevo.'));
        }
        $serviceId = $id;
        $this->set(compact('tComponente','servicios','serviceId'));
    }

    /**
     * Edit method
     *
     * @param string|null $id T Componente id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tComponente = $this->TComponentes->get($id, [
            'contain' => ['tServicios'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tComponente = $this->TComponentes->patchEntity($tComponente, $this->request->getData());
            if ($this->TComponentes->save($tComponente)) {
                $this->Flash->success(__('El registro del componente ha sido actualizado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El registro del componente no pudo ser actualizado. Inténtelo de nuevo.'));
        }
        $this->set(compact('tComponente'));
    }

    /**
     * Delete method
     *
     * @param string|null $id T Componente id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tComponente = $this->TComponentes->get($id);
        $tComponente->com_eliminado = 1;
        if ($this->TComponentes->save($tComponente)) {
            $this->Flash->success(__('El registro del componente ha sido eliminado.'));
        } else {
            $this->Flash->error(__('El registro del componente no pudo ser eliminado, inténtelo de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
