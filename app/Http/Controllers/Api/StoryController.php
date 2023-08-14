<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repository\StoryRepository;


class MyStoryController extends Controller
{
    protected $storyRepository;

    public function __construct(StoryRepository $storyRepository)
    {
        $this->storyRepository = $storyRepository;
    }

    public function index()
    {
        $stories = $this->storyRepository->getAllStories();
        return response()->json($stories);
    }

    public function show($id)
    {
        $story = $this->storyRepository->getStoryById($id);

        if ($story) {
            return response()->json($story);
        }

        return response()->json(['message' => 'Story not found.'], 404);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $story = $this->storyRepository->createStory($data);

        return response()->json($story, 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $result = $this->storyRepository->updateStory($id, $data);

        if ($result) {
            return response()->json(['message' => 'Story updated successfully.']);
        }

        return response()->json(['message' => 'Story not found.'], 404);
    }

    public function destroy($id)
    {
        $result = $this->storyRepository->deleteStory($id);

        if ($result) {
            return response()->json(['message' => 'Story deleted successfully.']);
        }

        return response()->json(['message' => 'Story not found.'], 404);
    }
}
