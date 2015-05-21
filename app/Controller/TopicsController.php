<?php

App::uses('Users', 'Users.Model');


class TopicsController extends AppController {

    public $helpers = array('Html', 'Form', 'Session','Time','Text','I18n.I18n');
    public $components = array('Session','Auth','Cookie','Paginator','Security','Search.Prg','Comments.Comments' => array('userModelClass' => 'Users.User'));
    public $presetVars = true;
    public $name = 'Topics';

    public function find() {
        $this->Prg->commonProcess();
        $this->Paginator->settings['conditions'] = $this->Topics->parseCriteria($this->Prg->parsedParams());
        $this->set('topics', $this->Paginator->paginate());
    }

    public function beforeFilter(){

        parent::beforeFilter();
        $this->_setupPagination();
        $this->set('topics', $this->modelClass);
        $this->User = ClassRegistry::init('Users.User');
        $this->Auth->allow('index');
        $this->Auth->allow('view');
        $this->Comments->viewVariable = 'topics';

    }


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
    public function searchNameCondition($data = array()) {
        $filter = $data['name'];
        $conditions = array(
            'OR' => array(
                $this->alias . '.title LIKE' => '' . $this->formatLike($filter) . '',
                $this->alias . '.id LIKE' => '' . $this->formatLike($filter) . '',
            )
        );
        return $conditions;
    }

    protected function _setupPagination() {
        $this->Paginator->settings = array(
            'limit' => 5,
            'order' => array(
                'Topic.title' => 'asc'
            )
        );
    }

    public $paginate = array(
        'limit' => 8,
        'order' => array(
            'Topics.title' => 'asc'
        )
    );

    public function url($url = null, $full = false) {
        if (is_array($url) && !array_key_exists('lang', $url)) {
            $url['lang'] = Configure::read('Config.language');
        }
        return parent::url($url, $full);
    }


    public function index() {

       // $this->set('topics', $this->Topic->find('all'));
         $this->Prg->commonProcess();
        $this->paginate = array(
            'conditions' => $this->Topic->parseCriteria($this->passedArgs));
        $this->set('topics',$this->Paginator->paginate($this->Topic));
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

        // $this->set('topics', $this->Topic->read($id));
        $data = $this->Topic->findById($id);
        $this->set('topics', $data);
        $this->set('users', $data);

       //$this->set('topics', $this->Topic->read(null, $id));
    
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