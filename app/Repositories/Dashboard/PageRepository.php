<?php

namespace App\Repositories\Dashboard;

use App\Models\Page;

class PageRepository
{
    // get page
    public function getPage($id)
    {
        return Page::find($id);
    }

    // get pages
    public function getPages()
    {
        return Page::latest()->get();
    }

    // store page
    public function store($data)
    {
        return Page::create($data);
    }

    // update page
    public function update($page, $data)
    {
        return $page->update($data);
    }

    //destroy page
    public function destroy($page)
    {
        return $page->forceDelete();
    }

    // change status
    public function changeStatus($page, $status)
    {
        return $page->update([
            'status' => $status,
        ]);
    }

    // delete photo
    public function deletePhoto($page)
    {
        return $page->update([
            'photo' => '',
        ]);
    }
}
