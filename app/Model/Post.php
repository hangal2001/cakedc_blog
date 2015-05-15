<?php
App::uses('AppModel', 'Model');
/**
 * Topic Model
 *
 * @property User $User
 * @property Post $Post
 */
class Post extends AppModel {

    public $belongsTo = 'Topic';
}
