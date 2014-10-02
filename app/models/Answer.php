<?php

class Answer extends Eloquent {
	protected $fillable = ['answer_title', 'question_id'];
	protected $table  = "answer";
}