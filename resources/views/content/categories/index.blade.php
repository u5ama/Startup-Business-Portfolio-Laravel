@extends('layouts/contentNavbarLayout')

@section('title', ' Categories')

@section('content')

  <div class="card">
    @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif
    <h5 class="card-header">
    <div class="row">
      <div class="col-6">Categories</div>
      <div class="col-6 text-end"><a href="{{route('admin_categories.create')}}" class="btn btn-primary">Add New</a></div>
    </div>
    </h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <caption class="ms-4">List of Categories</caption>
        <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @if(count($categories)>0)
          @foreach($categories as $category)
            <tr>
              <td>{{$category->id}}</td>
              <td>
                {{ $category->category_name }}
              </td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="javascript:void(0);" onclick="event.preventDefault(); document.getElementById('delete-form').submit();"><i class="bx bx-trash me-1"></i> Delete</a>
                    <form id="delete-form" action="{{ route('admin_categories.destroy', ['id' => $category->id]) }}" method="POST" style="display: none;">
                      @csrf
                      @method('DELETE')
                    </form>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        @endif
        </tbody>
      </table>
    </div>
  </div>
@endsection
