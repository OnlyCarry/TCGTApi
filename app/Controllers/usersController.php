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
        log_message('error', "runed constructor");
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
            $userModer = new UserModel();

            $user = $this->request->getJSON();
            log_message('error', json_encode($user));
            if($userModer->save($user)):
                //$user->id = $this->model->insertID();
                $token = $userModer->generateAccessToken($user->id);
                return $this->respondCreated($token->raw_token);
            else:
                return $this->failValidationError($userModer->validation->listErrors());
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