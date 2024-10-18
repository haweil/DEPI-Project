<div>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold leading-tight text-gray-800 animate-fade-in">
            Admins
        </h2>
    </x-slot>

    <x-slot name="title">
        Admins
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <a href="{{ route('admin.create') }}"
                            class="inline-flex items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white hover:bg-gray-700 transition duration-300 ease-in-out">
                            Create Admin
                        </a>
                    </div>

                    <div class="mb-4 min-w-full overflow-hidden overflow-x-auto align-middle sm:rounded-md">
                        <table class="min-w-full border divide-y divide-gray-200">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="w-16 px-6 py-3 text-left">
                                        <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">ID</span>
                                    </th>
                                    <th class="px-6 py-3 text-left">
                                        <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Name</span>
                                    </th>
                                    <th class="px-6 py-3 text-left">
                                        <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Email</span>
                                    </th>
                                    <th class="w-24 px-6 py-3 text-left"></th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                                @forelse($admins as $admin)
                                    <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            {{ $admin->id }}
                                        </td>
                                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            {{ $admin->name }}
                                        </td>
                                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            {{ $admin->email }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <button wire:click="delete({{ $admin->id }})"
                                                class="rounded-md border border-transparent bg-red-200 px-4 py-2 text-xs uppercase text-red-500 hover:bg-red-300 hover:text-red-700 transition duration-300 ease-in-out">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 text-center leading-5 text-gray-900 whitespace-no-wrap">
                                            No admins were found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{ $admins->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
