@extends('layouts.structure')

@section('content')
<div class="spacer"></div>

<div class="content">

    <h1>Welcome Back, {{ $member->name }}.</h1>
    <hr>

    <div class="row">

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h3>Shops / Locations</h3>
                    <p>Tell us where your based, lets get you found!</p>
                    <a href="/member/locations">
                        <button class="btn btn-primary"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Manage Shops</button>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h3>Products</h3>
                    <p>Upload your products and get selling online today.</p>
                    <a href="/member/products">
                        <button class="btn btn-primary"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Manage Products</button>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h3>Users</h3>
                    <p>Add additional staff to login and manage the account.</p>
                    <a href="/member/users">
                        <button class="btn btn-primary"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Manage Users</button>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h3>Listing</h3>
                    <p>Manage your site listing.</p>
                    <a href="/member/directory">
                        <button class="btn btn-primary"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Manage Directory Listing</button>
                    </a>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection

@section('scripts')
<script>
</script>
@endsection
