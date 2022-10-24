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
                    <label for="name" class="form-control-label">Product Name</label>
                    <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-info-circle"></i>
                            </span>
                        </div>
                        <input class="form-control" placeholder="Enter Product Name" name="name" id="name" value="{{old('name')}}">
                    </div>
                    @error('name')
                        <p class="text-danger"><strong>{{$message}}</strong></p>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="type_id" class="form-control-label">Product Type</label>
                    <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-info-circle"></i>
                            </span>
                        </div>
                        <input class="form-control" placeholder="Enter Product Name" name="type_id" id="name" value="{{old('type_id')}}">
                    </div>
                    @error('type_id')
                        <p class="text-danger"><strong>{{$message}}</strong></p>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="country_id" class="form-control-label">Product Country</label>
                    <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-info-circle"></i>
                            </span>
                        </div>
                        <input class="form-control" placeholder="Enter Product Name" name="country_id" id="name" value="{{old('country_id')}}">
                    </div>
                    @error('country_id')
                        <p class="text-danger"><strong>{{$message}}</strong></p>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="watt_id" class="form-control-label">Product Watt</label>
                    <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-info-circle"></i>
                            </span>
                        </div>
                        <input class="form-control" placeholder="Enter Product Name" name="watt_id" id="name" value="{{old('watt_id')}}">
                    </div>
                    @error('watt_id')
                        <p class="text-danger"><strong>{{$message}}</strong></p>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="brand_id" class="form-control-label">Product Brand</label>
                    <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-info-circle"></i>
                            </span>
                        </div>
                        <input class="form-control" placeholder="Enter Product Name" name="brand_id" id="name" value="{{old('brand_id')}}">
                    </div>
                    @error('brand_id')
                        <p class="text-danger"><strong>{{$message}}</strong></p>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="sale_id" class="form-control-label">Product Sale</label>
                    <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-info-circle"></i>
                            </span>
                        </div>
                        <input class="form-control" placeholder="Enter Product Name" name="sale_id" id="name" value="{{old('sale_id')}}">
                    </div>
                    @error('sale_id')
                        <p class="text-danger"><strong>{{$message}}</strong></p>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="shape_id" class="form-control-label">Product Shape</label>
                    <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-info-circle"></i>
                            </span>
                        </div>
                        <input class="form-control" placeholder="Enter Product Name" name="shape_id" id="name" value="{{old('shape_id')}}">
                    </div>
                    @error('shape_id')
                        <p class="text-danger"><strong>{{$message}}</strong></p>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="unit" class="form-control-label">Product Unit</label>
                    <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-info-circle"></i>
                            </span>
                        </div>
                        <input class="form-control" placeholder="Enter Product Name" name="unit" id="name" value="{{old('unit')}}">
                    </div>
                    @error('unit')
                        <p class="text-danger"><strong>{{$message}}</strong></p>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="sold" class="form-control-label">Product Sold</label>
                    <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-info-circle"></i>
                            </span>
                        </div>
                        <input class="form-control" placeholder="Enter Product Name" name="sold" id="name" value="{{old('sold')}}">
                    </div>
                    @error('sold')
                        <p class="text-danger"><strong>{{$message}}</strong></p>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="price" class="form-control-label">Product Price</label>
                    <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-info-circle"></i>
                            </span>
                        </div>
                        <input class="form-control" placeholder="Enter Product Name" name="price" id="name" value="{{old('price')}}">
                    </div>
                    @error('price')
                        <p class="text-danger"><strong>{{$message}}</strong></p>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="in_stock" class="form-control-label">Product InStock</label>
                    <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-info-circle"></i>
                            </span>
                        </div>
                        <input class="form-control" placeholder="Enter Product Name" name="in_stock" id="name" value="{{old('in_stock')}}">
                    </div>
                    @error('in_stock')
                        <p class="text-danger"><strong>{{$message}}</strong></p>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="img_url" class="form-control-label">Product img_url</label>
                    <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-image"></i>
                            </span>
                        </div>
                        <input type="file" name="img_url" id="img_url" style="display: none"/>
                        <label for="img_url" class="form-control" id="img_urlLabel">Upload img_url</label>
                    </div>
                    @error('img_url')
                        <p class="text-danger"><strong>{{$message}}</strong></p>
                    @enderror
                </div>
                <div class="form-group col-md-12">
                    <label for="description" class="form-control-label">Description</label>
                    <textarea class="form-control" placeholder="Enter description" name="description" id="description">{{old('description')}}</textarea>
                </div>
                @error('description')
                    <p class="text-danger"><strong>{{$message}}</strong></p>
                @enderror
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