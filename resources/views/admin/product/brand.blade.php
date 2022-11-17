@extends('admin.dashboard')
@section('title')
Create Brand
@endsection
@section('content')
<div>
<form method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="short_name" class="form-control-label">Acronym</label>
                    <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-info-circle"></i>
                            </span>
                        </div>
                        <input class="form-control" placeholder="Enter Product Name" name="short_name" id="short_name" value="{{old('short_name')}}">
                    </div>
                    @error('short_name')
                        <p class="text-danger"><strong>{{$message}}</strong></p>
                    @enderror
              </div>  
                <div class="form-group col-md-6">
                    <label for="full_name" class="form-control-label">Brand</label>
                    <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-info-circle"></i>
                            </span>
                        </div>
                        <input class="form-control" placeholder="Enter Product Name" name="full_name" id="full_name" value="{{old('full_name')}}">
                    </div>
                    @error('full_name')
                        <p class="text-danger"><strong>{{$message}}</strong></p>
                    @enderror
              </div>  
                <div class="form-group col-md-6">
                    <label for="address" class="form-control-label">Address</label>
                    <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-info-circle"></i>
                            </span>
                        </div>
                        <input class="form-control" placeholder="Enter Product Name" name="address" id="address" value="{{old('address')}}">
                    </div>
                    @error('address')
                        <p class="text-danger"><strong>{{$message}}</strong></p>
                    @enderror
              </div>  
                <div class="form-group col-md-6">
                    <label for="description" class="form-control-label">Description</label>
                    <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-info-circle"></i>
                            </span>
                        </div>
                        <input class="form-control" placeholder="Enter Product Name" name="description" id="description" value="{{old('description')}}">
                    </div>
                    @error('description')
                        <p class="text-danger"><strong>{{$message}}</strong></p>
                    @enderror
              </div>  
            </div>
        </div>
        <div class="card-footer">
            <div class="row save-buttons">
                <div class="col-md-12">
                    <a href="index" class="btn btn-success">Cancel</a>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-info">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- <script>
    $(document).ready(function() {
        $("#imgUrl").on('change keyup', function() {
            imgUrl = $(this)[0].files[0];
            $('#imgUrlLabel').html(imgUrl.name);
            console.log(imgUrl);
        });
    });
</script> -->
</div>
@endsection