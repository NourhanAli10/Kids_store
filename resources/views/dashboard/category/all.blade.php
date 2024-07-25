@extends('dashboard.master')

@section('title')

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
                        <h4 class="card-title">Categories</h4>
                        <a href="#" class="d-block mb-4">dashboard/categories</a>
                    </div>
                    <div class="col-3 text-end">
                        <a href="{{ route('admin.add-category') }}" class="btn btn-lg category-btn">Add new category</a>
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
                            <th> Actions </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($categories->isNotEmpty())
                            @foreach ($categories as $category)
                                <tr>
                                    <td> {{ $category->id }} </td>
                                    <td> {{ $category->name }} </td>
                                    <td> {{ $category->status }} </td>
                                    <td> {{ date('d-m-Y', strtotime($category->created_at ))}} </td>
                                    <td> {{ date('d-m-Y', strtotime($category->updated_at)) }} </td>
                                    <td> {{ $category->created_by }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.update-category', $category->id) }}" class="btn btn-md px-4 fs-6 py-2 btn-rounded delete-btn">Edit</a>
                                        <form method="POST" action="{{ route('admin.delete-category', $category->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-md mt-2 px-4 py-2 fs-6 btn-rounded delete-btn">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                        <tr>
                            <td colspan="7" class="text-center">No categories are currently here</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
