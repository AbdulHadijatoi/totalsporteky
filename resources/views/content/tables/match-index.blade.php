@extends('layouts/layoutMaster')

@section('title', 'Tables - Basic Tables')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  leagues
</h4>



<!-- Bootstrap Table with Header - Light -->
<div class="card">
  <h5 class="card-header">List of leagues</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead class="table-light">
        <tr>
          <th>#</th>
          <th>League Name</th>
          <th>Home team</th>
          <th>Away Team</th>
          <th>Date</th>
          <th>Time</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach ($matches as $key=> $item)
        <tr>
          <td>{{ $item->id }}</td>
          <td>{{ $item->league->name??'-' }}</td>
          <td>{{ $item->home_team??'-' }}
          </td>
          <td>{{ $item->away_team??'-' }}</td>
          <td>{{ $item->date_of_match??'-' }}</td>
          <td>{{ $item->start_time??'-' }}</td>
          <td>
            @if($item->status == 1)
              <span class="badge bg-label-success">Active</span>
            @else
              <span class="badge bg-label-danger">Inactive</span>
            @endif
          </td>

          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('edit-match', $item->id) }}"><i class="ti ti-pencil me-1"></i> Edit</a>
                <a class="dropdown-item" href="{{ route('delete-match', $item->id) }}"><i class="ti ti-trash me-1"></i> Delete</a>
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
