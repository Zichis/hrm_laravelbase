<x-dashboard-layout :company=$company>
    <x-slot name="header">
        <div class="px-10 py-5">
            <h1 class="text-3xl">{{ auth()->user()->personal->first_name }} {{ auth()->user()->personal->last_name }}</h1>
            <p>{{ auth()->user()->company->name }}</p>
        </div>
    </x-slot>

    <div class="px-10 py-5">
        <h1>Dashboard</h1>
    </div>
</x-dashboard-layout>
