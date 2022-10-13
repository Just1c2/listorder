@extends('listorders.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">List Order</h2>
        </div>
    </div>

    @if(sizeof($listorders) > 0)
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Order Date</th>
                <th>Customer ID</th>
                <th>Qty.</th>
                <th>Pick Up Date</th>
                <th width="280px">More</th>
            </tr>
            @foreach ($listorders as $listorder)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $listorder->order_date }}</td>
                    <td>{{ $listorder->customer_id }}</td>
                    <td>{{ $listorder->qty }}</td>
                    <td>
                        <form action="{{ route('listorders.destroy',$listorder->id) }}" 
                            method="POST">
                            <a class="btn btn-info" 
                            href="{{ route('listorders.show',$listorder->id) }}">Show</a>
                            <a class="btn btn-primary" 
                            href="{{ route('listorders.edit',$listorder->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <div class="alert alert-alert">Start Adding to the Database.</div>
    @endif

    {!! $listorders->links() !!}
@endsection
