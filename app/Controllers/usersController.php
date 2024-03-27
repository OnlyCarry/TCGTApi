<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\Shield\Entities\User;


class UsersController extends ResourceController
{

    public function _construct()
    {
        $this->model = $this->setModel(new UserModel());
    }

    /*public function index()
    {
        // Your code here
    }

    public function show($id)
    {
        // Your code here
    }*/

    public function create()
    {
        try {
            $user = $this->request->getJSON();
            if($this->model->save($user)):
                //$user->id = $this->model->insertID();
                $token = $this->model->generateAccessToken($user->id);
                return $this->respondCreated($token->raw_token);
            else:
                return $this->failValidationError($this->model->validation->listErrors());
            endif;
        } catch (\Exception $e) {
            return $this->failServerError('An error has occurred');
        }
        
    }

    /*public function update($id)
    {
        // Your code here
    }

    public function delete($id)
    {
        // Your code here
    }*/
}