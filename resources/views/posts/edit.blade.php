@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="content">
            <!-- Bootstrap Design -->
            <h2 class="content-heading">Create Posts</h2>
            <div class="row">
                <div class="col-md-12">
                    <!-- Default Elements -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Posts</h3>
                        </div>
                        <div class="block-content">
    
                        @if(Session::has('message'))
                            <p >{{ Session::get('message') }}</p>
                        @endif
    
                        <form action="{{ route('posts.update', $posts->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                                <div class="form-group row">
                                    <label class="col-12" for="example-text-input">Title</label>
                                    <div class="col-md-9">
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ $posts->title }}" name="title" placeholder="Text..">
                                        @error('title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12" for="example-textarea-input">Content</label>
                                    <div class="col-12">
                                        <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="6" placeholder="Content..">{{ $posts->content }}</textarea>
                                        @error('content')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="form-group row">
                                    <label class="col-12">Bootstrap's Custom File Input</label>
                                    <div class="col-8">
                                        <div class="custom-file">
                                            <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                            <input type="file" class="custom-file-input" id="example-file-input-custom" name="example-file-input-custom" data-toggle="custom-file-input">
                                            <label class="custom-file-label" for="example-file-input-custom">Choose file</label>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="form-group row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-alt-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END Default Elements -->
                </div>
            </div>
            <!-- END Bootstrap Design -->
        </div>
        <!-- END Page Content -->
@endsection