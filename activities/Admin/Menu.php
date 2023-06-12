<?php

namespace Admin;

use database\DataBase;

class Menu extends Admin{ 
        
        public function index()
        {
                $db = new DataBase();
                $menus = $db->select('SELECT m1.*, m2.name AS parent_name FROM menus m1 LEFT JOIN menus m2 ON m1.parent_id = m2.id ORDER BY id DESC');
                require_once(BASE_PATH . '/template/admin/menus/index.php');
        }

        public function create()
        {
                $db = new DataBase();
                $menus = $db->select('SELECT * FROM menus WHERE parent_id IS NULL ORDER BY `id` DESC ');
                require_once(BASE_PATH . '/template/admin/menus/create.php');
        }

        public function store($request)
        {
                $db = new DataBase();
                $db->insert('menus', array_keys(array_filter($request)), array_filter($request));
                $this->redirect('admin/menu');
        }

        public function edit($id)
        {
                $db = new DataBase();
                $menu = $db->select('SELECT * FROM menus WHERE id = ?;', [$id])->fetch();
                $menus = $db->select('SELECT * FROM menus WHERE parent_id IS NULL;');
                require_once(BASE_PATH . '/template/admin/menus/edit.php');
        }

        public function update($request, $id)
        {
                $db = new DataBase();
                $db->update('menus', $id, array_keys($request), $request);
                $this->redirect('admin/menu');

        }

        public function delete($id)
        {
                $db = new DataBase();
                $db->delete('menus', $id);
                $this->redirect('admin/menu');
        }
}