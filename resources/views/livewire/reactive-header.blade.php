<div class="flex items-center gap-1 md:gap-3 text-sm md:text-[1rem] leading-5 justify-center
    py-1 font-semibold bg-gray-900 text-gray-100
    dark:bg-gray-900 dark:text-gray-50 rounded-3xl">
    <div class="px-1 flex items-center">
        Risk Score:
        <p
            class="flex flex-col ml-1 text-center items-center justify-center h-5 w-5 {{ $riskScore !=0 ? 'bg-red-500':'bg-green-500'}} bg-red-500 text-white rounded-full">
            {{ $riskScore??'Undetermined' }}</p>
    </div>
    <div>
        {{$eligiblityStatus['general']['type'] ?? 'Eligiblity Status:'}}
        <span
            class=" text-center px-1 {{ $eligiblityStatus['general']['status']== false?'bg-red-500':'bg-green-500'}} text-white rounded-lg">
            {{ $eligiblityStatus['general']['statusText'] ??'Unknown' }}</span>
    </div>
    <div>
        {{$eligiblityStatus['current']['type'] ?? 'Eligiblity Status:'}}
        <span
            class=" text-center px-1 {{ $eligiblityStatus['current']['status']== false?'bg-red-500':'bg-green-500'}} text-white rounded-lg">
            {{ $eligiblityStatus['current']['statusText'] ??'Unknown' }}</span>
    </div>

</div>
