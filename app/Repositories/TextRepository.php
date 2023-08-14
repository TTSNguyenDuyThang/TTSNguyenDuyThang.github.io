<?php
namespace App\Repositories;

use App\Models\Text;

class TextRepository
{
    protected $model;

    public function __construct(Text $texts)
    {
        $this->model = $texts;
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
        $texts = $this->find($id);
        $texts->update($data);

        return $texts;
    }

    public function delete($id)
    {
        $texts = $this->find($id);
        $texts->delete();

        return $texts;
    }
}
