<?php
namespace App\Repositories;

use App\Models\Page;

class PageRepository
{
    protected $model;

    public function __construct(Page $pages)
    {
        $this->model = $pages;
    }

    public function getAll()
    {
        return $this->model->latest()->get();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $pages = $this->find($id);
        $pages->update($data);

        return $pages;
    }

    public function delete($id)
    {
        $pages = $this->find($id);
        $pages->delete();

        return $pages;
    }
}
