<x-app-layout>
    @if (auth()->user()->body == null || auth()->user()->job == 'عميل')
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
                ملفك الشخصي لا يظهر بنتائج البحث. زد من فرص توظيفك بإكماله

                <a href="/user/profile" class="text-blue-500 block mt-3">أكمل الآن</a>
            </h2>

        </x-slot>
    @endif




    <div class="py-12 text-right">


        <div class="mx-auto text-center mt-10" dir="rtl">
            <span class="relative z-0 inline-flex shadow-sm rounded-md">




                <a href="/freelancer/"
                    class="
                relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium   {{ $job == null ? 'bg-blue-600 text-white hover:text-white cursor-default' : 'bg-white text-gray-700' }} border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    الكل
                </a>

                <a href="/freelancer/كهربائي"
                    class="
                relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium {{ $job == 'كهربائي' ? 'bg-blue-600 text-white hover:text-white cursor-default' : 'bg-white text-gray-700' }} border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    كهربائي
                </a>

                <a href="/freelancer/ميكانيكي"
                    class="
                relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium {{ $job == 'ميكانيكي' ? 'bg-blue-600 text-white hover:text-white cursor-default' : 'bg-white text-gray-700' }} border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    ميكانيكي
                </a>

                <a href="/freelancer/لحام"
                    class="
                relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium {{ $job == 'لحام' ? 'bg-blue-600 text-white hover:text-white cursor-default' : 'bg-white text-gray-700' }} border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    لحام
                </a>

                <a href="/freelancer/نجار"
                    class="
                relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium {{ $job == 'نجار' ? 'bg-blue-600 text-white hover:text-white cursor-default' : 'bg-white text-gray-700' }} border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    نجار
                </a>

                <a href="/freelancer/مزارع"
                    class="
                relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium {{ $job == 'مزارع' ? 'bg-blue-600 text-white hover:text-white cursor-default' : 'bg-white text-gray-700' }} border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    مزارع
                </a>


            </span>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($users as $user)
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

                <div>
                    <a href="/user/profile/{{$user->id}}" class="bg-blue-500 hover:bg-blue-600 active:bg-blue-700 p-2 rounded-md text-white">
                          زيارة الملف الشخصي
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    {{ $users->links() }}

</div>
</x-app-layout>
