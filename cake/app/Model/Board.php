<?php
	class Board extends Model {
		public $name = 'Board';
		public $belongsTo = array('User');
	}