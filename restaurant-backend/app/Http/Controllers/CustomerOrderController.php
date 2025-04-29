<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class CustomerOrderController extends Controller
{
    public function searchForm()
    {
        return view('customer_orders.search');
    }

    public function search(Request $request)
    {
        $name = $request->input('name');

        $users = User::where('name', 'like', '%' . $name . '%')
            ->with(['orders.orderDetails.food'])
            ->get();

        return view('customer_orders.result', compact('users', 'name'));
    }
    public function apiSearch(Request $request)
    {
        $name = $request->input('name');

        $users = User::where('name', 'like', '%' . $name . '%')
            ->with(['orders.orderDetails.food'])
            ->get();

        return response()->json($users);
    }

}
