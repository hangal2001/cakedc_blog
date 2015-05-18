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
        'Tags.Taggable', 'Search.Searchable'
    );

    public $filterArgs = array(

        'title' => array(
            'type' => 'like'
        ),
        'status' => array(
            'type' => 'value'
        ),
        'blog_id' => array(
            'type' => 'lookup',
            'formField' => 'blog_input',
            'modelField' => 'title',
            'model' => 'Blog'
        ),
        'search' => array(
            'type' => 'like',
            'field' => 'Article.description'
        ),
        'range' => array(
            'type' => 'expression',
            'method' => 'CreationDateRangeCondition',
            'field' => 'Topic.created BETWEEN ? AND ?'
        ),
        'username' => array(
            'type' => 'like', 'field' => array(
                'User.username',
                'UserInfo.first_name'
            )
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
        'enhanced_search' => array(
            'type' => 'like',
            'encode' => true,
            'before' => false,
            'after' => false,
            'field' => array(
                'ThisModel.name', 'OtherModel.name'
            )
        ),
    );

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
