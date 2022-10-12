<?php

namespace App\Controllers;

use App\Models\BlogCategoryModel;
use App\Models\BlogPostModel;
use App\Models\BlogTagModel;


class SearchEngineController extends BaseController
{
    public function index()
    {
        helper("text");
        if($this->request->getPostGet()){
            $data = $this->request->getVar("data");
            $blogModel = new BlogPostModel();
            $blogData = $blogModel->orderBy("id", "desc")->orLike("id", $data, "both")
                ->orLike("title", $data, "both")
                ->orLike("category", $data, "both")
                ->orLike("privacy", $data, "both")
                ->orLike("description", $data, "both");
            $data = [
                "dashboard"=>"active",
                "data"=>$blogData->findAll(),
            ];
            return view("blog/search", $data);
        }else {
            return redirect()->to("admin/dashboard");
        }
    }

    public function searchTag($data)
    {
        helper("text");
        $blogTag = new BlogTagModel();
        $tagData = $blogTag->where("name", strtolower($data))->findAll();

        $blogData  = [];
        foreach ($tagData as $key=>$tag){
            $blogModel = new BlogPostModel();
            $title = strtolower($tag['post_title']);
            $blogData[$key] = $blogModel->where("title", $title)->findAll();
        }

        $postModel = new BlogPostModel();
        $recentBlog = $postModel->orderBy("id", "desc")->limit("6")->findAll();

        $category = new BlogCategoryModel();
        $recentCategory = $category->orderBy("id", "desc")->limit("6")->findAll();

        $data = [
            "blog" =>$blogData,
            "recentBlog"=>$recentBlog,
            "recentCategory"=>$recentCategory,
            "tag"=>$blogTag->orderBy("id", "desc")->findAll(),
            "header"=>$data
        ];
        return view("tag", $data);
    }

    public function getCategoryPost($data)
    {
        helper("text");
        $blogModel = new BlogPostModel();
        $blogData = $blogModel->where("category", $data)->orderBy("id", "desc")->findAll();

        $recentBlog = $blogModel->orderBy("id", "desc")->limit("6")->findAll();

        $category = new BlogCategoryModel();
        $recentCategory = $category->orderBy("id", "desc")->limit("6")->findAll();
        $tag = new BlogTagModel();

        $data = [
            "blog" =>$blogData,
            "recentBlog"=>$recentBlog,
            "recentCategory"=>$recentCategory,
            "tag"=>$tag->orderBy("id", "desc")->findAll(),
            "header"=>$data
        ];
        return view("category", $data);
    }

}
