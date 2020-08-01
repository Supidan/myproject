@extends('admin.layouts.app-admin')

@section('content')
<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="box-header with-border">
                    <h4 class="box-title"> <a href="{{ url('admin/product/add') }}" class="btn btn-info btn-md"><li class="fas fa-plus mr-2"></li>Tambah Transaksi</a></h4>
                          <div class="box-tools pull-right"></div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
				@if(session()->has('alert-success'))
					<div class="alert alert-success">
						{{ session()->get('alert-success') }}
					</div>
				@endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
					<tr>
						<th>No.</th>
						<th>Product Name</th>
						<th>Stock</th>
						<th>Action</th>
					</tr>
				</thead>
                  <tbody>
					@forelse ($data as $d)
						  <tr>
							<td>{{$loop->iteration}}</td>
							<td>{{ $d->product_name }}</td>
							<td>{{ $d->stock }}</td>
							<td>
							  <a href="{{ url('admin/product/edit/'.$d->id) }}" class="btn btn-info btn-sm">Edit</a>
							  <a href="{{ url('admin/product/delete/'.$d->id) }}" class="btn btn-danger btn-sm">Delete</a>
							</td>
						  </tr> 
					@empty
						<tr><td colspan="4" style="text-align: center">No Product</td></tr>
					@endforelse
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection