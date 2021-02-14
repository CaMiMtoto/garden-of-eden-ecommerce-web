<?php

namespace App\Http\Controllers;

use App\Jobs\OrderStatusUpdated;
use App\Jobs\ProcessOrder;
use App\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('admins.orders');
    }


    public function all(Request $request)
    {
        $columns = array(
            0 => 'created_at',
            1 => 'clientName',
            2 => 'clientPhone',
            3 => 'status'
        );

        $totalData = Order::count();
        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        if (empty($request->input('search.value')))
        {
            $orders = Order::with('user')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        }
        else
        {
            $search = $request->input('search.value');
            $orders = Order::with('user')
                ->where('clientName', 'LIKE', "%{$search}%")
                ->orWhere('clientPhone', 'LIKE', "%{$search}%")
                ->orWhere('created_at', 'LIKE', "%{$search}%")
                ->orWhere('status', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Order::with('orderItems')
                ->where('clientName', 'LIKE', "%{$search}%")
                ->orWhere('clientPhone', 'LIKE', "%{$search}%")
                ->orWhere('created_at', 'LIKE', "%{$search}%")
                ->orWhere('status', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();
        if (!empty($orders))
        {
            foreach ($orders as $order)
            {
                $nestedData['id'] = $order->id;
                $nestedData['clientName'] = $order->clientName;
                $nestedData['clientPhone'] = $order->clientPhone;
                $nestedData['status'] = $order->status;
                $nestedData['user'] = $order->user;
                $nestedData['created_at'] = date('j M Y h:i a', strtotime($order->created_at));
                $data[] = $nestedData;

            }
        }

        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );
        echo json_encode($json_data);
    }

    public function show($id)
    {
        //
        $obj = Order::with("orderItems.product")->find($id);
        if (!$obj)
        {
            return \response()->json(["message" => "Not found"], 404);
        }
        return view("admins.orderDetails", ['order' => $obj]);
    }

    public function printOrder($id)
    {
        //
        $obj = Order::with("orderItems.product")->find($id);
        if (!$obj)
        {
            return \response()->json(["message" => "Not found"], 404);
        }
        return view("admins.printOrder", ['order' => $obj]);
    }


    public function mark(Request $request): JsonResponse
    {
        $order = Order::query()->find($request->input('id'));
        $prevStatus = $order->status;
        if (!$order)
        {
            return \response()->json(["message" => "Not found"], 404);
        }
        $order->status = $request->input('status');
        $order->update();

        if ($order->status != $prevStatus)
            OrderStatusUpdated::dispatch($order, auth()->user());

        return \response()->json(["data" => $order], 204);
    }

    public function orderSuccess($id)
    {
        $order = Order::find($id);
        if (!$order) abort(404);
        return view('clients.order-success', ['order' => $order])
            ->with('message', " You successfully placed orders");
    }

}
