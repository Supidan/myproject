@extends('admin.layouts.app-admin')

@section('content')
<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h5>{{ ucfirst($action) }} Data Paket</h5>
            </div>
            <!-- /.card-header -->
              <!-- form start -->
			  <form action="{{ url('admin/product/process') }}" method="post">
				@csrf
				@if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            	@endif
				@if(session()->has('alert-success'))
					<div class="alert alert-success">
						{{ session()->get('alert-success') }}
					</div>
				@endif
			  <input type="hidden" name="txtID" id="txtID" value="{{ $id }}" >
              <div class="card-body">
                <div class="tab-content">
				   <div class="form-group"  >
					<label>Product</label>
					<input type="text" class="form-control" name="txtName" id="txtName" value="{{ session()->get('txtName') }}">
				  </div>

				<div class="form-group"  >
					<label>Stock</label>
					<input type="number" class="form-control" name="txtStock" id="txtStock" value="{{ session()->get('txtStock') }}">
				  </div>

				  <!-- /.card-body -->
				  <button type="submit" class="btn btn-primary">Save</button>
				  <button type="button" class="btn btn-default"><a href="{{ url('admin/product') }}" style="color: #6c757d">Cancel</a></button>
				</form>
		  </div>

            </div>
            </div>

		   </div>


          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection