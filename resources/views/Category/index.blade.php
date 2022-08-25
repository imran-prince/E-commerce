@extends('Admin.dashboard');
@section('content')
<div class="w-50 m-auto">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 10px">Sl</th>
                <th>Category-Name</th>
                <th>Category-slug</th>
                <th  >Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($category as $key=>$row)
            <tr>
                <td>{{++$key}}</td>
                <td> {{$row->category_name}}</td>
                <td> {{$row->category_slug}}</td>
                <td>  
                    <a href="{{route('category.destory',($row->id))}}" class="btn btn-danger"> Delete</a>
                    <a href="{{route('category.edit',($row->id))}}" class="btn btn-info"> Edit</a>
                </td>
                
               
            </tr>


            @endforeach


        </tbody>
    </table>

</div>

@endsection