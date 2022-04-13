<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * TTiendas Controller
 *
 * @property \App\Model\Table\TTiendasTable $TTiendas
 * @method \App\Model\Entity\TTienda[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TTiendasController extends AppController
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
            //$query = $this->TTiendas->findByCiuNombre($key,$key);
            $query = $this->TTiendas->find()->where(['Or'=>[
                'tTiendas.tie_nombre LIKE' => "%$key%", 'tCiudades.ciu_nombre LIKE' => "%$key%"
            ]]);
        }else{
            $query = $this->TTiendas;
        }
        $count = $this->TTiendas->find()->count();
        $tTiendas = $this->paginate($query,['contain'=>['tCiudades']]);

        $this->set(compact('tTiendas','count'));
    }

    /**
     * View method
     *
     * @param string|null $id T Tienda id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tTienda = $this->TTiendas->get($id, [
            'contain' => ['tCiudades'],
        ]);

        $this->set(compact('tTienda'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $ciudades = $this->fetchTable('tCiudades')->find()->select(['id_ciudad', 'ciu_nombre'])->where(['ciu_estado'=>1])->toList();

        $tTienda = $this->TTiendas->newEmptyEntity();
        if ($this->request->is('post')) {
            $tTienda = $this->TTiendas->patchEntity($tTienda, $this->request->getData());
            if ($this->TTiendas->save($tTienda)) {
                $this->Flash->success(__('La tienda ha sido registrada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La tienda no se pudo registrar. Inténtelo de nuevo.'));
        }
        $cityId = $id;
        $this->set(compact('tTienda', 'ciudades','cityId'));
    }

    /**
     * Edit method
     *
     * @param string|null $id T Tienda id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tTienda = $this->TTiendas->get($id, [
            'contain' => ['tCiudades'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tTienda = $this->TTiendas->patchEntity($tTienda, $this->request->getData());
            if ($this->TTiendas->save($tTienda)) {
                $this->Flash->success(__('El registro de la tienda ha sido actualizado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El registro de la tienda no se pudo actualizar. Inténtelo de nuevo.'));
        }
        $this->set(compact('tTienda'));
    }

    /**
     * Delete method
     *
     * @param string|null $id T Tienda id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tTienda = $this->TTiendas->get($id);
        $tTienda->tie_eliminado = 1;
        if ($this->TTiendas->save($tTienda)) {
            $this->Flash->success(__('El registro de la tienda ha sido eliminada.'));
        } else {
            $this->Flash->error(__('El registro de la tienda no pudo ser eliminado, inténtelo de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
