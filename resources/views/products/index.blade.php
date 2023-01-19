@extends('products.layout')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>halaman products hajar</h2>
</div>
<div class="pull-right">
<a class="btn btn-info" href="{{ route('datasiswas.index') }}">Datasiswa</a>
<a class="btn btn-info" href="{{ route('rombels.index') }}">Rombel</a>
<a class="btn btn-info" href="{{ route('rayons.index') }}">Rayon</a>
<form action="{{ route('logout') }}" method="post">
    @csrf
    <button class="btn btn-danger" type="submit">Logout</button>
</form>
<a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th>No</th>
<th>Name</th>
<th>Details</th>
<th width="280px">Action</th>
</tr>
@foreach ($products as $product)
<tr>
<td>{{ ++$i }}</td>
<td>{{ $product->name }}</td>
<td>{{ $product->detail }}</td>
<td>
<form action="{{ route('products.destroy',$product->id) }}" method="POST">
<a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
<a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger" onclick="return confirm('Yakin mau ngehapus {{ $product->name }} ?')">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
{!! $products->links() !!}
@endsection