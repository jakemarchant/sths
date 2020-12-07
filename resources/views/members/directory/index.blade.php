@extends('layouts.structure')

@section('content')

<div class="spacer"></div>

<div class="content">

    <form action="/member/directory/save" method="POST" enctype="multipart/form-data">
        @csrf

        @if($directory)
        <input type="hidden" name="directory_id" value="{{ $directory->id }}" />
        @endif

        <div class="buttons text-right">
            <button class="btn btn-primary"><i class="fa fa-upload"></i> Save</button>
        </div>

        <div class="card">

            <div class="card-header">
                <h3>Manage Directory Listing :</h3>
            </div>

            <div class="card-body">

                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">General</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="media-tab" data-toggle="tab" href="#media" role="tab" aria-controls="media" aria-selected="media">Media</a>
                    </li>
                </ul>

                <div class="tab-content">

                    <div id="general" class="tab-pane active">

                        <b>General :</b>

                        <div class="mt-3">

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label>Colour 1 :</label>
                                    <input type="color" class="form-control" name="colour_1" @if($directory) value="{{ $directory->colour_1 }}" @endif />
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Colour 2 :</label>
                                    <input type="color" class="form-control" name="colour_2" @if($directory) value="{{ $directory->colour_2 }}" @endif/>
                                </div>

                            </div>

                            <div class="form-group">
                                <label>Title :</label>
                                <input type="text" class="form-control" name="title" placeholder="Title" @if($directory) value="{{ $directory->title }}" @endif />
                            </div>

                            <div class="form-group">
                                <label>Subtitle :</label>
                                <input type="text" class="form-control" name="subtitle" placeholder="Subtitle" @if($directory) value="{{ $directory->subtitle }}" @endif />
                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label>Content Left :</label>
                                    <textarea type="text" class="form-control summernote" name="content_left" placeholder="Content" rows="5">@if($directory) {{ $directory->content_left }} @endif</textarea>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Content Right :</label>
                                    <textarea type="text" class="form-control summernote" name="content_right" placeholder="Content" rows="5">@if($directory) {{ $directory->content_right }} @endif</textarea>
                                </div>

                            </div>

                            <b>Advanced : </b>
                            <div class="form-group">
                                <label>SEO Title : </label>
                                <input type="text" class="form-control" name="seo_title" placeholder="Meta Tag Title" @if($directory) value="{{ $directory->seo_title }}" @endif />
                            </div>

                            <div class="form-group">
                                <label>SEO Description : </label>
                                <input type="text" class="form-control" name="seo_description" placeholder="Meta Tag Description" @if($directory) value="{{ $directory->seo_description }}" @endif />
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

                        </div>

                        <hr>

                        <div class="row">
                            @if($directory)
                                @foreach($directory->media as $media)
                                <div class="col-md-4">
                                    <div class="image_holder">
                                        <img src="{{ $media->filename }}" class="image"/>
                                        <div class="overlay">
                                            <button type="button" class="btn btn-danger DeleteMedia" id="{{ $media->id }}"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endif
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
