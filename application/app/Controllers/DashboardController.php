<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\BlogCategoryModel;
use App\Models\BlogPostModel;
use App\Models\EnquiryModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $blogModel = new BlogPostModel();
        $categoryModel = new BlogCategoryModel();
        $enquiryModel = new EnquiryModel();
        $adminModel = new AdminModel();
        $data = [
            "dashboard"=>"active",
            "post"=>count($blogModel->findAll()),
            "category"=>count($categoryModel->findAll()),
            "admin"=>count($adminModel->findAll()),
            "enquiry"=>count($enquiryModel->findAll()),
        ];
        return view("dashboard", $data);
    }
}
