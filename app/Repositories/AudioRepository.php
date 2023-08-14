<?php
namespace App\Repositories;
use App\Http\Controllers\Api\AudioController;
use App\Models\Audio;

class AudioRepository
{
    protected $model;

    public function __construct(Audio $audios)
    {
        $this->model = $audios;
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
        $audios = $this->find($id);
        $audios->update($data);

        return $audios;
    }

    public function delete($id)
    {
        $audios = $this->find($id);
        $audios->delete();

        return $audios;
    }
}
