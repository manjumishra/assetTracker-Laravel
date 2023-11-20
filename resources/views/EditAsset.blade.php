@extends('dashboard')
<!DOCTYPE html>
<html>

<head>
    <title>Edit Asset</title>
</head>

<body>
    @section('con')
    <div class="conrainer">
        <div class="jumbotron col-10 container">
            <div align=center>
                <h2 class="text-danger font-weight-bold">EDIT ASSET</h2>
            </div>
            @if(Session::has('error'))
            <div class="alert alert-success font-weight-bold col-10 container ">{{Session::get('error')}}</div>
            @endif
            <form action="/update" method="post">
                @csrf()
                @foreach($sel as $q)
                <input type="hidden"name="id" value="{{$q->id}}">
                <div class="form-group">
                    <label>Asset Type</label>
                    <input type="text" name="Asset_type" class="form-control container" value="{{$q->Asset_type}}">
                    @if($errors->has('Asset_type'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('Asset_type')}}</label>
                    @endif
                </div>
                <div class="form-group">
                    <label>Description</label><br>
                    <textarea name="description" cols="45" rows="5"class="form-control container">{{$q->description}}</textarea>
                    @if($errors->has('description'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('description')}}</label>
                    @endif
                </div>
               
                <div class="form-group">
                    <input type="hidden" name="id"value="{{$q->id}}">
                    <input type="submit" name="sub" value="Update" class=" btn btn-info form-control col-4">
                </div>
                @endforeach
            </form>
        </div>
    </div>
</body>
</html>
@endsection
