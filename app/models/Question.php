<?php

class Question extends Eloquent {
	protected $fillable = ['topic', 'correct_answer'];
	protected $table  = "question";
}