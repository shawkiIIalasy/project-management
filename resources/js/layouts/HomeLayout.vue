<template>
    <Header></Header>
    <main>
        <div class="container">
            <slot></slot>
        </div>
    </main>
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
