<template>
    <panel-item :field="field">
        <div slot="value">

            <img v-if="url" :src="url">

            <span v-else>&mdash;</span>
        </div>
    </panel-item>
</template>

<script>
export default {
    props: ['resource', 'resourceName', 'resourceId', 'field'],

    computed: {
        url() {
            if (this.field.prefix) {
                if (this.resourceName === 'users') {
                    for (const field of this.resource.fields) {
                        if (field.validationKey === 'habboname') {
                            this.field.value = field.value;
                        }
                    }
                }
                return `${this.field.prefix}${this.field.value}`;
            }
            return this.field.value;
        }
    }
}
</script>
