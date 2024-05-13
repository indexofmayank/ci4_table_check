<?php

namespace App\Controllers;

use App\Libraries\Crud;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Users extends BaseController
{
    protected $crud;

    function __construct() {
        $params = [
            'table' => 'users',
            'dev'=> false,
            'fields' => $this->field_options(),
            'form_title_add' => 'Add User',
            'form_title_update' => 'Edit User',
            'form_submit' => 'Add',
            'table_title' => 'Users',
            'form_submit_update' => 'Update',
            'base' => '',
        ];

        $this->crud = new Crud($params, service('request'));
    }

    public function index()
    {
        $page = 1;
        if(isset($_GET['page'])) {
            $page = (int) $_GET['page'];
            $page = max(1, $page);
        }

        $per_page = 20;
        $columns = ['u_firstname', 'u_lastname', 'u_email', 'u_status'];
        $where = null;
        $order = [
            ['u_id', 'ASC']
        ];
        
        $data['title'] = $this->crud->getTableTitle();
        $data['table'] = $this->crud->view($page, $per_page, $columns, $where, $order );
        return view('admin/users/table', $data);
    }

    protected function field_options() {
        $fields = [];

        $fields['u_firstname'] = ['label' => 'First Name'];
        $fields['u_lastname'] = ['label' => 'Last Name'];
    }
}
