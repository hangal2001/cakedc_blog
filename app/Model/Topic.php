<?php
App::uses('AppModel', 'Model');

/**
 * Topic Model
 *
 * @property User $User
 * @property Post $Post
 */
class Topic extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

    public $actsAs = array(
        'Tags.Taggable','Search.Searchable'
    );

    public $filterArgs = array(

        'title' => array(
            'field' => 'title',
            'type' => 'value'
        ),
        array('category2' => 'category', 'type' => 'value'),
        'email' => array(
            'type' => 'like',
            'field' => 'email'
        ),
        'visible' => array(
            'type' => 'value'
        ),

        'range' => array(
            'type' => 'expression',
            'method' => 'CreationDateRangeCondition',
            'field' => 'Topic.created BETWEEN ? AND ?'
        ),

        'tags' => array(
            'type' => 'subquery',
            'method' => 'findByTags',
            'field' => 'Article.id'
        ),
        'filter' => array(
            'type' => 'query',
            'method' => 'orConditions'
        ),
        'year' => array(
            'type' => 'query',
            'method' => 'yearRange'
        ),

    );

    public function CreationDateRangeCondition($data = array()){
        if(strpos($data['range'], ' - ') !== false){
            $tmp = explode(' - ', $data['range']);
            $tmp[0] = $tmp[0]."-01-01";
            $tmp[1] = $tmp[1]."-12-31";
            return $tmp;
        }else{
            return array($data['range']."-01-01", $data['range']."-12-31");
        }

    }

    public function filterCategory($data, $field = null) {
        if (empty($data['category2'])) {
            return array();
        }
        $categoryField = '%' . $data['category2'] . '%';
        return array(
            'OR' => array(
                $this->alias . '.category LIKE' => $categoryField,
            ));


    }

    public function __construct($id = false, $table = null, $ds = null) {
        $this->statuses = array(
            '' => __('All', true),
            0 => __('Bid', true),
            1 => __('Cancelled', true),
            2 => __('Approved', true),
            3 => __('On Setup', true),
            4 => __('Field', true),
            5 => __('Closed', true),
            6 => __('Other', true));
        parent::__construct($id, $table, $ds);
    }
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'visible' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'topic_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
