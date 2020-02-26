<?php
class Model_Post extends \Orm\Model {

  protected static $_table_name = 'post'; //テーブル名を指定
  protected static $_primary_key = array('id'); //プライマリーキーを指定
  # テーブルに定義したすべての列を記述
  protected static $_properties = array('id', 'title', 'thought','created_at', 'updated_at');
}


// class Model_Post extends \Model_Crud{
//     //①テーブルの名前を登録する
//     protected static $_table_name = 'contents';
//     //②テーブルの主キーを登録する
//     protected static $_primary_key = 'id';
// }
