<?php

class Results extends Eloquent {
	protected $fillable = ['user_id', 'score', 'question_quizzler_answer', 'active'];
	protected $table  = "results";
}