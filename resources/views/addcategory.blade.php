@extends('dashboard')
<!DOCTYPE html>
<html>

<head>
    <title>Document</title>
</head>

<body>
    @section('con')
    <div class="conrainer">
        <div class="jumbotron container col-10">
            <div align=center>
                <h2 class="text-danger font-weight-bold">ADD CATEGORY</h2>
            </div>
            @if(Session::has('error'))
            <div class="alert alert-success font-weight-bold col-10 container ">{{Session::get('error')}}</div>
            @endif
            <form action="sendcat" method="post" enctype="multipart/form-data">
                @csrf()
                <div class="form-group ">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control container" placeholder="ASSET NAME">
                    @if($errors->has('name'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('name')}}</label>
                    @endif
                </div>
                <div class="form-group">
                    <label>Asset Code</label>
                    @php 
                    $code=rand(1000000000000000,9999999999999999);
                    @endphp
                    <input type="text" name="code" disabled class="form-control container bg-light" value="{{$code}}">
                    @if($errors->has('code'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('code')}}</label>
                    @endif
                </div>
                <div class="form-group">
                    <label >Asset Type</label><br>

                    <select name="assettype" id="" class="form-control">

                        <option class="form-control bg-info opt-group">Select Type
                        @foreach($sel as $s)
                        <option value="{{$s->id}}">{{$s->Asset_type}}</option>
                        @endforeach
                        </option>
                    </select>
                        @if($errors->has('assettype'))
                        <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('assettype')}}</label>
                        @endif
                </div>
                <div class="form-group">
                    <label>Status</label><br>
                    <input type="radio" name="active" class="ml-2">&ensp;Active
                    <input type="radio" name="active"class="ml-2">&ensp;Inactive
                    @if($errors->has('active'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('active')}}</label>
                    @endif
                </div>
                <div class="form-group ">
                    <label>Upload image</label>
                    <input type="file" name="image" class="form-control col-6">
                    @if($errors->has('image'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('image')}}</label>
                    @endif

                </div>
                <div class="form-group">
                    <input type="submit" name="ADD" class=" btn btn-info form-control col-4">
                </div>
            </form>
        </div>
    </div>
</body>

</html>
@endsection