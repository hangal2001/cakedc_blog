<?php 
class CommentsSchema extends CakeSchema {

	public function before($event = array()) {
		return true;
	}

	public function after($event = array()) {
	}

    public $comments = array(
        'id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
        'parent_id' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 36),
        'foreign_key' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36),
        'user_id' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 36),
        'lft' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10),
        'rght' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10),
        'model' => array('type'=>'string', 'null' => false, 'default' => NULL),
        'approved' => array('type'=>'boolean', 'null' => false, 'default' => '1'),
        'is_spam' => array('type'=>'boolean', 'null' => false, 'default' => '0'),
        'title' => array('type'=>'string', 'null' => true, 'default' => NULL),
        'slug' => array('type'=>'string', 'null' => true, 'default' => NULL),
        'body' => array('type'=>'text', 'null' => true, 'default' => NULL),
        'author_name' => array('type'=>'string', 'null' => true, 'default' => NULL),
        'author_url' => array('type'=>'string', 'null' => true, 'default' => NULL),
        'author_email' => array('type' => 'string', 'length' => 128, 'default' => '', 'null' => false),
        'language' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 6),
        'is_spam' => array('type' => 'string', 'length' => 20, 'default' => 'clean', 'null' => false), // possible values: clean, spam, ham, spammanual
        'comment_type' => array('type' => 'string', 'length' => 32, 'default' => 'comment', 'null' => false), // possible values: comment, trackback, pingback
        'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
        'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
        'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1)
        )
    );
}
