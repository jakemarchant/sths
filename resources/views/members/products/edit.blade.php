@extends('layouts.structure')

@section('content')

<div class="spacer"></div>

<div class="content">

    <form action="/member/products/save" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="product_id" value="{{ $product->id }}" />

        <div class="buttons text-right">
            <button class="btn btn-primary"><i class="fa fa-upload"></i> Save</button>
        </div>

        <div class="card">

            <div class="card-header">
                <h3>Edit Product :</h3>
            </div>

            <div class="card-body">

                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">General</a>
                    </li>
                    <!--
                        <li class="nav-item">
                            <a class="nav-link" id="attributes-tab" data-toggle="tab" href="#attributes" role="tab" aria-controls="attributes" aria-selected="attributes">Attributes</a>
                        </li>
                    -->
                    <li class="nav-item">
                        <a class="nav-link" id="categories-tab" data-toggle="tab" href="#categories" role="tab" aria-controls="categories" aria-selected="categories">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="media-tab" data-toggle="tab" href="#media" role="tab" aria-controls="media" aria-selected="media">Media</a>
                    </li>
                </ul>

                <div class="tab-content">

                    <div id="general" class="tab-pane active">

                        <b>General :</b>

                        <div class="mt-3">

                            <div class="form-group">
                                <label>Product Name : </label>
                                <input type="text" class="form-control" name="title" placeholder="Product Name" value="{{ $product->title }}" />
                            </div>

                            <div class="form-group">
                                <label>Description : </label>
                                <textarea type="text" class="form-control summernote" name="description" rows="10">{{ $product->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Price : </label>
                                <input type="number" class="form-control" step="0.01" name="price" min="0" placeholder="Price" value="{{ $product->price }}" />
                            </div>

                            <div class="form-group">
                                <label>Qty in Stock : </label>
                                <input type="number" class="form-control" step="1" name="stock" min="0" placeholder="Quantity In Stock" value="{{ $product->quantity }}" />
                            </div>

                            <hr>

                            <b>Advanced : </b>

                            <div class="form-group">
                                <label>SEO Title : </label>
                                <input type="text" class="form-control" name="seo_title" placeholder="Meta Tag Title" />
                            </div>

                            <div class="form-group">
                                <label>SEO Description : </label>
                                <input type="text" class="form-control" name="seo_description" placeholder="Meta Tag Description" />
                            </div>

                        </div>

                    </div>

                    <div id="attributes" class="tab-pane fade">

                        <b>Attrbutes :</b>

                    </div>

                    <div id="categories" class="tab-pane fade">

                        <b>Categories :</b>

                        <div class="mt-3">

                            <div class="form-group">
                                <label>Category 1 :</label>
                                <select class="form-control" name="category_1">
                                    <option disabled selected>-- Please Select --</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Category 2 :</label>
                                <select class="form-control" name="category_2">
                                    <option disabled selected>-- Please Select --</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Category 3 :</label>
                                <select class="form-control" name="category_3">
                                    <option disabled selected>-- Please Select --</option>
                                </select>
                            </div>

                        </div>

                    </div>

                    <div id="media" class="tab-pane fade">

                        <b>Media :</b>

                        <div class="form-row mt-3">

                            <div class="form-group col-md-4">
                                <label>Images : </label>
                                <input type="file" multiple class="form-control-file" name="images[]" />
                            </div>

                            <div class="form-group col-md-4">
                                <label>Videos : </label>
                                <input type="file" multiple class="form-control-file" name="videos[]" />
                            </div>

                            <div class="form-group col-md-4">
                                <label>Documents : </label>
                                <input type="file" multiple class="form-control-file" name="documents[]" />
                            </div>

                        </div>

                        <hr>

                        <div class="row">

                            @foreach($product->media as $media)
                            <div class="col-md-4">
                                <div class="image_holder">
                                    <img src="{{ $media->filename }}" class="image"/>
                                    <div class="overlay">
                                        <button type="button" class="btn btn-danger DeleteMedia" id="{{ $media->id }}"><i class="fa fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>

                    </div>

                </div>

            </div>

            <div class="card-footer text-right">
                <button class="btn btn-primary"><i class="fa fa-upload"></i> Save</button>
            </div>

        </div>

    </form>

</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('.DeleteMedia').on('click touchstart', function(e){
            e.preventDefault();
            e.stopPropagation();
            e.stopImmediatePropagation();

            var image_holder = $(this).parent().parent().parent();

            bootbox.confirm({
                title: 'Warning...',
                message: 'Are you sure you would like to delete this file? This action cannot be undone.',
                callback: function(response){
                    if(response){
                        $(image_holder).remove();
                    }
                }
            })
        })
    })
</script>
@endsection
