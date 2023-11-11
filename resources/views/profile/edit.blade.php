<x-app-layout>
    <div class="flex justify-end">
        <div class="relative w-full md:w-4/5">
            <span class="absolute z-[100] -top-10 -left-2 flex justify-center items-center w-10 h-10 rounded-full text-orange-300 hover:bg-orange-100/50 btn-duration" onClick="history.back()"><i class="fa-solid fa-arrow-left"></i></span>
            <span class="absolute z-[90] -top-10 -left-2 w-12 h-12 bg-white"></span>
            <!--<x-slot name="header">-->
            <!--    <h2 class="font-semibold text-xl text-gray-800 leading-tight">-->
            <!--        { __'Profile') }}-->
            <!--    </h2>-->
            <!--</x-slot>-->
            
            <div class="pl-12 my-2">
                <h2 class="font-bold text-2xl">プロフィール編集</h2>
            </div>
        
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
        
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
        
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
