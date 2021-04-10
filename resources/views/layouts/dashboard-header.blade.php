<div class="px-10 py-5">
    <p class="text-sm text-gray-500">{{ date('d F, Y') }}</p>
    <h1 class="text-3xl">{{ auth()->user()->personal->first_name }} {{ auth()->user()->personal->last_name }}</h1>
    <p class="text-sm text-green-600 font-bold">{{ auth()->user()->company->name }}</p>
</div>
