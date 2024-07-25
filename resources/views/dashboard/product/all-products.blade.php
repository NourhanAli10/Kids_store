@extends('dashboard.master')

@section('content')
    <div class="col-lg-9 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <h4 class="card-title">Products</h4>
                        <a href="#" class="d-block mb-4">dashboard/Products</a>
                    </div>
                    <div class="col-3 text-end">
                        <a href="{{ route('dashboard.create_product') }}" class="btn btn-lg category-btn">Add new Product</a>
                    </div>
                </div>

                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">

                            <th> Product Name </th>
                            <th> Code </th>
                            <th> Brand </th>
                            <th> Category </th>
                            <th> Quantity </th>
                            <th> Colors </th>
                            <th> Sizes </th>
                            <th> Price </th>
                            <th> Status </th>
                            <th> Created by</th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($products->IsNotEmpty())
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->code }}</td>
                                    <td>{{ $product->brand_id }}</td>
                                    <td>{{ $product->category_id }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>
                                        @foreach ($product->colors as $color)
                                        {{ $color->name }} <br>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($product->sizes as $size)
                                        {{$size->name }} <br>
                                        @endforeach
                                    </td>
                                    <td>{{ $product->price }}</td>
                                    <td>
                                        @if($product->status === 'available')
                                            <span class="badge bg-success">Available</span>
                                        @else
                                            <span class="badge bg-danger">Not Available</span>
                                        @endif
                                    </td>
                                    <td>{{ $product->created_by }}</td>
                                    <td>
                                        <a href="" class="me-3 text-primary"><i
                                                class="mdi mdi-pencil font-size-18"></i></a>
                                        <button type="submit" class="text-danger"><i
                                                class="mdi mdi-close font-size-18"></i></button>
                                    </td>
                                </tr>
                            @endforeach

                        @else
                            <tr>
                                <td colspan="8" class="text-center">No Products are currently here</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
