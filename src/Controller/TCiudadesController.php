<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * TCiudades Controller
 *
 * @property \App\Model\Table\TCiudadesTable $TCiudades
 * @method \App\Model\Entity\TCiudad[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TCiudadesController extends AppController
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
            $query = $this->TCiudades->find()->where(['tCiudades.ciu_nombre LIKE' => "%$key%"]);
        }else{
            $query = $this->TCiudades;
        }
        $count = $this->TCiudades->find()->count();
        $tCiudades = $this->paginate($query, ['contain'=>['tTiendas']]);

        $this->set(compact('tCiudades','count'));
    }

    /**
     * View method
     *
     * @param string|null $id T Ciudades id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tCiudad = $this->TCiudades->get($id, [
            'contain' => ['tTiendas'],
        ]);

        $this->set(compact('tCiudad'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tCiudades = $this->TCiudades->newEmptyEntity();
        if ($this->request->is('post')) {
            $tCiudades = $this->TCiudades->patchEntity($tCiudades, $this->request->getData());
            if ($this->TCiudades->save($tCiudades)) {
                $this->Flash->success(__('La ciudad ha sido registrada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La ciudad no se pudo registrar. Inténtelo de nuevo.'));
        }
        $this->set(compact('tCiudades'));
    }

    /**
     * Edit method
     *
     * @param string|null $id T Ciudad id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tCiudades = $this->TCiudades->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tCiudades = $this->TCiudades->patchEntity($tCiudades, $this->request->getData());
            if ($this->TCiudades->save($tCiudades)) {
                $this->Flash->success(__('El registro de la ciudad ha sido actualizado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El registro de la ciudad no se pudo actualizar. Inténtelo de nuevo.'));
        }
        $this->set(compact('tCiudades'));
    }

    /**
     * Delete method
     *
     * @param string|null $id T Ciudad id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tCiudades = $this->TCiudades->get($id);

        $tCiudades->ciu_eliminado = 1;

        if ($this->TCiudades->save($tCiudades)) {
            $this->Flash->success(__('El registro de la ciudad ha sido eliminado.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('El registro de la ciudad no pudo ser eliminado, inténtelo de nuevo.'));
    }
}
