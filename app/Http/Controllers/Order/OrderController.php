<?php

namespace App\Http\Controllers\Order;

use App\Filters\OrderFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Order\StoreRequest;
use App\Http\Requests\Order\UpdateRequest;
use App\Services\Order\CreateOrderService;
use App\Http\Resources\Order\OrderResource;
use App\Models\Order;
use App\Services\Order\UpdateOrderService;
use App\Support\Response;
use App\Support\PaginationMeta;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    
    public function allOrders(OrderFilter $filter) 
    {
        $query = Order::with(['user', 'items.product']);
        $orders = $filter->apply($query)
            ->latest()
            ->paginate(10);

        return Response::success([
            'results' => OrderResource::collection($orders),
            'meta' => PaginationMeta::from($orders)
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, OrderFilter $filter)
    {
        $query = $request->user()
        ->orders()
        ->with('items.product');

        $orders = $filter->apply($query)
            ->latest()
            ->paginate(10);

        return Response::success([
            'results' => OrderResource::collection($orders),
            'meta' => PaginationMeta::from($orders)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request, CreateOrderService $service)
    {
        $oder = $service->execute(
            $request->user(), 
            $request->validated()['items']
        );

        return Response::success(new OrderResource($oder), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $order->loadMissing('items.product');
        return Response::success(new OrderResource($order));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Order $order, UpdateOrderService $service)
    {
        
        $service->execute(
            $order,
            $request->validated('status')
        );

        return Response::success(new OrderResource($order));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        if ($order->status !== "pending") {
            return Response::error(403, 'Faqat kutilayotgan buyurtmani bekor qilish mumkin.');
        }

        $order->delete();
        return response()->noContent();
    }
}
