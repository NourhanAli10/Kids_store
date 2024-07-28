@extends('dashboard.master')

@section('title', 'add product')

@push('css')
    <style>
        .colors::placeholder {
            color: #6c757d;
            size: 15px;


        }

        .select2-search__field {
            width: 0 !important;
        }

        .select2-selection__choice {
            font-size: 18px !important;
            background-color: transparent !important;
            color: #0e0404000b00 !important;
        }

        .select2-selection__choice__display {

            color: #000000 !important;
            border: 1px solid #000000;

        }

        .img-thumbnail {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
        }
        .col-3 {
            flex: 0 0 25%;
            max-width: 25%;
            padding: 0.5rem;
        }
    </style>
@endpush
@section('content')
    <div class="col-9 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create Product</h4>
                <p class="card-description"> products / create</p>

                <div class="alert alert-success text-center" id="success" style="display: none;">
                </div>


                <form class="forms-sample" id="add-product" method="post" action="{{ route('dashboard.create_product') }}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="ProductName" class="mb-2">Product Name</label>
                                <input id="ProductName" name="name" type="text" class="form-control"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <p class="text-danger font-weight-bold my-2"> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="ProductPrice" class="mb-2">Price</label>
                                <input id="ProductPrice" name="price" type="number" class="form-control"
                                    value="{{ old('price') }}">
                                @error('price')
                                    <p class="text-danger font-weight-bold my-2"> {{ $message }} </p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="ProductCode" class="mb-2">Product Code</label>
                                <input id="ProductCode" name="code" type="text" class="form-control"
                                    value="{{ old('code') }}">
                                @error('code')
                                    <p class="text-danger font-weight-bold my-2"> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="ProductQuantity" class="mb-2">Quantity</label>
                                <input id="ProductQuantity" name="quantity" type="number" class="form-control"
                                    value="{{ old('quantity') }}">
                                @error('quantity')
                                    <p class="text-danger font-weight-bold my-2"> {{ $message }} </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="ProductCategory">Product Category</label>
                            <select class="form-control" id="ProductCategory" name="category_id">
                                <option>select</option>
                                @foreach ($categories as $category)
                                    <option @selected(old('category_id') == $category->id) value="{{ $category->id }}">{{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-danger font-weight-bold my-2"> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="ProductBrand">Product Brand</label>
                            <select class="form-control" id="ProductBrand" name="brand_id">
                                <option disabled selected>select</option>
                                @foreach ($brands as $brand)
                                    <option @selected(old('brand_id') == $brand->id) value="{{ $brand->id }}" required>{{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('brand_id')
                                <p class="text-danger font-weight-bold my-2"> {{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mt-4">
                        <label for="exampleSelectStatus">status</label>
                        <select class="form-control" id="exampleSelectStatus" name="status">
                            <option></option>
                            <option @selected(old('status') === 'available') value="available">Available</option>
                            <option @selected(old('status') === 'unavailable') value="unavailable">Not Available</option>
                        </select>
                        @error('status')
                            <p class="text-danger font-weight-bold my-2"> {{ $message }} </p>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <label for="ProductSizes">Sizes</label>
                        <select name="sizes[]" class="sizes form-control" id="ProductSizes" multiple="multiple">
                            @foreach ($sizes as $size)
                                <option value="{{ $size->id }}">{{ $size->name }}</option>
                            @endforeach
                        </select>
                        @error('sizes')
                            <p class="text-danger font-weight-bold my-2"> {{ $message }} </p>
                        @enderror
                    </div>
                    <div class="form-group ">
                        <label for="ProductColors">Colors</label>
                        <select name="colors[]" multiple="multiple" class="colors form-control" id="ProductColors">
                            {{-- <option disabled selected hidden>Select colors</option> --}}
                            @foreach ($colors as $color)
                                <option value="{{ $color->id }}">{{ $color->name }}</option>
                            @endforeach
                        </select>
                        @error('color')
                            <p class="text-danger font-weight-bold my-2"> {{ $message }} </p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea class="form-control" name="description" id="exampleTextarea1" rows="4">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-danger font-weight-bold my-2"> {{ $message }} </p>
                        @enderror
                    </div>
                    <div class="form-group position-relative">
                        <label for="image">Image</label>
                        <div class="input-group col-12">
                            <input type="file" name="images[]" id="image" class="form-control file-upload-info"
                                placeholder="Upload Image" multiple="multiple">
                        </div>
                        @error('image')
                            <p class="text-danger font-weight-bold my-2"> {{ $message }} </p>
                        @enderror
                    </div>
                    <div class="row mt-4" id="imagePreviewContainer"></div>

                    <div class="mt-5 d-flex justify-content-end">
                        <button type="submit" class="btn btn-lg  me-2">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('.colors').select2({

                tags: true,
            });

            $('.sizes').select2({
            tags: true,
            });
        });

            // $('#add-product').on('submit', function(event) {
            //     event.preventDefault();
            //     var formData = new FormData($('#add-product')[0]);
            //     $.ajax({
            //         type: 'post',
            //         enctype: 'multipart/form-data',
            //         url: "{{ route('dashboard.create_product') }}",
            //         data: formData,
            //         processData: false,
            //         contentType: false,
            //         cache: false,
            //         success: function(data) {
            //             if (data.status == true) {
            //                 var successElement = $('#success');
            //                 successElement.text(data.message).show();
            //             }
            //     },
            // });



        $(document).ready(function() {
            $("#image").change(function() {
                var files = this.files;
                $('#imagePreviewContainer').empty(); // Clear previous previews

                if (files.length > 0) {
                    $.each(files, function(index, file) {
                        if (file.type.match('image.*')) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                var imgHtml = `
                                    <div class="col-3">
                                        <img src="${e.target.result}" class="img-thumbnail" alt="Preview">
                                    </div>
                                `;
                                $('#imagePreviewContainer').append(imgHtml);
                            };
                            reader.readAsDataURL(file);
                        }
                    });
                }
            });
        });
    </script>
@endpush
