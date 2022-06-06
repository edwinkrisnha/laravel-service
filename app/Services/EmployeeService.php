<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Models\Employee;

class EmployeeService
{
    protected $model;

    public function __construct()
    {
      $this->model = new Employee();
    }

    public function get_model()
    {
      return $this->model;
    }

    public function get_model_by_id($id)
    {
      return $this->model->where('id', $id)->first();
    }

    public function get_data()
    {
      $models = $this->model->where( 'status', 1 );
      return $models->get();
    }

    public function save($request, $id = null)
    {
      if ( is_null($id) ) {
        $model = $this->get_model();
      } else {
        $model = $this->get_model_by_id($id);
      }

      $model->username = $request->username;
      $model->fullname = $request->fullname;
      $model->email = $request->email;
      $model->mobile = $request->mobile;
      $model->birthday = $request->birthday;
      $model->save();

      return $model;
    }

    public function delete($id)
    {
      $model = $this->get_model_by_id($id);
      $model->status = 0;
      $model->deleted_at = Carbon::now();
      $model->save();

      return $model;
    }
}
