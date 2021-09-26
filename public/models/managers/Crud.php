<?php 
interface Crud{

    public function findAll();
    public function findBy($field, $value);
    public function Delete($id);
    public function update($objet);
    public function insert($objet);
    public function transformDatas($datas);
}
?>