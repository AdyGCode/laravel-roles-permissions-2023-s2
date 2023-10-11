<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2>Create a new user</h2>

                    @if (count($errors) > 0)
                        <div class="rounded bg-red-100 text-red-800 p-4 flex flex-col gap-2 mb-8">
                            <h3 class="text-lg"><strong>Whoops!</strong> There were some problems with your input.</h3>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('users.store') }}"
                          class="flex flex-col gap-2 ml-4" method="post">
                        @csrf

                        <div>
                            <label for="Name">Name</label>
                            <input type="text" id="Name" name="name" value="{{ old('name') }}">
                        </div>
                        <div>
                            <label for="eMail">eMail</label>
                            <input type="text" id="eMail" name="email" value="{{ old('email') }}">
                        </div>
                        <div>
                            <label for="Password">Password</label>
                            <input type="text" id="Password" name="password">
                        </div>
                        <div>
                            <label for="Confirm">Confirm Password</label>
                            <input type="password" id="Confirm" name="confirm-password">
                        </div>

                        <div>

                            <label for="Roles">Roles</label>
                            <select name="roles[]" id="Roles" multiple>
                                @foreach($roles as $role)

                                    <option value="{{ $role }}"
                                            @if(Illuminate\Support\Arr::has($roles, old('roles')))
                                            selected
                                        @endif
                                    >{{ $role }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div><a href="{{ route('users.index') }}"
                                class="rounded bg-green-500 text-white p-2">Back</a>
                            <button type="submit">Save</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
