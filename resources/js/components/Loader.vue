<template>
    <div :class="{'loader': load}"></div>
</template>

<script>
export default {
    name: 'Spinner',
    props: {
        load: {
            type: Boolean,
            default: false,
        }
    }
}
</script>
