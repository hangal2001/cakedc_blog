<?php
class TopicsController extends AppController {
    
   
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session','Auth','Search.Prg');

    public function find() {
        $this->Prg->commonProcess();
        $this->Paginator->settings['conditions'] = $this->Topics->parseCriteria($this->Prg->parsedParams());
        $this->set('topics', $this->Paginator->paginate());
    }

    public function beforeFilter(){
  
    $this->Auth->allow('index');
    }


    public $presetVars = array(
        'title' => array(
            'type' => 'value'
        ),
        'email' => array(
            'type' => 'like',
            'field' => 'email'
        ),
        'visible' => array(
            'type' => 'value'
        )
    );

    public function filterTitle(){
        if(empty($data['title'])){
            return array();
        }
        $title = '%' . $data['title'] . '%';
        return array(
            'OR' => array(
                $this->alias . '.title LIKE' => $title,
                $this->alias . '.content LIKE' => $title,
            ));
    }
    public function index() {

       // $data = $this->Topic->find('all');
        $this->set('topics', $this->Topic->find('all'));
        $this->Prg->commonProcess();
        $this->paginate = array(
            'conditions' => $this->Topic->parseCriteria($this->passedArgs));
        $this->set('topics', $this->paginate());
    }

    public function add(){
        
    
        if ($this->request->is('post')) {
            $this->Topic->create();
            if ($this->Topic->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your post.'));
        } 
    
    }
    public function view($id){
    
    
        $data = $this->Topic->findById($id);
        $this->set('topics', $data);
    
    }
   public function edit($id){

        $data = $this->Topic->findById($id);
        if($this->request->is(array('post','put'))){
            $this->Topic->id = $id;
            if($this->Topic->save($this->request->data)){
               $this->Session->setFlash(__('Your post has been edited.'));
                return $this->redirect(array('action' => 'index')); 
            }
        }
        $this->request->data = $data;
    
    }
    public function delete($id){
    

        $this->Topic->id = $id;
        if($this->request->is(array('post','put'))){
            if($this->Topic->delete()){
               $this->Session->setFlash(__('Your post has been deleted.'));
                $this->redirect(array('action' => 'index'));
            }
        }

    }
}