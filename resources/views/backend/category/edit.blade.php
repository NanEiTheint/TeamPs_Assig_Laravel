@extends('backendtemplate')

@section('content')
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Edit Category</h1>
        <p>Start a beautiful journey here</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Category List/</a></li>
      </ul>
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Edit Category</h1>
      <a href="{{route('categories.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-backward fa-sm text-white-50"></i> Go Back</a>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <form action="{{route('categories.update',$category->id)}}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="name"><span class="text-danger">*</span>Category Name</label>
                  <input type="text" name="name" value="{{$category->name}}" class="form-control @error('name') is-invalid @enderror" id="name" value="{{old('name')}}">
                  @error("name")
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group pt-4">
                  <input type="checkbox" name="status" id="publish" {{($category->status==1)? 'checked':''}}>
                  <label for="publish">Status(Is Publish?)</label>
                 
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="photo"><span class="text-danger">*</span>Category Photo</label><br>
                  <input type="file" name="photo" id="photo" accept="image/*" class="form-control-file @error('photo') is-invalid @enderror" value="{{old('photo')}}">
                  <img src="{{asset($category->photo)}}" width="100px" height="100px" class="mt-2" id="changeimg">
                  <input type="hidden" name="oldphoto" value="{{$category->photo}}">
                   @error("photo")
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group pt-4">
                  <label for="icon"><span class="text-danger">*</span>Category Icon</label><br>
                  <input type="file" name="icon" id="icon" accept="image/*" class="form-control-file @error('icon') is-invalid @enderror" value="{{old('icon')}}">
                  <img src="{{asset($category->icon)}}" width="100px" height="100px" class="mt-2" id="changeicon">
                  <input type="hidden" name="oldicon" value="{{$category->icon}}">
                   @error("icon")
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              
            </div>
            <div class="row">
              <div class="col-12">
              
                <div>
                  <img id="changeimg" class="img-fluid w-25 h-25 mx-3">
                </div>
                <input type="submit" name="" value="Update" class="btn btn-primary my-5">
                <input type="reset" name="" value="Cancel" class="btn btn-primary my-5">
              </div>
            </div>

          </form>
        </div>
      </div>
      
    </div>
  </main>
@endsection

