@extends('admin.dashboard')
@section('title')
Create Product
@endsection
@section('content')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

<table id="example" class="table">
            <thead>
                <tr>
                    <th>ProductID</th>
                    <th>ProductName</th>
                    <th>Image</th>
                    <th>Unit</th>
                    <th>Price</th>
                    <th>Sold</th>
                    <th>InStock</th>
                    <th>Watt</th>
                    <th>Type</th>
                    <th>Shape</th>
                    <th>Sale</th>
                    <th>Brand</th>
                    <th>Country</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pro as $p)
                <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->name}}</td>
                    <td><img src="/admin-assets/dist/img/product/{{$p->img_url}}" width="80px"></td>
                    <td>{{$p->unit}}</td>
                    <td>${{$p->price}}</td>
                    <td>${{$p->sold}}</td>
                    <td>${{$p->in_stock}}</td>
                    @foreach($watts as $watt)
                        @if($watt->id == $p->watt_id)
                            <td>{{$watt->measure}}</td>
                        @endif
                    @endforeach
                    @foreach($types as $type)
                        @if($type->id == $p->type_id)
                            <td>{{$type->description}}</td>
                        @endif
                    @endforeach
                    @foreach($shapes as $shape)
                        @if($shape->id == $p->shape_id)
                            <td>{{$shape->shape_desc}}</td>
                        @endif
                    @endforeach
                    @foreach($sales as $sale)
                        @if($sale->id == $p->sale_id)
                            <td>{{$sale->percent}}</td>
                        @endif
                    @endforeach
                    @foreach($brands as $brand)
                        @if($brand->id == $p->brand_id)
                            <td>{{$brand->full_name}}</td>
                        @endif
                    @endforeach
                    @foreach($countries as $country)
                        @if($country->id == $p->country_id)
                            <td>{{$country->full_name}}</td>
                        @endif
                    @endforeach
                    <td>{{$p->description}}</td>
                    <td>
                        <div class="row mx-auto my-auto">
                            <div class="mx-auto"><a href="edit/{{ $p->id }}" class="btn btn-sm btn-success"><i
                                        class="fas fa-edit"></i></a></div>
                            <div class="mx-auto"><a href="delete/{{ $p->id }}"
                                    class="delete btn btn-sm btn-danger"><i class="fas fa-trash"></i></a></div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
@endsection
