<?php

namespace App\Repositories;

use App\Models\Content;

class ContentRepository extends Repository {
    public function getContentById($id) {
        return Content::find($id);
    }

    public function insertContent($data) {
        $content = new Content();
        $content->body = json_encode($data['body']);
        $content->title = 'Title';
        $content->excerpt = 'excerpt';
        $content->save();
    }
}