<template x-if="toast.type==='debug'">
    <i class="fa-duotone fa-bug-slash fa-2x text-gray-700"></i>
</template>

<template x-if="toast.type==='info'">
    <i class="fa-duotone fa-circle-info fa-2x text-slate-500"></i>
</template>

<template x-if="toast.type==='success'">
    <i class="fa-duotone fa-circle-check fa-2x text-sky-600"></i>
</template>

<template x-if="toast.type==='warning'">
    <i class="fa-duotone fa-circle-exclamation fa-2x text-yellow-700"></i>
</template>

<template x-if="toast.type==='danger'">
    <i class="fa-duotone fa-triangle-exclamation fa 2x text-red-700"></i>
</template>
