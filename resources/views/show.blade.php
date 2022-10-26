@extends('admin.dashboard')
@section('title')
Create Product
@endsection
@section('content')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

<div class="card">
    <div class="card-body">
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ProductID</th>
                    <th>ProductName</th>
                    <th>Unit</th>
                    <th>Price</th>
                    <th>Sold</th>
                    <th>InStock</th>
                    <th>WattID</th>
                    <th>TypeID</th>
                    <th>ShapeID</th>
                    <th>SaleID</th>
                    <th>BrandID</th>
                    <th>CountryID</th>
                    <th>Picture</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pro as $p)
                <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->name}}</td>
                    <td>{{$p->unit}}</td>
                    <td>${{$p->price}}</td>
                    <td>${{$p->sold}}</td>
                    <td>{{$p->watt_id}}</td>
                    <td>{{$p->type_id}}</td>
                    <td>{{$p->shape_id}}</td>
                    <td>{{$p->sale_id}}</td>
                    <td>{{$p->brand_id}}</td>
                    <td>{{$p->country_id}}</td>
                    <td><img src="/admin-assets/dist/img/product/{{$p->img_url}}" width="80px"></td>
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
    </div>
</div>
@endsection
