<x-dashboard-layout :company=$company>
    <div class="px-10 py-5">
        <div class="p-5 bg-white shadow-lg rounded border border-gray-300">
            <div class="flex justify-between items-center mb-3">
                <h2 class="text-2xl font-bold text-gray-700">Staff</h2>
                <a href="{{ route('staff.create', $company->identifier) }}" class=" bg-gray-800 text-gray-100 px-3 py-1 rounded shadow-md font-semibold hover:bg-gray-700">
                    <i class="fas fa-user-plus"></i> Add
                </a>
            </div>
            <table class="table-auto w-full text-left whitespace-no-wrap">
                <thead class="p-5 shadow-lg bg-green-600 text-white">
                    <tr>
                        <th class="p-2 rounded-tl rounded-bl">Name</th>
                        <th class="p-2">E-mail</th>
                        <th class="p-2 rounded-tr rounded-br">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($company->staff as $staff)
                        <tr class="@if($loop->iteration % 2 == 0) bg-gray-100 @endif @if(auth()->user()->id == $staff->id) font-bold @endif">
                            <td class="p-2">{{ $staff->personal->first_name }} {{ $staff->personal->last_name }}</td>
                            <td class="p-2">{{ $staff->email }}</td>
                            <td class="p-2"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard-layout>
