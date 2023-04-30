<x-app-layout>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div
            class="bg-white my-3 p-5 overflow-hidden shadow-xl sm:rounded-lg flex justify-between  sm:flex-row-reverse flex-col items-center">
            <div class="flex flex-col sm:flex-row-reverse items-center ">
                <div class="flex flex-col items-center ml-2 " style="min-width: 200px;">
                    <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"
                        class="rounded-full h-100 w-20 object-cover">

                    <span class="text-blue-500 text-sm mt-2">{{ $user->name }}</span>
                    <span class="text-blue-500 text-sm mb-2">{{ $user->job }}</span>

                    <div class="flex flex-row-reverse">
                        @switch($user->average())
                            @case(1)
                                <x-star-fill />
                                <x-star />
                                <x-star />
                                <x-star />
                                <x-star />
                            @break

                            @case(2)
                                <x-star-fill />
                                <x-star-fill />
                                <x-star />
                                <x-star />
                                <x-star />
                            @break;
                            @case(3)
                                <x-star-fill />
                                <x-star-fill />
                                <x-star-fill />
                                <x-star />
                                <x-star />
                            @break

                            @case(4)
                                <x-star-fill />
                                <x-star-fill />
                                <x-star-fill />
                                <x-star-fill />
                                <x-star />
                            @break

                            @case(5)
                                <x-star-fill />
                                <x-star-fill />
                                <x-star-fill />
                                <x-star-fill />
                                <x-star-fill />
                            @break


                        @break

                        @default
                            <x-star />
                            <x-star />
                            <x-star />
                            <x-star />
                            <x-star />
                    @endswitch
                </div>


            </div>


            <p class="text-center sm:text-right my-2"style="max-width: 750px">
                {{ $user->body }}
            </p>
        </div>
        <div class="flex flex-col">

            @if (auth()->user()->id === $user->id)
                <a href="/user/profile/"
                    class="bg-teal-500 hover:bg-teal-600 active:bg-teal-700 transition p-2 rounded-md text-white text-center">
                    تعديل الملف الشخصي
                </a>
            @else
                <a href="tel:{{ $user->mobile }}"
                    class="bg-green-500 hover:bg-green-600 active:bg-green-700 transition duration-300 p-2 mb-2 px-10 rounded-md text-white text-center">
                    اتصل
                </a>

                @if ($isRated)
                    <span
                        class="bg-orange-500   p-2  rounded-md text-white text-center" style="user-select:none">
                        تم التقييم
                    </span>
                @else
                    <a href="/user/profile/{{ $user->id }}/rate"
                        class="bg-orange-500 hover:bg-orange-600 active:bg-orange-700 transition p-2  rounded-md text-white text-center">
                        تقييم
                    </a>
                @endif

            @endif

        </div>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2   lg:grid-cols-3 gap-4" dir="rtl">

        @foreach ($user->ratings as $rate)
            <div class="bg-white my-3 p-5 overflow-hidden shadow-xl sm:rounded-lg flex flex-col">

                <div class="flex justify-between">
                    {{-- a href="/user/profile/{{$rate->user->id}}" --}}
                    <div class="flex items-center">

                        <img src="{{ $rate->user->profile_photo_url }}" alt="{{ $rate->user->profile_photo_url }}"
                            class="rounded-full h-10 w-10 object-cover">

                        <span class="text-blue-500 text-sm mr-2">{{ $rate->user->name }}</span>

                    </div>

                    <div class="flex">
                        @switch($rate->stars)
                            @case(1)
                                <x-star-fill />
                                <x-star />
                                <x-star />
                                <x-star />
                                <x-star />
                            @break

                            @case(2)
                                <x-star-fill />
                                <x-star-fill />
                                <x-star />
                                <x-star />
                                <x-star />
                            @break;
                            @case(3)
                                <x-star-fill />
                                <x-star-fill />
                                <x-star-fill />
                                <x-star />
                                <x-star />
                            @break

                            @case(4)
                                <x-star-fill />
                                <x-star-fill />
                                <x-star-fill />
                                <x-star-fill />
                                <x-star />
                            @break

                            @case(5)
                                <x-star-fill />
                                <x-star-fill />
                                <x-star-fill />
                                <x-star-fill />
                                <x-star-fill />
                            @break


                        @break

                        @default
                            <x-star />
                            <x-star />
                            <x-star />
                            <x-star />
                            <x-star />
                    @endswitch

                </div>

            </div>

            {{-- <p class="mt-3">
                {{$user->body}}
            </p> --}}

        </div>
    @endforeach

</div>
</x-app-layout>
