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
        <li class="breadcrumb-item active" aria-current="page">Guide List</li>
        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{route('guide.create')}}">Guide Add</a></li>
      </ol>
    </nav>
  </div>
  <div class="row">
    <div class="col-lg-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-center">Guide List</h4>
            <p class="card-description text-center"> Total<code>({{$guides->count()}})</code>
            </p>
            <table id="example" class="table table-bordered">
              <thead>
                <tr>
                  <th> # </th>
                  <th> Image </th>
                  <th> Name </th>
                  <th> Email </th>
                  <th> Phone </th>
                  <th> NID </th>
                  <th> Profession </th>
                  <th> Address </th>
                  <th> Role </th>
                </tr>
              </thead>
              <tbody>
                @if ($guides->count() > 0)
                  @foreach ($guides as $guide)
                    <tr class="table-info">
                      <td> {{$guide->id}} </td>
                      <td> <img src="{{ asset('/uploads/images/') }}/{{ $guide->image }}" alt="{{$guide->image}}"> </td>
                      <td> 
                        {{$guide->name}}
                        <div class="mt-2">
                          <a class="text-primary text-decoration-none h4" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$guide->id}}" href="">
                            <i class="mdi mdi-eye"></i>
                          </a>

                          <!-- Modal -->
                          <div class="modal fade" id="exampleModal_{{$guide->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Gude Details</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <div class="card py-3">
                                    <div class="card-title text-center">
                                      <img class="img-fluid w-25 h-25 border border-1" src="{{asset('uploads/images')}}/{{$guide->image}}" alt="{{$guide->name}}">
                                      <div class="h4">{{$guide->name}}</div>
                                    </div>
                                    <div class="card-body text-center">
                                      <div><b>Father Name:</b> {{ $guide->father_name }}</div>
                                      <div><b>Email:</b> {{ $guide->email }}</div>
                                      <div><b>Phone:</b> {{ $guide->phone }}</div>
                                      <div><b>Birth Date:</b> {{ $guide->birth_date }}</div>
                                      <div><b>NID Number:</b> {{ $guide->nid }}</div>
                                      <div><b>Profession:</b> {{ $guide->profession }}</div>
                                      <div><b>Country:</b> {{ $guide->country->name }}</div>
                                      <div><b>Division:</b> {{ $guide->division->name }}</div>
                                      <div><b>District:</b> {{ $guide->district->name }}</div>
                                      <div><b>Marital Status:</b> {{ $guide->marital_status==1?"Married":"Unmarried" }}</div>
                                      <div><b>Visited Places:</b> {{ $guide->visited_places }}</div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <a class="text-secondary text-decoration-none h4" href="{{route('guide.edit', $guide->slug)}}">
                            <i class="mdi mdi-tooltip-edit"></i>
                          </a>
                          <a class="text-danger text-decoration-none h4" onclick="return confirm('Are you sure you want to delete this record?')" href="{{ route('guide.delete', $guide->slug) }}">
                            <i class="mdi mdi-delete"></i>
                          </a>
                        </div>
                      </td>
                      <td> {{$guide->email}} </td>
                      <td> {{$guide->phone}} </td>
                      <td> {{$guide->nid}} </td>
                      <td> {{$guide->profession}} </td>
                      <td> 
                        {{ $guide->country->name }} <br>
                        {{ $guide->division->name }} <br>
                        {{ $guide->district->name }} <br>
                      </td>
                      <td> <label class="badge badge-danger">
                        @if ($guide->is_admin == 1)
                            {{ 'Admin' }}
                        @elseif($guide->is_admin == 2)
                            {{ 'Guide' }}
                        @else 
                            {{ 'User' }}
                        @endif  
                      </label> </td>
                    </tr>
                  @endforeach
                @else
                  <tr class="table-info text-center">
                    <td colspan="9">No Data Avilable</td>
                  </tr>
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>
@endsection