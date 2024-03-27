<?php

namespace App\Controllers;

use App\Models\TournamentsModel;
use CodeIgniter\Controller;
use CodeIgniter\RESTful\ResourceController;

class TournamentsController extends ResourceController
{

    public function __construct()
    {
        $this->model = $this->setModel(new TournamentsModel());
    }

    public function index()
    {
        $model = new TournamentsModel();
        $data['tournaments'] = $model->findAll();

        return view('tournaments/index', $data);
    }

    public function lastest() {
        try {
            $data = $this->model->orderBy('start_date', 'DESC')->findAll(5);
            if($data):
                return $this->respondCreated($data);
            else:
                return $this->failValidationError('An error has occurred');
            endif;
        } catch (\Exception $e) {
            return $this->failServerError('An error has occurred');
        }
    }	

    public function create()
    {
        return view('tournaments/create');
    }

    public function store()
    {
        $model = new TournamentsModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'date' => $this->request->getPost('date'),
            // Add more fields as needed
        ];

        $model->insert($data);

        return redirect()->to('/tournaments');
    }

    public function edit($id)
    {
        $model = new TournamentsModel();
        $data['tournament'] = $model->find($id);

        return view('tournaments/edit', $data);
    }

    public function update($id)
    {
        $model = new TournamentsModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'date' => $this->request->getPost('date'),
            // Add more fields as needed
        ];

        $model->update($id, $data);

        return redirect()->to('/tournaments');
    }

    public function delete($id)
    {
        $model = new TournamentsModel();
        $model->delete($id);

        return redirect()->to('/tournaments');
    }
}