<div class="bg-gray-800 h-screen w-14 fixed text-center py-5">
    <div class="my-20 text-gray-200">
        <a href="{{ route('company.dashboard', ['company'=> $company->identifier]) }}" class="p-2 block my-5 @if(Request::url() == route('company.dashboard', ['company' => $company->identifier])) text-green-600 @endif hover:text-green-600 focus:outline-none">
            <i class="fas fa-th-large"></i>
        </a>
        <a href="{{ route('staff.index', ['company'=> $company->identifier]) }}" class="p-2 block my-5 @if(Request::url() == route('staff.index', ['company' => $company->identifier]) || Request::url() == route('staff.create', ['company' => $company->identifier])) text-green-600 @endif hover:text-green-600 focus:outline-none">
            <i class="fas fa-users"></i>
        </a>
    </div>
</div>
