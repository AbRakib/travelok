@extends('admin.app')
@section('content')
<div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-home"></i>
      </span> Dashboard
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
          <span></span><i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i> Overview
        </li>
      </ol>
    </nav>
  </div>
  <div class="row">
    <div class="col-lg-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-center">contact List</h4>
            <p class="card-description text-center"> Total<code>({{$contacts->count()}})</code>
            </p>
            <table id="example" class="table table-bordered">
              <thead>
                <tr>
                  <th> # </th>
                  <th> Name </th>
                  <th> Email </th>
                  <th> Subject </th>
                  <th> Message </th>
                  <th> Create Date </th>
                  <th> Action </th>
                </tr>
              </thead>
              <tbody>
                @if ($contacts->count() > 0)
                  @foreach ($contacts as $contact)
                    <tr class="table-info">
                      <td> {{$contact->id}} </td>
                      <td> {{$contact->name}} </td>
                      <td> {{$contact->email}} </td>
                      <td> {{$contact->subject}} </td>
                      <td> {{$contact->message}} </td>
                      <td> {{$contact->created_at}} </td>
                      <td>
                        <a href="{{ route('contact.delete', $contact->id) }}" class="text-danger text-decoration-none h4" onclick="return confirm('Are you sure you want to delete this record?')">
                            <i class="mdi mdi-delete"></i>
                        </a>
                      </td>
                    </tr>
                  @endforeach
                @else
                  <tr class="table-info text-center">
                    <td colspan="7">No Data Avilable</td>
                  </tr>
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>
@endsection