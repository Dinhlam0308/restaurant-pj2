<?php
namespace App\Http\Controllers;
use  App\Models\OrderDetail;
use Illuminate\Http\Request;
class OrderDetailsController extends Controller
{
    public function updateStatus(Request $request, $id)
    {
        $detail = OrderDetail::findOrFail($id);
        $detail->kitchen_status = $request->input('kitchen_status');
        $detail->save();

        return response()->json(['message' => 'Cập nhật trạng thái thành công.']);
    }

}
