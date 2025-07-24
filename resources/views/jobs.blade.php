<x-layout>
    <x-slot:heading>
        job list
    </x-slot:heading>

    <br>
    <ul>
        @foreach ($jobs as $job)
        <li><a href="/jobs/{{ $job['id'] }}" class="text-blue-500 hover:text-blue-700">
                <strong>{{ $job['title'] }}</strong></a> pays {{ $job['salary'] }} per year</li>
        @endforeach
    </ul>
</x-layout>