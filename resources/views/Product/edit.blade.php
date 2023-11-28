@extends('layouts.admin.master') 
@section('title')
    Change Product {{ $data->title }} 
@endsection

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data- dismiss="alert">x</button>
            <strong>{{ $message }}</strong>
        </div> 
    @endif
    <div class="card p-3 rounded shadow-sm">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text- primary">@yield('title')</h6>
                <a href="{{ route('admin.product.index') }}" class="btn btn-sm btn-outline-primary"><i class="fa fa-list"></i>
                    List Product</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.product.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PATCH")
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">Title product</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"name="title" autocomplete="off" value="{{ $data->title }}" required>
                            @error('title')
                                <span class="invalid-feedback"role="alert">
                                      <strong>{{ $message }}</strong>
                                </span> 
                            @enderror
                        </div>
                    </div>

<tbody>
    @forelse ($data as $cast)
    <tr>
        <th scope="row">{{ $loop ->iteration }}</th>
        <th>
            <img src="{{ asset('img/' . $cat->image) }}" alt=""widht="100px" height="50px">
        </th>
        <td>{{ $cat->tittle }}</td>
        <td>{{ $cat->category->tittle->category }}</td>
        <td>{{ $cat->harga }}</td>
        <td>
            <a href="{{route('admin.product.edit', $cat->id) }}" class="btn btn-warning btn-sm">
                <i class ="fa fa-edit"></i>
            Edit</a>
            <a href="{{ rouete('admin.product.edit', $cat->id) }}" class ="btn btn-warning btn-sm ">
                <i class = "fa fa-trash"></i>
            Hapus</a>
        </td>
    </tr>
    @empty
        <tr>
            <th colspan="6" class="text-center"> Not Found</th>
        </tr>
    @endforelse
</tbody>