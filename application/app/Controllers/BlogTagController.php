<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BlogCategoryModel;
use App\Models\BlogPostModel;
use App\Models\BlogTagModel;

class BlogTagController extends BaseController
{
    public function index()
    {
        $blog = new BlogTagModel();
        $data = $blog->orderBy("id", "desc")->findAll();
        $data = [
            "data"=>$data,
            "blogtag"=>"active"
        ];
        return view ("blog_tag/index", $data);
    }

    public function addTag()
    {
        if($this->request->getPostGet()){
            try {
                $session =  session();
                $model = new BlogTagModel();
                $data = array_map("strtolower", $_POST);
                $model->save($data);

                $session->setFlashdata('msg', 'Blog Tag added successfully');
                return redirect()->to('admin/blog-tag');
            }catch(\Exception $e){
                $session->setFlashdata('err', 'Error'.$e->getMessage());
                return redirect()->to('admin/blog-tag/add');
            }
        }else {
            $post = new BlogPostModel();
            $data =  $post->select("title")->orderBy("id", "desc")->findAll();
            return view('blog_tag/add', ["blogtag"=>"active", "data"=>$data]);
        }
    }


    public function deleteTag($id)
    {
        $categoryModel = new BlogTagModel();
        $cresult = $categoryModel->delete($id);

        $session = session();
        if($cresult) {
            $session->setFlashdata('msg', "Blog Tag has been deleted");
        }else {
            $session->setFlashdata('err', "Blog Tag Could not delete");
        }
        return redirect()->to("admin/blog-tag");
    }
}
