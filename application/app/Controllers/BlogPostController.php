<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BlogCategoryModel;
use App\Models\BlogPostModel;
use App\Models\BlogTagModel;

class BlogPostController extends BaseController
{
    public function index()
    {
        helper("text");
        $blog = new BlogPostModel();
        $data = $blog->orderBy("id", "desc")->findAll();

        $data = [
            "data"=>$data,
            "blogpost"=>"active"
        ];
        return view ("blog/index", $data);
    }

    public function addPost(){
        if($this->request->getPostGet()){
            $session = session();
            $blogPost = new BlogPostModel();
            try {
                /*check image is valid or not*/
                $validationRule = [
                    'image' => [
                        'label' => 'Post Image',
                        'rules' => 'uploaded[image]'
                            . '|is_image[image]'
                            . '|mime_in[image,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    ],
                ];
                if (! $this->validate($validationRule)) {
                    $session->setFlashdata("err","Please uploaded valid image");
                }else {
                    $realName = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);
                    $file = $this->request->getFile("image");
                    $randomName = $file->getRandomName();
                    $name = $realName."_".$randomName;

                    /*compress image*/
                    $image = \Config\Services::image()
                        ->withFile($file)
                        ->withResource()
                        ->save('img/blog/compress/' .$name,75);

                    /*after save compress image, save also origin file*/
                    $file->move("img/blog/original/", $name);
                    $_POST['image'] =  $name;
                    $data = array_map("strtolower", $_POST);
                    $blogPost->save($data);
                    $session->setFlashdata("msg","Blog post added successfully");
                    return redirect()->route("admin/blog-post");
                }
            }catch (\Exception $e){
                $session->setFlashdata("err","Error : ".$e->getMessage());
            }
            return redirect()->route("admin/blog-post/add");
        }
        $categoryModel = new BlogCategoryModel();
        $category = $categoryModel->orderBy("id", "desc")->findAll();
        $data = array(
            "blogpost"=>"active",
            "category"=>$category
        );
        return view("blog/add", $data);
    }

    public function editPost($id){
        $blog = new BlogPostModel();
        $blogData = $blog->find($id);
        $category = new BlogCategoryModel();
        $data = [
            "blogpost"=>"active",
            "data"=>$blogData,
            "category"=>$category->orderBy("id", "desc")->findAll()
        ];
        return view("blog/update", $data);
    }

    public function updatePost(){
        if($this->request->getPostGet()){
            $session = session();
            $blogPost = new BlogPostModel();
            $data = $blogPost->find($this->request->getVar("id"));
            try {
                if($_FILES['image']['name']!==""){
                    /*check image is valid or not*/
                    $validationRule = [
                        'image' => [
                            'label' => 'Post Image',
                            'rules' => 'uploaded[image]'
                                . '|is_image[image]'
                                . '|mime_in[image,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                        ],
                    ];
                    if (! $this->validate($validationRule)) {
                        $session->setFlashdata("err","Please uploaded valid image");
                    }else {
                        $realName = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);
                        $file = $this->request->getFile("image");
                        $randomName = $file->getRandomName();
                        $name = $realName."_".$randomName;

                        /*compress image*/
                        $image = \Config\Services::image()
                            ->withFile($file)
                            ->withResource()
                            ->save('img/blog/compress/' .$name,75);

                        /*after save compress image, save also origin file*/
                        $file->move("img/blog/original/", $name);
                        $_POST['image'] =  $name;
                    }
                }else {
                    $_POST['image'] =  $data['image'];
                }
                $data = array_map("strtolower", $_POST);
                $blogPost->save($data);
                $session->setFlashdata("msg","Blog post updated successfully");
                return redirect()->route("admin/blog-post");
            }catch (\Exception $e){
                $session->setFlashdata("err","Error : ".$e->getMessage());
            }
            return redirect()->route("admin/blog-post/edit/".$this->request->getVar('id'));
        }
        $data = array(
            "blogpost"=>"active"
        );
        return view("blog/add", $data);
    }

    public function deletePost($id)
    {
        $model = new BlogPostModel();
        $data = $model->delete($id);
        $session = session();
        if($data) {
            $session->setFlashdata('msg', "Post Deleted Successfully");
        }else {
            $session->setFlashdata('msg', "Post Could not delete");
        }
        return redirect()->to("admin/blog-post");
    }



    /*FRONTEND WORKS START*/
    public function showBlog(){

        helper("text");

        $blog = new BlogPostModel();
        $blogData = $blog->findAll();
        $recentBlog = $blog->orderBy("id", "desc")->limit("6")->findAll();

        $category = new BlogCategoryModel();
        $recentCategory = $category->orderBy("id", "desc")->limit("6")->findAll();

        $tag  = new BlogTagModel();
        $tagData = $tag->orderBy("id", "name")->findAll();

        $data = [
            "blog"=>$blogData,
            "recentBlog"=>$recentBlog,
            "recentCategory"=>$recentCategory,
            "tag"=>$tagData
        ];
        return view ("blog", $data);
    }


    public function blogDetails($id){
        $blog = new BlogPostModel();
        $blogData = $blog->find($id);

        $recentBlog = $blog->orderBy("id", "desc")->limit("6")->findAll();

        $category = new BlogCategoryModel();
        $recentCategory = $category->orderBy("id", "desc")->limit("6")->findAll();
        $tagModel = new BlogTagModel();
        $data = [
            "b"=>$blogData,
            "recentBlog"=>$recentBlog,
            "recentCategory"=>$recentCategory,
            "tag"=>$tagModel->orderBy("id", "desc")->findAll()
        ];
        return view ("blog-details", $data);
    }
}
