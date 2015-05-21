
<?php

class PostsController extends AppController {

    public $helpers = array('Html', 'Form', 'Session','Ratings.Rating');
    public $components = array('Session','Auth','Search.Prg','Ratings.Ratings','Comments.Comments' => array(
        'userModelClass' => 'Users.users' // Customize the User class
    ));
    public $actsAs = array('Ratings.Ratable');

    public function callback_commentsAdd($modelId, $commentId, $displayType, $data = array()) {
        if (!empty($this->request->data)) {

            ///perform some validation and field manipulations here. all value need to store into the $data.
            $data['Comment']['author_name'] = $this->Auth->user('username');
            $data['Comment']['author_email'] = $this->Auth->user('email');

            $valid = true;
            if (empty($this->request->data['Comment']['author_name'])) {
                $valid = false;
            }
            if (!$valid) {
                $this->Session->setFlash(__('Please enter necessery information', true));
                return;
            }

        }
        return $this->Comments->callback_add($modelId, $commentId, $displayType, $data);
    }

    public function beforeFilter(){



        parent::beforeFilter();
        $this->Comments->viewVariable = 'posts';

    }

    public function index() {

        $data = $this->Post->find('all');
        $this->set('posts',$data);
        //rating params
       /** $options = array('conditions' => array('Post.' . $this->Post->primaryKey =>$id));
        $this->set('posts', $this->Post->find('first', $options));
        $this->set('isRated', $this->Post->isRatedBy($id, $this->Auth->user('id')));**/
	}
    
    public function add($id){

       $this->request->data['Post']['topic_id'] = $id;
           
        if ($this->request->is('post')) {
            $this->Post->create();
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been saved.'));
               return $this->redirect(array('action' => 'index'));
            }
          $this->Session->setFlash(__('Unable to add your post.'));
        } 
    
     $this->set('topics', $this->Post->Topic->find('list'));
          // $this->set('Topics', $this->Post->Topic->find('list'));
    }



     public function view($id) {
        // $fullName = 'PLuginName.Post'; if comment used in post of pluin

         //$data = $this->Post->findById($id);
        // $this->set('posts',$data);
         if (!$this->Post->exists($id)) {
             throw new NotFoundException(__('Invalid post'));
         }

         $options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
         $this->set('posts', $this->Post->find('first', $options));
         $this->set('isRated', $this->Post->isRatedBy($id, $this->Auth->user('id')));

     }

}
?>