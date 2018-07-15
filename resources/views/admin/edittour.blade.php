@extends('layouts.admin')

@section('title', 'editTour')
@section('content')
    <div class="col-md-8">
        <h2>Edit Tours</h2>
        <form action="{{route("save_edit_tour")}}" method="post" enctype="multipart/form-data">
            {!!csrf_field()!!}
            <input type="hidden" value="{{$tour->id}}" name="idTour">
            @for($i=0; $i<4; $i++)
            <div class="add-image">
                <div class="form-group">
                    <label for="exampleFormControlFile1"> File input</label>
                    <input type="file" class="form-control-file" name="images[]" accept="image/*" >
                    @if(!empty($tour->images[$i]->id))
                        <input type="hidden" value="{{$tour->images[$i]->id}}" name="idImage[]">
                    @endif
                    <div class="preview">
                        @if(!empty($tour->images[$i]->img))
                            <img src="{{asset('storage/'.$tour->images[$i]->img)}}" height="100" width="100">
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Alt Image</label>
                    <input type="text" class="form-control" name="alt[]" value="@if(!empty($tour->images[$i]->alt)){{$tour->images[$i]->alt}}@endif">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Title Image</label>
                    <input type="text" class="form-control" name="title[]" value="@if(!empty($tour->images[$i]->title)){{$tour->images[$i]->title}}@endif">
                </div>
                <div class="custom-control custom-checkbox">
                    @if(!empty($tour->images[$i]->img) && $tour->images[$i]->imagePriority == 1)
                        <input type="radio" class="custom-control-input" id="mainImage1" name="imagePriority" value="1" checked>
                    @else
                        <input type="radio" class="custom-control-input" id="mainImage1" name="imagePriority" value="0">
                    @endif
                    <label class="custom-control-label" for="mainImage1">Main Image</label>
                </div>
            </div>
            @endfor
            <div class="form-group">
                <label for="exampleInputEmail1">Name Tour</label>
                <input type="text" class="form-control"   placeholder="Name Tour" name="nameTour" value="{{$tour->name}}">
                <span class="err-inp">{{ $errors->first('nameTour') }}</span>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Slug</label>
                <input type="text" class="form-control"   placeholder="Name Tour" name="slug" value="{{$tour->slug}}">
                <span class="err-inp">{{ $errors->first('slug') }}</span>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Small Description</label>
                <textarea class="form-control"  rows="3" name="smallDesc">{{$tour->description_tour_way}}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <textarea class="form-control" rows="3" name="desc">{!! $tour->description !!}</textarea>
                <span class="err-inp">{{ $errors->first('desc') }}</span>
                <script>
                    var editor = CKEDITOR.replace( 'desc' );
                </script>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Duration</label>
                <input type="number" class="form-control" placeholder="Duration" name="duration" value="{{$tour->duration}}">
                <span class="err-inp">{{ $errors->first('duration') }}</span>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Start Tour</label>
                <input type="number" class="form-control" placeholder="Start Tour" name="start"  value="{{$tour->start_tour}}">
                <span class="err-inp">{{ $errors->first('start') }}</span>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Price</label>
                <input type="number" class="form-control" placeholder="Price" name="price" value="{{$tour->price}}">
                <span class="err-inp">{{ $errors->first('price') }}</span>
            </div>
            <div class="custom-control custom-checkbox">
                @if($tour->viewed == 1)
                    <input type="checkbox" class="custom-control-input" id="viewtour" name="viewed" value="1">
                @else
                    <input type="checkbox" class="custom-control-input" id="viewtour" name="viewed" value="0" >
                @endif
                <label class="custom-control-label" for="viewtour">View tour</label>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>

    </div>
    <script src="{{ asset('js/admin.js') }}" type="text/javascript" charset="utf-8" ></script>
@endsection