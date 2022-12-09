@include('layouts.messagetoast')

<div class="p-10 w-full">

    <!-- ADMIN Table -->
    <h2 class="text-lg font-medium mt-10">Admins <span
            class="ml-4 px-4 bg-green-500 text-white">{{ count($admins) }}</span></h2>
    <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg mt-3">

        <table class="min-w-full">
            <tr>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                    ID</th>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                    Image</th>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                    Username</th>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                    Email</th>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                    Country</th>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                    Gender</th>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                    width="180px">Action</th>
            </tr>
            <tbody class="bg-white">
                @foreach ($admins as $admin)
                    <tr>
                        <td class="px-6 whitespace-no-wrap border-b border-gray-200">{{ $admin->id }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 capitalize">
                            <img class="rounded-full" width="50px" height="50px" src=" {{ $admin->image }}"
                                alt="">
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 capitalize">
                            {{ $admin->username }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            {{ $admin->email }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            {{ $admin->country }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 capitalize">
                            {{ $admin->gender }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="flex justify-between w-[60px]">
                                <form action="{{ route('user.destroy', $admin->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" {{ count($admins) == 1 ? 'disabled' : '' }}>
                                        <i
                                            class="bx bx-trash text-xl text-red-600 hover:text-red-800 disabled:opacity-50"></i>
                                    </button>

                                </form>
                                <form action="{{ route('user.update', $admin->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="text" name="role" value="user" hidden>
                                    <button type="submit" {{ count($admins) == 1 ? 'disabled' : '' }}>
                                        <i
                                            class="bx bx-user-x text-2xl text-red-600 hover:text-red-800 disabled:text-gray-500"></i>
                                    </button>

                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- USERS Table -->

    <h2 class="text-lg font-medium mt-10">Users <span
            class="ml-10 px-4 bg-green-500 text-white">{{ count($users) }}</span></h2>
    <div
        class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg mt-3">

        <table class="min-w-full">
            <tr>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                    ID</th>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                    Image</th>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                    Username</th>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                    Email</th>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                    Country</th>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                    Gender</th>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                    width="180px">Action</th>
            </tr>
            <tbody class="bg-white">
                @foreach ($users as $user)
                    <tr>
                        <td class="px-6 whitespace-no-wrap border-b border-gray-200">{{ $user->id }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 capitalize">
                            <img class="rounded-full" width="50px" height="50px" src=" {{ $user->image }}"
                                alt="">
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 capitalize">
                            {{ $user->username }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            {{ $user->email }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            {{ $user->country }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 capitalize">
                            {{ $user->gender }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="flex justify-between w-[60px]">
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit">
                                        <i class="bx bx-trash text-lg text-red-600 hover:text-red-800"></i>
                                    </button>

                                </form>
                                <form action="{{ route('user.update', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="text" name="role" value="admin" hidden>
                                    <button type="submit">
                                        <i class="bx bx-user-plus text-2xl text-green-500 hover:text-green-800 "></i>
                                    </button>

                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-10 py-5 mt-10">
            {!! $users->links() !!}
        </div>
    </div>
</div>
