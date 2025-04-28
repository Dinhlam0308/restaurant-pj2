<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    // Lấy danh sách món ăn
    public function index()
    {
        return response()->json(Food::all());
    }

    // Tạo món ăn mới
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'status' => 'required|in:còn hàng,hết hàng',
        ]);

        $food = Food::create($validated);

        return response()->json($food, 201);
    }

    // Xem chi tiết món ăn
    public function show($id)
    {
        $food = Food::findOrFail($id);
        return response()->json($food);
    }

    // Cập nhật món ăn
    public function update(Request $request, $id)
    {
        $food = Food::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'price' => 'sometimes|required|numeric',
            'status' => 'sometimes|required|in:còn hàng,hết hàng',
        ]);

        $food->update($validated);

        return response()->json($food);
    }

    // Xoá món ăn
    public function destroy($id)
    {
        $food = Food::findOrFail($id);
        $food->delete();

        return response()->json(['message' => 'Deleted successfully']);
    }
}
