@extends('layouts/contentNavbarLayout')

@section('title', ' Services')

@section('content')
  <div class="row">
    <!-- Basic Layout -->
    <div class="col-xxl">
      <div class="card mb-4">
        @if(session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
        @endif
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0">Add Service</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('all_services.store') }}" method="POST">
            @csrf
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="slider_title">Title</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="title" placeholder="Title" />
                @error('title')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="description">Description</label>
              <div class="col-sm-10">
                <textarea id="editor10" name="description"></textarea>
                @error('description')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
