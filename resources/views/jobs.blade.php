<x-layout>
    <x-slot:heading>
        job list
    </x-slot:heading>

    <br>
    <div class="space-y-2">
        @foreach ($jobs as $job)
        
            <div class="px-4 py-6 border border-gray-300 rounded-lg hover:bg-gray-100 ">
            <div class="font-bold text-grey-500"> {{$job->employer->name}}</div>
                <a href="/jobs/{{ $job['id'] }}" class="text-blue-500 hover:text-blue-700">
                    <strong>{{ $job['title'] }}</strong></a> pays <strong>{{ $job['salary'] }}</strong> per year
                </div>
                @endforeach
            </div>
</x-layout>