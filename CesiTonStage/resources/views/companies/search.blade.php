@include('partials.search_bar')

@foreach ($companies as $company)
    <h3>
        {{ $company->Name_Company }},
        {{ $company->Email_Company }},
        {{ $company->Phone_number_Company }},
        {{ $company->Description_Company }},
        {{ $company->Siret_number_Company }}
    </h3>
@endforeach

{{ $companies->appends(request()->query())->links() }}
