@extends('store.master')

@section('title', 'Orders')


@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>


        .order-section {
            margin-top: 150px;
        }
        .card {
            margin-bottom: 24px;
            -webkit-box-shadow: 0 2px 3px #e4e8f0;
            box-shadow: 0 2px 3px #e4e8f0;
        }

        .card {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid #eff0f2;
            border-radius: 1rem;
        }

        .activity-checkout {
            list-style: none
        }

        .activity-checkout .checkout-icon {
            position: absolute;
            top: -4px;
            left: -24px
        }

        .activity-checkout .checkout-item {
            position: relative;
            padding-bottom: 24px;
            padding-left: 35px;
            border-left: 2px solid #f5f6f8
        }

        .activity-checkout .checkout-item:first-child {
            border-color: #ee6394;
        }

        .activity-checkout .checkout-item:first-child:after {
            background-color: #ee6394;
        }

        .activity-checkout .checkout-item:last-child {
            border-color: transparent
        }

        .activity-checkout .checkout-item.crypto-activity {
            margin-left: 50px
        }

        .activity-checkout .checkout-item .crypto-date {
            position: absolute;
            top: 3px;
            left: -65px
        }



        .avatar-xs {
            height: 1rem;
            width: 1rem
        }

        .avatar-sm {
            height: 2rem;
            width: 2rem
        }

        .avatar {
            height: 3rem;
            width: 3rem
        }

        .avatar-md {
            height: 4rem;
            width: 4rem
        }

        .avatar-lg {
            height: 5rem;
            width: 5rem
        }

        .avatar-xl {
            height: 6rem;
            width: 6rem
        }

        .avatar-title {
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            background-color: #ee6394;
            color: #fff;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            font-weight: 500;
            height: 100%;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            width: 100%
        }

        .avatar-group {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            padding-left: 8px
        }

        .avatar-group .avatar-group-item {
            margin-left: -8px;
            border: 2px solid #fff;
            border-radius: 50%;
            -webkit-transition: all .2s;
            transition: all .2s
        }

        .avatar-group .avatar-group-item:hover {
            position: relative;
            -webkit-transform: translateY(-2px);
            transform: translateY(-2px)
        }

        .card-radio {
            background-color: #fff;
            border: 2px solid #eff0f2;
            border-radius: .75rem;
            padding: .5rem;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            display: block
        }

        .card-radio:hover {
            cursor: pointer
        }

        .card-radio-label {
            display: block
        }

        .edit-btn {
            width: 35px;
            height: 35px;
            line-height: 40px;
            text-align: center;
            position: absolute;
            right: 25px;
            margin-top: -50px
        }

        .card-radio-input {
            display: none
        }

        .card-radio-input:checked+.card-radio {
            border-color: #ee6394 !important
        }


        .font-size-16 {
            font-size: 16px !important;
        }

        .text-truncate {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        a {
            text-decoration: none !important;
        }


        .form-control {
            display: block;
            width: 100%;
            padding: 0.47rem 0.75rem;
            font-size: .875rem;
            font-weight: 400;
            line-height: 1.5;
            color: #545965;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #e2e5e8;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0.75rem;
            -webkit-transition: border-color .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
            transition: border-color .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
        }

        .edit-btn {
            width: 35px;
            height: 35px;
            line-height: 40px;
            text-align: center;
            position: absolute;
            right: 25px;
            margin-top: -50px;
        }

        .ribbon {
            position: absolute;
            right: -26px;
            top: 20px;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
            color: #fff;
            font-size: 13px;
            font-weight: 500;
            padding: 1px 22px;
            font-size: 13px;
            font-weight: 500
        }
    </style>
    </script>
@endpush

@section('content')
    <div class="container order-section">

        <div class="row">

            <div class="col-xl-12">
                <form method="post" action="{{ route('checkout.place-order') }}">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <ol class="activity-checkout mb-0 px-4 mt-3">
                                <li class="checkout-item">
                                    <div class="avatar checkout-icon p-1">
                                        <div class="avatar-title rounded-circle">
                                            <i class="bx bxs-receipt text-white font-size-20"></i>
                                        </div>
                                    </div>
                                    <div class="feed-item-list">
                                        <div>
                                            <h5 class="font-size-16 mb-1">Billing Info</h5>
                                            <p class="text-muted text-truncate mb-4">Sed ut perspiciatis unde omnis iste</p>
                                            <div class="mb-3">
                                                <form>
                                                    <div>
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="billing-name">Name</label>
                                                                    <input type="text" name="name" class="form-control" id="billing-name"
                                                                        placeholder="Enter name" value={{ $user->name }}>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="billing-email-address">Email
                                                                        Address</label>
                                                                    <input type="email" class="form-control"
                                                                        id="billing-email-address" name="email"
                                                                        placeholder="Enter email"
                                                                        value={{ $user->email }}>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="billing-phone">Phone</label>
                                                                    <input type="number" class="form-control"
                                                                        id="billing-phone" name="phone" placeholder="Enter Phone no."
                                                                        value={{ $user->phone }}>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label" for="billing-phone">Street</label>
                                                                    <input type="number" class="form-control"
                                                                        id="billing-phone" name="phone" placeholder="Enter Phone no."
                                                                        value="">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label" for="billing-address">Address 2 </label>
                                                            <textarea class="form-control" name="address2" id="billing-address" rows="3" placeholder="Enter full address"></textarea>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="mb-4 mb-lg-0">
                                                                    <label class="form-label" for="billing-city">City</label>
                                                                    <input type="text" class="form-control" id="billing-city"
                                                                    name="city"
                                                                        placeholder="Enter City">
                                                                </div>
                                                            </div>

                                                            {{-- <div class="col-lg-4">
                                                                <div class="mb-0">
                                                                    <label class="form-label" for="zip-code">Zip / Postal
                                                                        code</label>
                                                                    <input type="text" class="form-control" id="zip-code"
                                                                        placeholder="Enter Postal code">
                                                                </div>
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="checkout-item">
                                    <div class="avatar checkout-icon p-1">
                                        <div class="avatar-title rounded-circle">
                                            <i class="bx bxs-truck text-white font-size-20"></i>
                                        </div>
                                    </div>
                                    <div class="feed-item-list">
                                        <div>
                                            <h5 class="font-size-16 mb-1">Shipping Info</h5>
                                            <p class="text-muted text-truncate mb-4">Neque porro quisquam est</p>
                                            <div class="mb-3">
                                                <div class="row">
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div data-bs-toggle="collapse">
                                                            <label class="card-radio-label mb-0">
                                                                <input type="radio" name="address" id="info-address1"
                                                                    class="card-radio-input" checked="">
                                                                <div class="card-radio text-truncate p-3">
                                                                    <span class="fs-14 mb-4 d-block">Address 1</span>
                                                                    <span class="fs-14 mb-2 d-block">Bradley McMillian</span>
                                                                    <span
                                                                        class="text-muted fw-normal text-wrap mb-1 d-block">109
                                                                        Clarksburg Park Road Show Low, AZ 85901</span>

                                                                    <span class="text-muted fw-normal d-block">Mo.
                                                                        012-345-6789</span>
                                                                </div>
                                                            </label>
                                                            <div class="edit-btn bg-light  rounded">
                                                                <a href="#" data-bs-toggle="tooltip"
                                                                    data-placement="top" title=""
                                                                    data-bs-original-title="Edit">
                                                                    <i class="bx bx-pencil font-size-16"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-sm-6">
                                                        <div>
                                                            <label class="card-radio-label mb-0">
                                                                <input type="radio" name="address" id="info-address2"
                                                                    class="card-radio-input">
                                                                <div class="card-radio text-truncate p-3">
                                                                    <span class="fs-14 mb-4 d-block">Address 2</span>
                                                                    <span class="fs-14 mb-2 d-block">Bradley McMillian</span>
                                                                    <span
                                                                        class="text-muted fw-normal text-wrap mb-1 d-block">109
                                                                        Clarksburg Park Road Show Low, AZ 85901</span>
                                                                    <span class="text-muted fw-normal d-block">Mo.
                                                                        012-345-6789</span>
                                                                </div>
                                                            </label>
                                                            <div class="edit-btn bg-light  rounded">
                                                                <a href="#" data-bs-toggle="tooltip"
                                                                    data-placement="top" title=""
                                                                    data-bs-original-title="Edit">
                                                                    <i class="bx bx-pencil font-size-16"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="checkout-item">
                                    <div class="avatar checkout-icon p-1">
                                        <div class="avatar-title rounded-circle">
                                            <i class="bx bxs-wallet-alt text-white font-size-20"></i>
                                        </div>
                                    </div>
                                    <div class="feed-item-list">
                                        <div>
                                            <h5 class="font-size-16 mb-1">Payment Info</h5>
                                            <p class="text-muted text-truncate mb-4">Duis arcu tortor, suscipit eget</p>
                                        </div>
                                        <div>
                                            <h5 class="font-size-14 mb-3">Payment method :</h5>
                                            <div class="row">
                                                <div class="col-lg-3 col-sm-6">
                                                    <div data-bs-toggle="collapse">
                                                        <label class="card-radio-label">
                                                            <input type="radio" name="pay-method" id="pay-methodoption1"
                                                                class="card-radio-input">
                                                            <span class="card-radio py-3 text-center text-truncate">
                                                                <i class="bx bx-credit-card d-block h2 mb-3"></i>
                                                                Credit / Debit Card
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-sm-6">
                                                    <div>
                                                        <label class="card-radio-label">
                                                            <input type="radio" name="pay-method" id="pay-methodoption2"
                                                                class="card-radio-input">
                                                            <span class="card-radio py-3 text-center text-truncate">
                                                                <i class="bx bxl-paypal d-block h2 mb-3"></i>
                                                                Paypal
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-sm-6">
                                                    <div>
                                                        <label class="card-radio-label">
                                                            <input type="radio" name="pay-method" id="pay-methodoption3"
                                                                class="card-radio-input" checked="">

                                                            <span class="card-radio py-3 text-center text-truncate">
                                                                <i class="bx bx-money d-block h2 mb-3"></i>
                                                                <span>Cash on Delivery</span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ol>
                        </div>
                        <div class="col">
                            <div class="text-center m-2 ">
                                <button type="submit" class="btn custom_btn">Procced</button>
                            </div>
                        </div> <!-- end col -->

                    </div>


                </form>



                <div class="row my-4">
                    <div class="col">
                        <a href="{{ route('show-all-products') }}" class="btn custom_btn text-muted">
                            <i class="mdi mdi-arrow-left me-1"></i> Continue Shopping </a>
                    </div> <!-- end col -->

                </div> <!-- end row-->
            </div>

        </div>
        <div class="col-xl-12">
            <div class="card checkout-order-summary">
                <div class="card-body">
                    <div class="p-3 bg-light mb-3">
                        <h5 class="font-size-16 mb-0">Order Summary <span class="float-end ms-2">#MN0124</span></h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-centered mb-0 table-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0" style="width: 110px;" scope="col">Product</th>
                                    <th class="border-top-0" scope="col">Product Desc</th>
                                    <th class="border-top-0" scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><img src="https://www.bootdey.com/image/280x280/FF00FF/000000"
                                            alt="product-img" title="product-img" class="avatar-lg rounded"></th>
                                    <td>
                                        <h5 class="font-size-16 text-truncate"><a href="#"
                                                class="text-dark">Waterproof Mobile Phone</a></h5>
                                        <p class="text-muted mb-0">
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star-half text-warning"></i>
                                        </p>
                                        <p class="text-muted mb-0 mt-1">$ 260 x 2</p>
                                    </td>
                                    <td>$ 520</td>
                                </tr>
                                <tr>
                                    <th scope="row"><img src="https://www.bootdey.com/image/280x280/FF00FF/000000"
                                            alt="product-img" title="product-img" class="avatar-lg rounded"></th>
                                    <td>
                                        <h5 class="font-size-16 text-truncate"><a href="#"
                                                class="text-dark">Smartphone Dual Camera</a></h5>
                                        <p class="text-muted mb-0">
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-warning"></i>
                                        </p>
                                        <p class="text-muted mb-0 mt-1">$ 260 x 1</p>
                                    </td>
                                    <td>$ 260</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h5 class="font-size-14 m-0">Sub Total :</h5>
                                    </td>
                                    <td>
                                        $ 780
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h5 class="font-size-14 m-0">Discount :</h5>
                                    </td>
                                    <td>
                                        - $ 78
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2">
                                        <h5 class="font-size-14 m-0">Shipping Charge :</h5>
                                    </td>
                                    <td>
                                        $ 25
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h5 class="font-size-14 m-0">Estimated Tax :</h5>
                                    </td>
                                    <td>
                                        $ 18.20
                                    </td>
                                </tr>

                                <tr class="bg-light">
                                    <td colspan="2">
                                        <h5 class="font-size-14 m-0">Total:</h5>
                                    </td>
                                    <td>
                                        $ 745.2
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div>

@endsection
