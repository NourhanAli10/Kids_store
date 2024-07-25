@extends('dashboard.master')

@section('title')

@push('css')
        <style>
            .category-btn {
                background-color: #ee6394;
                color: #ffffff;
                padding: 20px 20px !important;

            }
        </style>
@endpush

@section('content')

    <div class="col-lg-9 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <h4 class="card-title">Colors</h4>
                        <a href="#" class="d-block mb-4">dashboard/colors</a>
                    </div>
                    <div class="col-3 text-end">
                        <a href="{{ route('dashboard.add-color') }}" class="btn btn-lg category-btn">Add new color</a>
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
                            <th> Color </th>
                            <th> Code </th>
                            <th> Created at </th>
                            <th> Updated at </th>
                            <th> Created by</th>
                            <th> Actions </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($colors->isNotEmpty())
                            @foreach ($colors as $color)
                                <tr class="text-center">
                                    <td> {{ $color->id }} </td>
                                    <td> {{ $color->name }} </td>
                                    <td> {{ $color->code }} </td>
                                    <td> {{ date('d-m-Y', strtotime($color->created_at ))}} </td>
                                    <td> {{ date('d-m-Y', strtotime($color->updated_at)) }} </td>
                                    <td> {{ $color->created_by }}</td>
                                    <td class="d-flex justify-content-center align-items-center">
                                        <a href="{{ route('dashboard.update-color', $color->id) }}" class="mx-2 text-primary">
                                            <i class="mdi mdi-pencil font-size-18"></i>
                                        </a>
                                        <form method="POST" action="{{ route('dashboard.delete-color', $color->id) }}" class="">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-danger icon-button">
                                                <i class="mdi mdi-close font-size-18"></i>
                                            </button
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                        <tr>
                            <td colspan="7" class="text-center">No Colors are currently here</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
