<?php 
require "Model.php";
class Student extends Model {
    protected $fields = [
        'id',
        'name',
        'genre',
        'address'
    ];
    protected $table = 'students';
}