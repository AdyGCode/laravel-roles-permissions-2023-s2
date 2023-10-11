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

                    {{-- table.table>(thead>tr>th{Heading}*5)+(tbody>tr>td{Item}*5)+(tfoot>tr>td{navigation}) --}}

                    <table class="table w-full">
                        <caption class="text-right mb-2 ">
                            <a href="{{route('users.create')}}" class="rounded bg-gray-500 text-white p-2 hover:bg-gray-900">Add User</a>
                        </caption>
                        <thead>
                        <tr class="">
                            <th>No</th>
                            <th>Name</th>
                            <th>eMail</th>
                            <th>Roles</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key=>$user)
                            <tr class="">
                                <td>{{ $key }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="flex flex-row gap-4">
                                    @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $roleName)
                                            <p class="rounded bg-gray-500 text-white p-1 text-sm">
                                                {{ $roleName }}
                                            </p>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('users.destroy', $user) }}"
                                          class="flex flex-row gap-2 ml-4" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('users.show', $user) }}"
                                           class="rounded bg-green-500 text-white p-2">Show</a>
                                        <a href="{{ route('users.edit', $user) }}"
                                           class="rounded bg-blue-500 text-white p-2">Edit</a>
                                        <button type="submit" class="rounded bg-red-500 text-white p-2">
                                            Delete
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td>
                                {{ $users->links() }}
                            </td>
                        </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
