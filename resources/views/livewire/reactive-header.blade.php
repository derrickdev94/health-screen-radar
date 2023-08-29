<div class="flex text-sm md:text-lg justify-center py-[2px] font-semibold bg-gray-900 text-gray-100 dark:bg-gray-900 dark:text-gray-50 rounded-3xl">
    <div class="px-1 flex items-center">
        Risk Score:
        <p class="flex flex-col ml-1 text-center items-center justify-center h-5 w-5 {{ $riskScore !=0 ? 'bg-red-500':'bg-green-500'}} bg-red-500 text-white rounded-full"> {{ $riskScore??'Undetermined' }}</p>
    </div>
    <div>
        {{$eligiblityStatus['type'] ?? 'Eligiblity Status:'}}
        <span class=" text-center px-1 {{ $eligiblityStatus['status']== false?'bg-red-500':'bg-green-500'}} text-white rounded-lg"> {{ $eligiblityStatus['statusText'] ??'Unknown' }}</span>
    </div>

</div>
