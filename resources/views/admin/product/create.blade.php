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
                        <select class="form-control" name="type_id">
                            <option selected>Select Product Type</option>
                            @foreach($types as $type)
                            <option value="{{$type->id}}">{{$type->description}}</option>
                            @endforeach
                        </select>
                        <!-- <input class="form-control" placeholder="Enter Product Type" name="type_id" id="name" value="{{old('type_id')}}"> -->
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
                        <select class="form-control" name="country_id">
                            <option selected>Select Product Country</option>
                            @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->full_name}}</option>
                            @endforeach
                        </select>
                        <!-- <input class="form-control" placeholder="Enter Product Country" name="country_id" id="name" value="{{old('country_id')}}"> -->
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
                        <select class="form-control" name="watt_id">
                            <option selected>Select Product Watt</option>
                            @foreach($watts as $watt)
                            <option value="{{$watt->id}}">{{$watt->measure}}</option>
                            @endforeach
                        </select>
                        <!-- <input class="form-control" placeholder="Enter Product Watt" name="watt_id" id="name" value="{{old('watt_id')}}"> -->
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
                        <select class="form-control" name="brand_id">
                            <option selected>Select Product Brand</option>
                            @foreach($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->full_name}}</option>
                            @endforeach
                        </select>
                        <!-- <input class="form-control" placeholder="Enter Product Brand" name="brand_id" id="name" value="{{old('brand_id')}}"> -->
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
                        <select class="form-control" name="sale_id">
                            <option selected>Select Product Sale</option>
                            @foreach($sales as $sale)
                            <option value="{{$sale->id}}">{{$sale->percent}}</option>
                            @endforeach
                        </select>
                        <!-- <input class="form-control" placeholder="Enter Product Sale" name="sale_id" id="name" value="{{old('sale_id')}}"> -->
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
                        <select class="form-control" name="shape_id">
                            <option selected>Select Product Shape</option>
                            @foreach($shapes as $shape)
                            <option value="{{$shape->id}}">{{$shape->shape_desc}}</option>
                            @endforeach
                        </select>
                        <!-- <input class="form-control" placeholder="Enter Product Shape" name="shape_id" id="name" value="{{old('shape_id')}}"> -->
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
                        <input class="form-control" placeholder="Enter Unit" name="unit" id="name" value="{{old('unit')}}">
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
                        <input class="form-control" placeholder="Enter Product Sold" name="sold" id="name" value="{{old('sold')}}">
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
                        <input class="form-control" placeholder="Enter Product Price" name="price" id="name" value="{{old('price')}}">
                    </div>
                    @error('price')
                        <p class="text-danger"><strong>{{$message}}</strong></p>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="in_stock" class="form-control-label">Product in stock</label>
                    <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-info-circle"></i>
                            </span>
                        </div>
                        <input class="form-control" placeholder="Enter Product in stock" name="in_stock" id="name" value="{{old('in_stock')}}">
                    </div>
                    @error('in_stock')
                        <p class="text-danger"><strong>{{$message}}</strong></p>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="img_url" class="form-control-label">Product Image</label>
                    <div class="input-group input-group-merge ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-image"></i>
                            </span>
                        </div>
                        <input type="file" name="img_url" id="img_url" style="display: none"/>
                        <label for="img_url" class="form-control" id="img_urlLabel">Upload Image</label>
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