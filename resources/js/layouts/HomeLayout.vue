<template>
    <slot></slot>
</template>

<script>
import Header from '../containers/Header'

export default {
    name: 'HomeLayout',
    components: {
        Header
    }
}
</script>
