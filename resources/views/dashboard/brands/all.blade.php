@extends('dashboard.master')

@section('title', 'Brands')

    @push('css')
        <style>
            .category-btn {
                background-color: #ee6394;
                color: #ffffff;
                padding: 20px 20px !important;

            }

            .delete-btn {

                width:127px;
            }
        </style>
    @endpush

@section('content')

    <div class="col-lg-9 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <h4 class="card-title">Brands</h4>
                        <a href="#" class="d-block mb-4">dashboard/brands</a>
                    </div>
                    <div class="col-3 text-end">
                        <a href="{{ route('dashboard.add-brand') }}" class="btn btn-lg category-btn">Add new brand</a>
                    </div>
                </div>
                @if (session()->has('success'))
                <div class="alert alert-success text-center ">
                    {{ session('success') }}
                </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th> ID </th>
                            <th> Name </th>
                            <th> Status </th>
                            <th> Created at </th>
                            <th> Updated at </th>
                            <th> Created by</th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($brands->isNotEmpty())
                            @foreach ($brands as $brand)
                                <tr>
                                    <td> {{ $brand->id }} </td>
                                    <td> {{ $brand->name }} </td>
                                    <td> {{ $brand->status }} </td>
                                    <td> {{ date('d-m-Y', strtotime($brand->created_at ))}} </td>
                                    <td> {{ date('d-m-Y', strtotime($brand->updated_at)) }} </td>
                                    <td> {{ $brand->created_by }}</td>
                                    <td>
                                        <a href="{{ route('dashboard.update-brand', $brand->id) }}" class="btn btn-md px-5 fs-6 py-3 btn-rounded">Edit</a>
                                        <form method="POST" action="{{ route('dashboard.delete-brand', $brand->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-md mt-2 px-5 py-3 fs-6 btn-rounded delete-btn">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                        <tr>
                            <td colspan="7" class="text-center">No Brands are currently here</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
