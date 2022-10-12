<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EnquiryModel;

class EnquiryController extends BaseController
{
    public function index()
    {
        $enquiryModel = new EnquiryModel();
        $enquiryData = $enquiryModel->orderBy("id", "desc")->findAll();
        $data = [
            "enquiry"=>"active",
            "data"=>$enquiryData
        ];
        return view("enquiry/index", $data);
    }

    public function deleteEnquiry($id)
    {
        $model = new EnquiryModel();
        $data = $model->delete($id);
        $session = session();
        if($data) {
            $session->setFlashdata('msg', "Enquiry has been delete Successfully");
        }else {
            $session->setFlashdata('msg', "Enquiry Could not delete");
        }
        return redirect()->to('admin/enquiry');
    }
}
