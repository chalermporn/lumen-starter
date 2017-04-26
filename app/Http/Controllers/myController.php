<?php

namespace App\Http\Controllers;

use App\MyModel;
use Illuminate\Http\Request;

class MyController extends Controller
{
    function __construct()
    {

    }

    function getData(Request $request)
    {
        $myModel = new MyModel();
        $data = $myModel->getTestData();
        $success = is_object($data) && count($data) > 0 ? true : false;
        $returnData = [
            'success' => $success,
            'message' => '',
            'data' => $data
        ];
        return json_encode($returnData);
    }

    function addData(Request $request)
    {
        $myModel = new MyModel();
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'number' => $request->input('number')
        ];

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'number' => 'required'
        ]);

        $check = $myModel->addTestData($data);
        if ($check) {
            $success = true;
            $message = "added successfully";
        } else {
            $success = false;
            $message = "data not added";
        }
        $returnData = [
            'success' => $success,
            'message' => $message
        ];
        return json_encode($returnData);
    }

    function editData(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'number' => 'required'
        ]);
        $myModel = new MyModel();
        $id = $request->input('id');
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'number' => $request->input('number')
        ];
        $check = $myModel->editData($id, $data);
        if ($check) {
            $success = true;
            $message = "$id : edited successfully";
        } else {
            $success = false;
            $message = "$id : not edited";
        }
        $returnData = [
            'success' => $success,
            'message' => $message
        ];
        return json_encode($returnData);
    }

    function deleteData(Request $request)
    {
        $this->validate($request, [
            'id' => 'required'
        ]);
        $myModel = new MyModel();
        $id = $request->input('id');
        $check = $myModel->deleteData($id);

        if ($check) {
            $success = true;
            $message = "$id : deleted successfully";
        } else {
            $success = false;
            $message = "$id : not deleted";
        }
        $returnData = [
            'success' => $success,
            'message' => $message
        ];
        return json_encode($returnData);
    }
}