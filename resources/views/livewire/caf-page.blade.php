<div class="flex justify-center">
    <div class="container min-h-screen pt-12 flex flex-col items-center">
        <div class="text-xl sm:text-3xl font-interbold text-red-800 text-nowrap">
            Content Accessibility Request Form
        </div>
        @if($step==0)
        <div class="bg-gradient-to-r from-[#d4ab1a] from-0% via-[#d4ab1a] via-20% to-gray-200 to-20% h-5 w-full sm:w-[60%] mt-8 rounded-full"></div>
        @endif
        @if($step==1)
        <div class="bg-gradient-to-r from-[#d4ab1a] from-0% via-[#d4ab1a] via-40% to-gray-200 to-40% h-5 w-full sm:w-[60%] mt-8 rounded-full"></div>
        @endif
        @if($step==2)
        <div class="bg-gradient-to-r from-[#d4ab1a] from-0% via-[#d4ab1a] via-60% to-gray-200 to-60% h-5 w-full sm:w-[60%] mt-8 rounded-full"></div>
        @endif
        @if($step==3)
        <div class="bg-gradient-to-r from-[#d4ab1a] from-0% via-[#d4ab1a] via-80% to-gray-200 to-80% h-5 w-full sm:w-[60%] mt-8 rounded-full"></div>
        @endif
        @if($step==4)
        <div class="bg-gradient-to-r from-[#d4ab1a] from-0% via-[#d4ab1a] via-100% to-gray-200 to-100% h-5 w-full sm:w-[60%] mt-8 rounded-full"></div>
        @endif
        
        <div class="mt-8 flex flex-col items-left w-full sm:w-[60%]">
            <form wire:submit.prevent="submit">

                @if($step == 0)
                <div class="select-none">
                    <div class="text-xl sm:text-3xl text-red-800 font-inter font-bold">
                        YOUR REQUEST
                    </div>
                    <div class="mt-2">
                        Confirm your submission.
                    </div>
                    <div class="form-group mt-4 font-bold grid grid-cols-2 gap-2">
                        <span class="text-red-800 font-bold text-sm sm:text-base col-span-2">TITLE</span>
                        <input disabled class="mb-4 py-2 px-3 w-full border-2 rounded-lg bg-white text-sm sm:text-base font-interlight col-span-2" type="text" value="{{$entity->title}}"> 
                        <span class="text-red-800 font-bold text-sm sm:text-base col-span-1">PLACE</span>
                        <span class="text-red-800 font-bold text-sm sm:text-base col-span-1">DATE</span>
                        <input disabled class="mb-4 py-2 px-3 w-full border-2 rounded-lg bg-white text-sm sm:text-base font-interlight col-span-1" value="{{$entity->place}}"> 
                        <input disabled class="mb-4 py-2 px-3 w-full border-2 rounded-lg bg-white text-sm sm:text-base font-interlight col-span-1" value="{{date('M d, Y', strtotime($entity->date))}}"> 
                        <span class="text-red-800 font-bold text-sm sm:text-base col-span-2">DESCRIPTION</span>
                        <textarea disabled class="mb-4 py-2 px-3 w-full min-h-[200px] border-2 rounded-lg bg-white text-sm sm:text-base font-interlight col-span-2" value="{{$entity->description}}">{{$entity->description}}</textarea>
                        
                    </div>
                </div>
                @endif
                @if($step == 1)
                <div class="select-none">
                    <div class="text-2xl sm:text-3xl text-red-800 font-inter font-bold">
                        TYPE OF USE
                    </div>
                    <div class="mt-2">
                        Choose the type of permission for use. 
                    </div>
                    <div class="form-group mt-4 flex-col flex text-lg select-none">
                        <label class="border-2 p-2 pl-4 rounded-lg has-[:checked]:bg-red-100 cursor-pointer">
                            <input type="radio" id="insti" name="typeOfUse" value="Institutional" wire:model.lazy="typeOfUse" class="pl-4">
                            <span class="font-bold pl-4 text-base sm:text-xl">Institutional</span><br>
                            <div class="pl-8 pt-1 text-sm sm:text-lg">Any employee of the CCP requesting materials for an official CCP event, project or production</div>
                        </label>
                        <label class="border-2 p-2 pl-4 rounded-lg mt-2 has-[:checked]:bg-red-100 cursor-pointer">
                            <input type="radio" id="viewr" name="typeOfUse" value="Viewing Room" wire:model.lazy="typeOfUse">
                            <span class="font-bold pl-4 text-base sm:text-xl">Viewing Room</span><br>
                            <div class="pl-8 pt-1 text-sm sm:text-lg">
                            - Personalized online links to stream materials for a limited period<br>
                            - Requesting materials for educational purposes such as research, dissertation, journal article,
                            critical paper or other private viewings<br>
                            - Users are prohibited from downloading, copying, reproducing or circulating the CCP materials</div>
                        </label>
                        <label class="border-2 p-2 pl-4 rounded-lg mt-2 has-[:checked]:bg-red-100 cursor-pointer">
                            <input type="radio" id="arch" name="typeOfUse" value="Archival/Portfolio" wire:model.lazy="typeOfUse">
                            <span class="font-bold pl-4 text-base sm:text-xl">Archival/Portfolio</span><br>
                            <div class="pl-8 pt-1 text-sm sm:text-lg">- May only be requested by persons or organizations who were part of the requested production<br>
                            - Materials may be downloaded but can only be used for personal, archival, and non-commercial purposes</div>
                        </label>
                        <label class="border-2 p-2 pl-4 rounded-lg mt-2 has-[:checked]:bg-red-100 cursor-pointer">
                            <input type="radio" id="comm" name="typeOfUse" value="Commercial Use" wire:model.lazy="typeOfUse">
                            <span class="font-bold pl-4 text-base sm:text-xl">Commercial Use</span><br>
                            <div class="pl-8 pt-1 text-sm sm:text-lg">Requests for distribution or circulation of CCP materials such as television broadcast, radio, publishing, use as production material, or any online platform which involve sales, financial gain or raising funds</div>
                        </label>
                        @error('typeOfUse')<small class="form-text text-danger">{{ $message }}</small>@enderror
                    </div>
                </div>
                @endif
                @if($step == 2)
                <div>
                    <div class="text-2xl sm:text-3xl text-red-800 font-inter font-bold mb-8 select-none">
                        USER DETAILS
                    </div>
                    <div class="form-group grid grid-cols-8">
                        <div class="text-red-800 font-bold col-span-2 content-center text-xs sm:text-base">Country <span class="text-amber-500">*</span></div>
                        <input class="mt-2 p-2 col-span-6 w-full border-2 rounded-lg bg-white text-sm sm:text-base" type="text" placeholder="Country" wire:model.lazy="country">
                        @error('country')<div class="col-span-2"></div><small class="form-text text-danger col-span-6">{{ $message }}</small>@enderror

                        <div class="text-red-800 font-bold col-span-2 content-center text-xs sm:text-base">Requestor's Name <span class="text-amber-500">*</span></div>
                        <input class="mt-4 p-2 col-span-6 w-full border-2 rounded-lg bg-white text-sm sm:text-base" type="text" placeholder="Full Name" wire:model.lazy="name"> 
                        @error('name')<div class="col-span-2"></div><small class="form-text text-danger col-span-6">{{ $message }}</small>@enderror

                        <div class="text-red-800 font-bold col-span-2 content-center text-xs sm:text-base">Company/ Institution <span class="text-amber-500">*</span></div>
                        <input class="mt-4 p-2 col-span-6 w-full border-2 rounded-lg bg-white text-sm sm:text-base" type="text" placeholder="Company/Institution" wire:model.lazy="company"> 
                        @error('company')<div class="col-span-2"></div><small class="form-text text-danger col-span-6">{{ $message }}</small>@enderror

                        <div class="text-red-800 font-bold col-span-2 content-center text-xs sm:text-base">Email <span class="text-amber-500">*</span></div>
                        <input class="mt-4 p-2 col-span-6 w-full border-2 rounded-lg bg-white text-sm sm:text-base" type="text" placeholder="email@email.com" wire:model.lazy="email"> 
                        @error('email')<div class="col-span-2"></div><small class="form-text text-danger col-span-6">{{ $message }}</small>@enderror

                        <div class="text-red-800 font-bold col-span-2 content-center text-xs sm:text-base">Cellphone Number <span class="text-amber-500">*</span></div>
                        <input class="mt-4 p-2 col-span-6 w-full border-2 rounded-lg bg-white text-sm sm:text-base " type="text" placeholder="09XX-XXXXXXX" wire:model.lazy="phoneNumber">
                        @error('phoneNumber')<div class="col-span-2"></div><small class="form-text text-danger col-span-6">{{ $message }}</small>@enderror

                        <div class="mt-4 text-red-800 font-bold col-span-8 content-center text-xs sm:text-base">Project Details <span class="text-amber-500">*</span></div>
                        
                        <div class="mt-6 text-red-800 col-span-8 content-center text-xs sm:text-base">Title of the project</div>
                        <input class="p-2 col-span-8 w-full border-2 rounded-lg bg-white text-sm sm:text-base " type="text" placeholder="Project Title" wire:model.lazy="projectTitle">
                        @error('projectTitle')<small class="form-text text-danger col-span-8">{{ $message }}</small>@enderror

                        <div class="mt-6 text-red-800 col-span-8 content-center text-xs sm:text-base">Description of the project</div>
                        <input class="p-2 col-span-8 w-full border-2 rounded-lg bg-white text-sm sm:text-base " type="text" placeholder="How will you use the CCP Material?" wire:model.lazy="projectDescription">
                        @error('projectDescription')<small class="form-text text-danger col-span-8">{{ $message }}</small>@enderror

                        <div class="mt-6 text-red-800 col-span-8 content-center text-xs sm:text-base">Duration of Use of the CCP Material</div>
                        <input class="p-2 col-span-8 w-full border-2 rounded-lg bg-white text-sm sm:text-base " type="text" placeholder="How long will you be using the CCP Material?" wire:model.lazy="projectDuration">
                        @error('projectDuration')<small class="form-text text-danger col-span-8">{{ $message }}</small>@enderror
                    </div>
                </div>
                @endif
                @if($step == 3)
                <div>
                    <div class="text-2xl sm:text-3xl text-red-800 font-inter font-bold mb-8 select-none">
                        TERMS & CONDITIONS
                    </div>
                    <div class="form-group relative">
                        <div class="bg-gray-200 p-4 text-sm sm:text-base">
                        1. The CCP grants the requester a one-time, non-exclusive right to access, reproduce, distribute, and publicly display the listed CCP Requested Materials, solely in connection with the Project. Any reproduction of the materials not supplied by the CCP is prohibited. The requestor may not modify the Requested Materials in any way not contemplated herein when exercising its rights under this Agreement;<br><br>

                        2. The CCP grants the requestor ownership rights only to the extent relating to the request. Certain materials may be protected by intellectual property rights or related interests not owned by the CCP. The responsibility for ascertaining whether any such rights exist and for obtaining all other necessary permissions remains solely with the requestor. The CCP reserves the right to request copies of such permissions. Furthermore, no other parties shall be authorized to use the materials under the agreement without prior written permission from the CCP;<br><br>

                        3. The requestor must provide a copy of the reproductions to the CCP or a link if such distributions are published on the web. In addition, prior to reproduction, the CCP may require the requestor to provide samples of the Requested Material(s) as they are to appear in the Project. CCP shall
                        have the right to approve the samples for quality and adherence to any CCP guidelines and policies, and requestors shall not use the Requested Material(s) until the samples have been so approved;<br><br>

                        4. Proper acknowledgment must accompany the CCP materials when exhibited. The CCP shall provide the credit details for each material. The credit line will include all of the information listed with each text as described in this agreement;<br><br>

                        5. Digital copies of the Requested Materials must be destroyed after the publication/reproduction or completion of the Project;<br><br>

                        6. The requestor, its officers, personnel, and employees shall abide by and comply with all applicable laws and regulations issued by the government and its agencies in the performance of the services and shall be responsible for ensuring that proper safeguards are in place for the
                        protection of the CCP material. In signing this Agreement, the CCP may also request for the personal information of the requestor;<br><br>

                        7. Full payment is required prior to the release of the Requested Material(s). The CCP accepts several modes of payment through personal and online transactions.<br><br>

                        8. The laws of the Republic of the Philippines shall govern this Agreement. Each party irrevocably consents to the exclusive jurisdiction of the City of Pasay.<br><br>

                        </div>
                        <div class="mb-10 mt-6 justify-center flex">
                            <label class="font-bold text-sm sm:text-base justify-items-center">
                                <input wire:model="agree" type="checkbox" value="0" class="size-4">
                                <span class="pl-2">I agree with the Terms and Conditions</span><br>
                                @error('agree')<small class="form-text text-danger col-span-8">{{ $message }}</small>@enderror
                            </label>
                        </div>

                    </div>
                </div>
                @endif
                @if($step == 4)
                <div class="select-none">
                    <div class="text-2xl sm:text-3xl text-red-800 font-inter font-bold">
                        REQUEST SUCCESSFUL!
                    </div>
                    <div class="mt-2">
                        We will get back to you in 3-5 days.
                    </div>

                    <div class="relative">
                        <div class="mt-20 right-0 absolute">
                            <a href="{{ route('entity', $entity) }}" class="rounded-full font-bold text-xl text-gray-800 bg-[#d4ab1a] px-2 text-xs md:text-lg lg:text-xl md:px-2 lg:px-8 py-3 hover:text-black hover:bg-amber-400 text-nowrap">Back to browse</a>
                        </div>
                    </div>
                </div>
                @endif

            </form>
        </div>
        <div class="mt-8 mb-24 flex bg-red-200 w-full sm:w-[60%] relative">
            @if($step > 0 && $step <= 3)
            <div wire:click="goBack" class="cursor-pointer -left-20 absolute">
            <svg fill="#a6a6a6" height="45px" width="200px" version="1.1" id="Layer_1" viewBox="0 0 512 512" xml:space="preserve" stroke="#a6a6a6"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M256,0C114.837,0,0,114.837,0,256s114.837,256,256,256s256-114.837,256-256S397.163,0,256,0z M384,277.333H179.499 l48.917,48.917c8.341,8.341,8.341,21.824,0,30.165c-4.16,4.16-9.621,6.251-15.083,6.251c-5.461,0-10.923-2.091-15.083-6.251 l-85.333-85.333c-1.963-1.963-3.52-4.309-4.608-6.933c-2.155-5.205-2.155-11.093,0-16.299c1.088-2.624,2.645-4.971,4.608-6.933 l85.333-85.333c8.341-8.341,21.824-8.341,30.165,0s8.341,21.824,0,30.165l-48.917,48.917H384c11.776,0,21.333,9.557,21.333,21.333 S395.776,277.333,384,277.333z"></path> </g> </g> </g></svg>
            </div>
            @endif

            @if($step <= 3)
            <div wire:click="submit" class="right-0 absolute bg-red-800 hover:bg-red-700 py-2 px-7 rounded-full text-white text-xl cursor-pointer">Next</div>
            @endif
        </div>
    </div>
</div>
