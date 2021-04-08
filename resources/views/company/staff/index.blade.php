<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $company->name }} {{ __('Staff') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3>Staff</h3>
                    @foreach ($company->staff as $staff)
                        <p><a class="font-bold text-red-500 hover:text-red-700" href="{{ route('staff.show', ['company' => $company->identifier, 'staff' => $staff->id]) }}">{{ $staff->personal->first_name }}</a></p>
                    @endforeach
                    <p>Add staff <a class="font-bold text-blue-500 hover:text-blue-700" href="{{ route('staff.create', $company->identifier) }}">here</a></p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
