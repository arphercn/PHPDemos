<?php 
require_once("easyCRUD.class.php");

class Cart  Extends Crud {
    
        # Your Table name 
        protected $table = 'cart';
        
        # Primary Key of the Table
        protected $pk    = 'id';
}