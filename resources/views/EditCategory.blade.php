@extends('dashboard')
<!DOCTYPE html>
<html>

<head>
    <title>Edit Category</title>
</head>

<body>
    @section('con')
    <div class="conrainer">
        <div class="jumbotron container col-10">
            <div align=center>
                <h2 class="text-danger font-weight-bold">EDIT CATEGORY</h2>
            </div>
            @if(Session::has('error'))
            <div class="alert alert-success font-weight-bold col-10 container ">{{Session::get('error')}}</div>
            @endif
            <form action="/updatecat" method="post" enctype="multipart/form-data">
                @csrf()
                @foreach($sel as $q)
                <div class="form-group ">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control container" value="{{$q->name}}">
                    @if($errors->has('name'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('name')}}</label>
                    @endif
                </div>
                <div class="form-group">
                    <label >Asset Type</label><br>

                    <select name="assettype" id="" class="form-control">
                   
                    <option class="form-control bg-info opt-group">{{$q->type_id}}
                    @foreach($data as $s)
                    <option value="{{$s->id}}">{{$s->Asset_type}}</option>
                    @endforeach        
                </option>
                    </select>
                        @if($errors->has('assettype'))
                        <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('assettype')}}</label>
                        @endif
                </div>
                <div class="form-group">
                    <input type="hidden" name="id" value="{{$q->id}}">
                    <input type="submit" name="ADD" class=" btn btn-info form-control col-4">
                </div>
                @endforeach
            </form>
        </div>
    </div>
</body>

</html>
@endsection