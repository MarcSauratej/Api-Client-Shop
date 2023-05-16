<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Catalog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
<!-- tabla -->

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Acction
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                <td class="px-6 py-4">
                    {{$book['id']}}
                </td>
                <td class="px-6 py-4">
                    {{$book['title']}}
                </td>
                <td class="px-6 py-4">
                    {{$book['description']}}
                </td>
                <td class="px-6 py-4">
                    {{$book['created_at']}}
                </td>
                <td class="px-6 py-4">
                    <a href="{{route('shop.view',$book['id'])}}" class="font-medium text-green-600 dark:text-blue-500 hover:underline">Comprar Book</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
