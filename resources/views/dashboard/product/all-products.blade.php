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
                            {{-- <th> Code </th> --}}
                            <th> Brand </th>
                            <th> Category </th>
                            <th> Quantity </th>
                            <th> Colors </th>
                            <th> Sizes </th>
                            <th> Price </th>
                            <th> Status </th>
                            {{-- <th> Created by</th> --}}
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($products->IsNotEmpty())
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    {{-- <td>{{ $product->code }}</td> --}}
                                    <td>{{ $product->brand_id }}</td>
                                    <td>{{ $product->category->name }}</td>
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
                                    {{-- <td>{{ $product->created_by }}</td> --}}
                                    <td>
                                        <a href="{{ route('dashboard.update-product', $product->id) }}" class="btn btn-md px-5 fs-6 py-3 btn-rounded">Edit</a>
                                        <form method="POST" action="{{ route('dashboard.delete-product', $product->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-md mt-2 px-5 py-3 fs-6 btn-rounded delete-btn">Delete</button>
                                        </form>
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
