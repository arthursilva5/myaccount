@extends('layouts.dashboard')

@section('content')

<div class="col-sm-16 col-xs-12">
    <div class="card">
        <div class="card-header">
          My Orders
        </div>
        <div class="card-body">
          
            <!-- table -->
            <table class="table table-hover">
                <tr>
                    <td><strong>ID</strong></td>
                    <td><strong>Product</strong></td>
                    <td><strong>Domain Name</strong></td>
                    <td><strong>Order's Date</strong></td>
                    <td><strong>Next Due Date</strong></td>
                    <td><strong>Actions</strong></td>
                </tr>
                <?php foreach ($orders as $order) { ?>
                <tr>
                    <td>{{ $order->order_id }}</td>
                    <td>{{ $order->product_name }}</td>
                    <td>{{ $order->domain_name }}</td>
                    <td><?php echo App\Http\Controllers\HelperController::funcDateTimeMysqlToUSA($order->created_at);  ?></td>
                    <td><span class="text-danger"><?php echo App\Http\Controllers\HelperController::funcDateMysqlToUSA($order->next_duedate); ?></span></td>
                    <td>
                        <div class="row">
                        <div class="col-md-3"> 
                            <a href="{{ url('orders'.'/'.$order->order_id) }}" title="View"><i class="fa fa-search fa-3x" aria-hidden="true"></i></a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ url('orders/server/details'.'/'.$order->order_id) }}" title="Service Details"><i class="fa fa-laptop fa-3x" aria-hidden="true"></i></a>
                        </div>
                        </div>
                    </td>
                    
                </tr>   
                <?php } ?>
            </table>            
            <!-- table -->
            
        </div>
    </div>
</div>




        
@endsection
