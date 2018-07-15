@extends('layouts.admin')

@section('title', 'addTour')
@section('content')
    <div class="col-md-8">
    <h2>Add Tours</h2>
    <form action="{{route("add_tour")}}" method="post" enctype="multipart/form-data">
        {!!csrf_field()!!}
        <div class="add-image">
            <div class="form-group">
                <label for="exampleFormControlFile1"> File input</label>
                <input type="file" class="form-control-file" name="images[]" accept="image/*">
                <div class="preview"></div>
            </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Alt Image</label>
            <input type="text" class="form-control" name="alt[]">
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Title Image</label>
            <input type="text" class="form-control" name="title[]">
        </div>
            <div class="custom-control custom-checkbox">
                <input type="radio" class="custom-control-input" id="mainImage1" name="imagePriority" value="0">
                <label class="custom-control-label" for="mainImage1">Main Image</label>
            </div>
        </div>
        <div class="add-image">
            <div class="form-group">
                <label for="exampleFormControlFile1"> File input</label>
                <input type="file" class="form-control-file" name="images[]" accept="image/*">
                <div class="preview"></div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Alt Image</label>
                <input type="text" class="form-control" name="alt[]">
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Title Image</label>
                <input type="text" class="form-control" name="title[]">
            </div>
            <div class="custom-control custom-checkbox">
                <input type="radio" class="custom-control-input" id="mainImage2" name="imagePriority" value="1">
                <label class="custom-control-label" for="mainImage2">Main Image</label>
            </div>
        </div>
        <div class="add-image">
            <div class="form-group">
                <label for="exampleFormControlFile1"> File input</label>
                <input type="file" class="form-control-file" name="images[]" accept="image/*">
                <div class="preview"></div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Alt Image</label>
                <input type="text" class="form-control" name="alt[]">
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Title Image</label>
                <input type="text" class="form-control" name="title[]">
            </div>
            <div class="custom-control custom-checkbox">
                <input type="radio" class="custom-control-input" id="mainImage3" name="imagePriority" value="2">
                <label class="custom-control-label" for="mainImage3">Main Image</label>
            </div>
        </div>
        <div class="add-image">
            <div class="form-group">
                <label for="exampleFormControlFile1"> File input</label>
                <input type="file" class="form-control-file" name="images[]" accept="image/*">
                <div class="preview"></div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Alt Image</label>
                <input type="text" class="form-control" name="alt[]">
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Title Image</label>
                <input type="text" class="form-control" name="title[]">
            </div>
            <div class="custom-control custom-checkbox">
                <input type="radio" class="custom-control-input" id="mainImage4" name="imagePriority" value="3">
                <label class="custom-control-label" for="mainImage4">Main Image</label>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Name Tour</label>
            <input type="text" class="form-control"   placeholder="Name Tour" name="nameTour">
            <span class="err-inp">{{ $errors->first('nameTour') }}</span>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Slug</label>
            <input type="text" class="form-control"   placeholder="Name Tour" name="slug">
            <span class="err-inp">{{ $errors->first('slug') }}</span>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Small Description</label>
            <textarea class="form-control"  rows="3" name="smallDesc"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <textarea class="form-control" rows="3" name="desc"></textarea>
            <span class="err-inp">{{ $errors->first('desc') }}</span>
            <script>
                var editor = CKEDITOR.replace( 'desc' );
            </script>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Duration</label>
            <input type="number" class="form-control" placeholder="Duration" name="duration">
            <span class="err-inp">{{ $errors->first('duration') }}</span>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Start Tour</label>
            <input type="number" class="form-control" placeholder="Start Tour" name="start">
            <span class="err-inp">{{ $errors->first('start') }}</span>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Price</label>
            <input type="number" class="form-control" placeholder="Price" name="price">
            <span class="err-inp">{{ $errors->first('price') }}</span>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheck1" name="viewed" >
            <label class="custom-control-label" for="customCheck1">View tour</label>

        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>

    </div>




    <script src="{{ asset('js/admin.js') }}" type="text/javascript" charset="utf-8" ></script>
@endsection