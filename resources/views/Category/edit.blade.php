@extends('Admin.dashboard');

@section('content')
<div class="container w-50 m-auto">
    <form id="quickForm" action="{{route('category.update',$category->id)}}" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Category-Name</label>
                <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" id="exampleInputEmail1" value="{{$category->category_name}}" placeholder="category-name">
                @error('category_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

</div>

@endsection