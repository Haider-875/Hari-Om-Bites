@extends('admin.layout', ['title' => 'Table Reservations'])

@section('content')
    <div class="mb-4">
        <h2 class="fs-5 fw-semibold text-ink m-0">Table Reservations ({{ $reservations->total() }})</h2>
        <p class="small text-ink-50 m-0">Manage booking requests and update guest statuses.</p>
    </div>

    <div class="bg-paper rounded-sm border border-ink-10 shadow-sm overflow-hidden table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead style="background-color: #faf6ee;">
                <tr class="border-bottom border-ink-10 text-uppercase tracking-wider-custom text-ink-50" style="font-size: 10px;">
                    <th class="p-3">Customer</th>
                    <th class="p-3">Party Size</th>
                    <th class="p-3">Date & Time</th>
                    <th class="p-3">Notes</th>
                    <th class="p-3">Status</th>
                    <th class="p-3 text-end">Update</th>
                </tr>
            </thead>
            <tbody class="small">
                @forelse($reservations as $res)
                    <tr>
                        <td class="p-3">
                            <span class="fw-semibold text-ink d-block small">{{ $res->name }}</span>
                            <span class="text-ink-50 d-block" style="font-size: 11px;">{{ $res->phone }} · {{ $res->email }}</span>
                        </td>
                        <td class="p-3 fw-semibold text-terracotta small">
                            {{ $res->guests }} {{ Str::plural('person', $res->guests) }}
                        </td>
                        <td class="p-3">
                            <span class="fw-medium text-ink d-block small">{{ $res->date->format('l, M d, Y') }}</span>
                            <span class="text-ink-50 d-block" style="font-size: 11px;">{{ $res->time }}</span>
                        </td>
                        <td class="p-3 text-ink-70 fst-italic small max-w-xs">
                            {{ $res->special_requests ?: 'None' }}
                        </td>
                        <td class="p-3">
                            <span class="px-2 py-1 text-uppercase tracking-wider-custom rounded-full" 
                                  style="font-size: 9px; {{ $res->status === 'confirmed' ? 'background-color: #d1fae5; color: #065f46;' : ($res->status === 'cancelled' ? 'background-color: #fee2e2; color: #991b1b;' : 'background-color: #fef3c7; color: #92400e;') }}">
                                {{ $res->status }}
                            </span>
                        </td>
                        <td class="p-3 text-end">
                            <form action="{{ route('admin.reservations.status', $res) }}" method="POST" class="d-inline-flex gap-2 m-0">
                                @csrf
                                @method('PATCH')
                                @if($res->status !== 'confirmed')
                                    <button type="submit" name="status" value="confirmed" class="border-0 bg-transparent p-0 small text-decoration-none cursor-pointer" style="color: #047857;">Confirm</button>
                                @endif
                                @if($res->status !== 'cancelled')
                                    <button type="submit" name="status" value="cancelled" class="border-0 bg-transparent p-0 small text-danger text-decoration-none cursor-pointer">Cancel</button>
                                @endif
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-4 text-center small text-ink-40">
                            No reservations recorded.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="p-3 border-top border-ink-10">
            {{ $reservations->links() }}
        </div>
    </div>
@endsection
