<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BlogCategoryModel;
use App\Models\BlogPostModel;

class BlogCategoryController extends BaseController
{
    public function index()
    {
        $blog = new BlogCategoryModel();
        $data = $blog->orderBy("id", "desc")->findAll();
        $data = [
            "data"=>$data,
            "blogcategory"=>"active"
        ];
        return view ("blog_category/index", $data);
    }

    public function addCategory()
    {
        if($this->request->getPostGet()){
            try {
                $session =  session();
                $model = new BlogCategoryModel();
                $model->save($_POST);

                $session->setFlashdata('msg', 'Blog Category added successfully');
                return redirect()->to('admin/blog-category');
            }catch(\Exception $e){
                $session->setFlashdata('err', 'Error'.$e->getMessage());
                return redirect()->to('admin/blog-category/add');
            }
        }else {
            return view('blog_category/add', ["blogcategory"=>"active"]);
        }
    }


    public function deleteCategory($id)
    {
        $categoryModel = new BlogCategoryModel();
        $postModel = new BlogPostModel();

        $data = $categoryModel->find($id);
        $presult = $postModel->where("category",$data['name'])->delete();
        $cresult = $categoryModel->delete($id);

        $session = session();
        if($presult && $cresult) {
            $session->setFlashdata('msg', "Blog Category has been deleted with all those category post");
        }else {
            $session->setFlashdata('err', "Blog Category Could not delete");
        }
        return redirect()->to("admin/blog-category");
    }
}
