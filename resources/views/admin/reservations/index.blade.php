@extends('admin.layout', ['title' => 'Table Reservations'])

@section('content')
    <div class="mb-6">
        <h2 class="text-lg font-semibold text-ink">Table Reservations ({{ $reservations->total() }})</h2>
        <p class="text-xs text-ink/50">Manage booking requests and update guest statuses.</p>
    </div>

    <div class="bg-paper rounded-sm border border-ink/10 shadow-sm overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-ink/10 bg-[#faf6ee] text-[10px] uppercase tracking-wider text-ink/50">
                    <th class="p-4">Customer</th>
                    <th class="p-4">Party Size</th>
                    <th class="p-4">Date & Time</th>
                    <th class="p-4">Notes</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-right">Update</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-ink/10 text-xs">
                @forelse($reservations as $res)
                    <tr class="hover:bg-white/50 transition-colors">
                        <td class="p-4">
                            <span class="font-semibold text-ink block">{{ $res->name }}</span>
                            <span class="text-[11px] text-ink/50">{{ $res->phone }} · {{ $res->email }}</span>
                        </td>
                        <td class="p-4 font-semibold text-terracotta">
                            {{ $res->guests }} {{ Str::plural('person', $res->guests) }}
                        </td>
                        <td class="p-4">
                            <span class="font-medium text-ink block">{{ $res->date->format('l, M d, Y') }}</span>
                            <span class="text-[11px] text-ink/50">{{ $res->time }}</span>
                        </td>
                        <td class="p-4 text-ink/70 italic max-w-xs">
                            {{ $res->special_requests ?: 'None' }}
                        </td>
                        <td class="p-4">
                            <span class="px-2.5 py-1 text-[9px] uppercase tracking-wider rounded-full {{ $res->status === 'confirmed' ? 'bg-emerald-100 text-emerald-800' : ($res->status === 'cancelled' ? 'bg-red-100 text-red-800' : 'bg-amber-100 text-amber-800') }}">
                                {{ $res->status }}
                            </span>
                        </td>
                        <td class="p-4 text-right">
                            <form action="{{ route('admin.reservations.status', $res) }}" method="POST" class="inline-flex gap-2">
                                @csrf
                                @method('PATCH')
                                @if($res->status !== 'confirmed')
                                    <button type="submit" name="status" value="confirmed" class="text-xs text-emerald-700 hover:underline">Confirm</button>
                                @endif
                                @if($res->status !== 'cancelled')
                                    <button type="submit" name="status" value="cancelled" class="text-xs text-red-600 hover:underline">Cancel</button>
                                @endif
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-8 text-center text-xs text-ink/40">
                            No reservations recorded.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="p-4 border-t border-ink/10">
            {{ $reservations->links() }}
        </div>
    </div>
@endsection
