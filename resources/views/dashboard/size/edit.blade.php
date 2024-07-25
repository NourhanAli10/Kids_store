@extends('dashboard.master')

@section('title')

@push('css')
<style>
   .color-picker {
    display: flex;
    align-items: center;
}

.color-preview {
    width: 100%;
    height: 50px;
    padding: 0.94rem 1.375rem;
    border: 1px solid #ccc;
    position: relative;
}

input[type="color"] {
    position:absolute;
    width: 50px; /* Adjust the width as needed */
    height: 50px; /* Adjust the height as needed */
    margin-left: 5px;
    border: none;
    padding: 0;
}

.span {
    position: absolute;
    left :100px;

}

</style>

@endpush

@section('content')

    <div class="col-9 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Size</h4>
               
                <form class="forms-sample" method="POST" action="{{ route('dashboard.update-size', $size->id  ) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputName1">Size</label>
                        <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name"
                            value="{{ $size->name}}">
                        @error('name')
                            <div class="text-danger font-weight-bold my-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="text-end mt-5">
                        <button type="submit" class="btn button btn-lg me-2">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
