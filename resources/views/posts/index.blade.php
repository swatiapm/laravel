@extends('layouts.backend')

@section('content')
<!-- Page Content -->
<div class="content">
    <h2 class="content-heading">Posts</h2>

    @if(Session::has('message'))
        <p >{{ Session::get('message') }}</p>
    @endif

    <!-- Full Table -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">List</h3>
        </div>
        <div class="block-content">
            <div class="table-responsive">
                <table class="table table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 100px;"><i class="fa fa-list-ol"></i></th>
                            <th>Title</th>
                            <th style="width: 30%;">Content</th>
                            {{-- <th style="width: 15%;">Access</th> --}}
                            <th class="text-center" style="width: 100px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($result as $key => $val)
                        <tr>
                            <td class="text-center">
                                {{ ++$key }}
                                {{-- <img class="img-avatar img-avatar48" src="{{ asset('media/avatars/avatar12.jpg') }}" alt=""> --}}
                            </td>
                            <td class="font-w600">{{ $val->title }}</td>
                            <td>{{ $val->content }}</td>
                            {{-- <td>
                                <span class="badge badge-info">Business</span>
                            </td> --}}
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit">
                                        <a href="{{ route('posts.edit', $val->id) }}"><i class="fa fa-pencil"></i></a>
                                    </button>
                                    <form action="{{ route('posts.destroy', $val->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Delete">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {!! $result->links() !!}
    </div>
    <!-- END Full Table -->

</div>
<!-- END Page Content -->
@endsection