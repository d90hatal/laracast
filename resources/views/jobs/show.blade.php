<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>

    <h2 class="font-bold text-lg">{{ $job->title }}</h2>

    <p>
        This job pays {{ $job['salary'] }} per year.
    </p>
    <p>
        <x-button href="/jobs/{{ $job->id }}/edit" class="my-6">Edit</x-button>
    </p>
</x-layout>