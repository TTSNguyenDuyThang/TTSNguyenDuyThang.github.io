<?php

namespace App\Repository;

use App\Models\Story;

class StoryRepository
{
    /**
     * Lấy danh sách các story.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllStories()
    {
        return Story::all();
    }

    /**
     * Lấy thông tin của một story dựa trên ID.
     *
     * @param  int  $id
     * @return \App\Models\Story|null
     */
    public function getStoryById($id)
    {
        return Story::find($id);
    }

    /**
     * Tạo một story mới.
     *
     * @param  array  $data
     * @return \App\Models\Story
     */
    public function createStory($data)
    {
        return Story::create($data);
    }

    /**
     * Cập nhật thông tin của một story dựa trên ID.
     *
     * @param  int  $id
     * @param  array  $data
     * @return bool
     */
    public function updateStory($id, $data)
    {
        $story = $this->getStoryById($id);

        if (!$story) {
            return false;
        }

        return $story->update($data);
    }

    /**
     * Xóa một story dựa trên ID.
     *
     * @param  int  $id
     * @return bool
     */
    public function deleteStory($id)
    {
        $story = $this->getStoryById($id);

        if (!$story) {
            return false;
        }

        return $story->delete();
    }
}
