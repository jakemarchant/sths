@extends('website.layout')

@section('content')

<div class="content">

    <h3>Shop</h3>

    <div class="row">

        <div class="col-md-3">

            <form>
                <div class="card">
                    <div class="card-header">
                        <h3>Filter </h3>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label>Product :</label>
                            <input type="text" class="form-control" name="title" placeholder="Product name..." />
                        </div>

                        <div class="form-group">
                            <label>Category :</label>
                            <select type="text" class="form-control" name="category">
                                <option disabled selected>-- Please Select --</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Minimum Price :</label>
                            <input type="range" class="form-control" name="price-min" id="price-max" value="800" min="0" max="1000">
                        </div>

                        <div class="form-group">
                            <label>Maximum Price :</label>
                            <input type="range" class="form-control" name="price-max" id="price-max" value="800" min="0" max="1000">
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary"><i class="fas fa-filter"></i> Filter</button>
                    </div>
                </div>
            </form>

        </div>

        <div class="col-md-9">

            <div class="card-columns">

                @foreach($client->products as $product)
                <div class="card">
                    <div class="card-image">
                        @if($product->background)
                        <img class="card-img-top" src="{{ $product->background->filename }}" alt="">
                        @endif
                    </div>
                    <div class="card-body">
                        <b>&pound;{{ $product->price }}</b>
                        <h3>{{ $product->title }}</h3>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-default"><i class="fas fa-info-circle"></i> Learn More</button>
                        <button class="btn btn-primary"><i class="fas fa-arrow-circle-right"></i> Buy Now</button>
                    </div>
                </div>
                @endforeach

            </div>

        </div>

    </div>


</div>

@endsection
