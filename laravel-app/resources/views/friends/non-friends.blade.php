<x-app-layout>

    <div class="container">
    <div class="mt-2">
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">


            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table  class="min-w-full divide-y divide-gray-200 w-full">
                                <thead>
                                <tr>
                                    <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">

                                @foreach ($users as $user)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->email }}</td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">


                                            <div class="flex justify-left text-left">
                                                @php($friendshipStatus = app('App\Http\Controllers\FriendController')->getFriendshipStatus($user->id))
                                                @if($friendshipStatus === 'pending')
                                                    <span class="text-indigo-600"> PENDING REQUEST</span>
                                                @elseif($friendshipStatus === 'accepted')
                                                    <span class="text-green-600"> FRIENDS</span>
                                                @elseif($friendshipStatus === 'rejected')
                                                    <span class="text-red-600"> REJECTED</span>


                                                @else
                                                    <form action="{{ route('add-friend', $user->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full">Add Friend</button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="p-4">
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
</x-app-layout>


