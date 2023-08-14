<?php
namespace App\Repositories;
use App\Http\Controllers\Api\TextConfigController;
use App\Models\TextConfig;

class TextConfigRepository
{
    protected $model;

    public function __construct(TextConfig $text_config)
    {
        $this->model = $text_config;
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
        $text_config = $this->find($id);
        $text_config->update($data);

        return $text_config;
    }

    public function delete($id)
    {
        $text_config = $this->find($id);
        $text_config->delete();

        return $text_config;
    }
}
