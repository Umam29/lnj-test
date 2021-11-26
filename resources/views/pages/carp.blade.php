@extends('layouts.main')

@section('title', 'CARP')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{url('assets')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{url('assets')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{url('assets')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!-- daterange picker -->
<link rel="stylesheet" href="{{url('assets')}}/plugins/daterangepicker/daterangepicker.css">
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>CARP</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">CARP</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <span class="float-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addData"><i class="fa fa-plus"></i> Add</button>
                </span>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Create Date</th>
                            <th>Carp Code</th>
                            <th>Category</th>
                            <th>Initiator</th>
                            <th>Initiator Division</th>
                            <th>Initiator Branch</th>
                            <th>Recipient</th>
                            <th>Recipient Division</th>
                            <th>Recipient Branch</th>
                            <th>Verified By</th>
                            <th>Due Date</th>
                            <th>Effectiveness</th>
                            <th>Status Date</th>
                            <th>Stage</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
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
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

    <form action="{{url()->current()}}/delete" method="POST" id="formDeleteCarp">
        @csrf
        <input type="hidden" id="deleteId" name="id">
    </form>
  @include('pages.components.modal')
@endsection

@section('js')
<!-- DataTables  & Plugins -->
<script src="{{url('assets')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{url('assets')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- date-range-picker -->
<script src="{{url('assets')}}/plugins/daterangepicker/daterangepicker.js"></script>

<script>
    $(function () {

      $('#example1').DataTable({
            processing: true,
            serverSide: true,
            language: {
                processing: '<i class="fa fa-4x fa-asterisk fa-spin text-info"></i>'
            },
            ajax: {
                url: "{{url('')}}/carp/load/data",
                type: 'GET',
            },
            searching: true,
            scrollX: true,
            columns: [
                { data:"id", name:"id" },
                { data:"created_at", name:"created_date" },
                { data:"carp_code", name:"carp_code" },
                { data:"category", name:"category" },
                { data:"initiator", name:"initiator" },
                { data:"initiator_div", name:"initiator_div" },
                { data:"initiator_branch", name:"initiator_branch" },
                { data:"recipient", name:"recipient" },
                { data:"recipient_div", name:"recipient_div" },
                { data:"recipient_branch", name:"recipient_branch" },
                { data:"verified_by", name:"verified_by" },
                { data:"due_date", name:"due_date" },
                { data:"effectiveness", name:"effectiveness" },
                { data:"status_date", name:"status_date" },
                { data:"stage", name:"stage" },
                { data:"status", name:"status" },
                { data:"aksi", name:"aksi" },
            ],
      });
    });

    function showModalEdit(id)
    {
        $('#addData').modal('show');
        $.ajax({
            url: "{{url('')}}/carp/"+id,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                $('#modaladdDataLabel').html('Edit Data');
                $('#id').val(response.id);
                $('#created_date').val(response.created_date_format);
                $('#carp_code').val(response.carp_code);
                $('#category').val(response.category);
                $('#initiator').val(response.initiator);
                $('#initiator_div').val(response.initiator_div);
                $('#initiator_branch').val(response.initiator_branch);
                $('#recipient').val(response.recipient);
                $('#recipient_div').val(response.recipient_div);
                $('#recipient_branch').val(response.recipient_branch);
                $('#verified_by').val(response.verified_by);
                $('#due_date').val(response.due_date_format);
                $('#effectiveness').val(response.effectiveness).trigger('change');
                $('#stage').val(response.stage).trigger('change');
                $('#status').val(response.status).trigger('change');
                $('#status_date').val(response.status_date_format);
            },
            error: function() {
            },
        })
    }

    function showModalDelete(id) {
        $("#deleteId").val(id);

        swal.fire({
			title: "Delete",
			text: "Are you sure delete this data?",
			showCancelButton: true,
			reverseButtons: true,
			icon: "warning",
			confirmButtonClass: "btn btn-danger",
			cancelButtonClass: "btn btn-default",
			confirmButtonText: "Delete",
			cancelButtonText: "Batal",
			closeOnConfirm: false
		}).then(function(result) {
			if(result.value)
			{
				$("#formDeleteCarp").submit();
			}
		});
    }
  </script>
@endsection
