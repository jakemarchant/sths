@extends('layouts.structure')

@section('content')

<div class="spacer"></div>

<div class="content">

    <h1>Your Products:</h1>

    <div class="buttons text-right">
        <a href="/member/products/create">
            <button class="btn btn-primary"><i class="fa fa-plus-square"></i> Create</button>
        </a>
    </div>

    <div class="table-responsive">

        <table class="table table-striped alt">

            <thead>
                <th>Product Name </th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Action</th>
            </thead>

            <tbody>
                @forelse($member->member->products as $product)
                <tr>
                    <td>{{ $product->title }}</td>
                    <td>&pound;{{ $product->price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->status }}</td>
                    <td>
                        <a href="/member/products/edit/{{ $product->id }}">
                            <button class="btn btn-primary"><i class="fa fa-sign-in"></i></button>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">No products found. Create one now to start selling!</td>
                </tr>
                @endforelse
            </tbody>

        </table>

    </div>

</div>

@endsection
