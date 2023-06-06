@extends('layouts/layoutMaster')

@section('title', 'Tables - Basic Tables')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  Teams
</h4>



<!-- Bootstrap Table with Header - Light -->
<div class="card">
  <h5 class="card-header">List of Team</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead class="table-light">
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>League</th>
          <th>Country Name</th>
          <th>Action</th>

        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach ($allleagues as $key=> $item)
        <tr>
          <td>{{ $key +1 }}</td>
          <td>{{ isset($item->league) ? $item->league->name : null }}</td>

          <td>{{ $item->name }}
          </td>
          <td>{{ $item->country_name }}</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('edit-team', $item->id) }}"><i class="ti ti-pencil me-1"></i> Edit</a>
                <a class="dropdown-item" href="{{ route('delete-team', $item->id) }}"><i class="ti ti-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<hr class="my-5">
<!--/ Responsive Table -->

@endsection
