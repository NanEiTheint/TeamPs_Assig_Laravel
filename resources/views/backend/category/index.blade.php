@extends('backendtemplate')

@section('content')
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i>All Categories</h1>
        <p>Start a beautiful journey here</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Category List</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="title-header mb-3">
            <h2 class="d-inline-block">Category List</h2>
            <a href="{{route('categories.create')}}" class="btn btn-primary float-right">Add New</a>
          </div>
          
          <table class="table table-bordered dataTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Category Name</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Publish</th>
              </tr>
            </thead>
            <tbody>
              @php
                $no=1;
              @endphp
              @foreach($categories as $category)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$category->name}}</td>
                <td><a href="{{route('categories.edit',$category->id)}}" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></a></td>
                <td>
                  <form action="{{route('categories.destroy',$category->id)}}" method="POST" onsubmit="return confirm('Are you sure to delete?')" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                      <button type="submit" class="btn btn-outline-dark btn-sm">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                  </form>
                </td>
                <td>
                 @if($category->status==1)
                  <button class="btn btn-success btn-sm">Yes</button>
                 @else
                  <button class="btn btn-warning btn-sm">No</button>
                 @endif
                 
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        
        </div>
      </div>
    </div>
  </main>
@endsection

@section('script')
  <script type="text/javascript" src="{{ asset('backend_asset/js/plugins/jquery.dataTables.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('backend_asset/js/plugins/dataTables.bootstrap.min.js')}}"></script>
  <script type="text/javascript">
    $('.dataTable').DataTable();
  </script>
@endsection