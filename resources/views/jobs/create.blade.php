<x-layout>
    <x-slot:heading>
        Create Job
    </x-slot:heading>

    <form method="POST" action="/jobs">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Job</h2>
                <p class="mt-1 text-sm/6 text-gray-600">Please fill in the following information to create a new job.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <x-form-label for="title">Title</x-form-label>
                        <div class="mt-2">
                           <x-form-input name="title" id="title" placeholder="manager" required/>
                        </div>
                        <x-form-error name="title"/>
                        
                    </div>
                    <div class="sm:col-span-4">
                        <x-form-label for="salary">Salary</x-form-label>
                        <div class="mt-2">
                           <x-form-input name="salary" id="salary" placeholder="100000 per year" required/>
                        </div>
                        <x-form-error name="salary"/>
                        
                    </div>
                </div>
                <!-- @if($errors->any())
                    <div class="mt-6 text-sm text-red-600">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif -->
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
            <x-form-button type="submit">Save</x-form-button>
        </div>
    </form>
</x-layout>