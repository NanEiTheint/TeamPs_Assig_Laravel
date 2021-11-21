@extends('backendtemplate')

@section('content')
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Create Category</h1>
        <p>Start a beautiful journey here</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Category List</a></li>
        <li class="breadcrumb-item"><a href="{{route('categories.create')}}">Create Category</a></li>
      </ul>
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Create Category</h1>
      <a href="{{route('categories.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-backward fa-sm text-white-50"></i> Go Back</a>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="name"><span class="text-danger">*</span>Category Name</label>
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{old('name')}}" placeholder="Category Name">
                  @error("name")
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group pt-4">
                  <input type="checkbox" name="status" id="publish">
                  <label for="publish">Status(Is Publish?)</label>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="photo"><span class="text-danger">*</span>Category Photo</label><br>
                  <input type="file" name="photo" id="photo" accept="image/*" class="form-control-file @error('photo') is-invalid @enderror" value="{{old('photo')}}">
                  <div>
                    <img id="changeimg" class="img-fluid w-25 h-25 mx-3 pt-2">
                  </div>
                   @error("photo")
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group pt-4">
                  <label for="icon"><span class="text-danger">*</span>Category Icon</label><br>
                  <input type="file" name="icon" id="icon" accept="image/*" class="form-control-file @error('icon') is-invalid @enderror" value="{{old('icon')}}">
                  <div>
                    <img id="changeicon" class="img-fluid w-25 h-25 mx-3 pt-2">
                  </div>
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
                
                <input type="submit" name="" value="Save" class="btn btn-primary my-5">
                <input type="reset" name="" value="Cancel" class="btn btn-primary my-5">
              </div>
            </div>

          </form>
        </div>
      </div>
      
    </div>
  </main>
@endsection

