@extends('admin.dashboard')
@section('title')
Create Product
@endsection
@section('content')
<div>
<form method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="measure" class="form-control-label">Acronym</label>
                    <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-info-circle"></i>
                            </span>
                        </div>
                        <input class="form-control" placeholder="Enter Product Name" name="measure" id="measure" value="{{old('measure')}}">
                    </div>
                    @error('measure')
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