@extends('store.master')

@section('title', 'verification')

@section('content')
<main>
    <section class="container">
        <div class="verification-code">
            <form>
                <div class="mb-3">
                  <label for="exampleVerification" class="form-label">Verification Code</label>
                  <input type="number" class="form-control" id="exampleVerification" >
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>


    </section>
</main>

@endsection
