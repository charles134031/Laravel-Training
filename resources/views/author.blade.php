@extends('layout')
@section('title', 'User Dashboard')

@section('content')
<div class="container-fluid p-0">
    <div class="row g-0">
        <div class="col-12">
            
            <div class="card rounded-0 border-0 shadow-sm">
                
                <div class="card-header d-flex justify-content-between align-items-center py-3">
                    <h5 class="mb-0">Records List</h5>
                    <div>
                        <span class="badge bg-primary me-2">
                            Total Records: {{ $data->total() }}
                        </span>
                        <a href="/author/create" class="btn btn-success btn-sm">
                            + Add New
                        </a>
                    </div>
                </div>
                
                <div class="card-body p-0 w-100">
                    <div class="table-responsive w-100">
                        <table class="table table-hover table-striped mb-0 align-middle w-100">
                            
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    
                                   
                                    <th width="180">Action</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @forelse($data as $record)
                                    <tr>
                                        <td>{{ $record->id }}</td>
                                        
                                        <td class="fw-semibold text-dark">
                                            {{ $record->name ?? $record->title ?? 'Unnamed' }}
                                        </td>
                                        
                                        
                                        
                                        
                                        <td>
                                            <a href="/author/edit/{{ $record->id }}" class="btn btn-warning btn-sm">
                                                Edit
                                            </a>

                                            <form action="/author/delete/{{ $record->id }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE') 
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-5 text-muted">
                                            <p class="mb-0 fs-5">No records found in the database.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                            
                        </table>
                    </div>
                </div>
                
                <div class="card-footer bg-white py-3 d-flex justify-content-center">
                    {{ $data->links() }}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection