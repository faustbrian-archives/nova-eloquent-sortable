<template>
    <div class="flex items-center">
        <font-awesome-icon
            icon="arrow-up"
            class="cursor-pointer text-70 hover:text-primary mr-3"
            @click="sort('start')"
        />

        <font-awesome-icon
            icon="chevron-up"
            class="cursor-pointer text-70 hover:text-primary mr-3"
            @click="sort('up')"
        />

        <font-awesome-icon
            icon="chevron-down"
            class="cursor-pointer text-70 hover:text-primary mr-3"
            @click="sort('down')"
        />

        <font-awesome-icon
            icon="arrow-down"
            class="cursor-pointer text-70 hover:text-primary mr-3"
            @click="sort('end')"
        />
    </div>
</template>

<script>
export default {
    props: ['resourceName', 'field'],
    computed: {
        resourceId() {
            return this.$parent.resource.id.value;
        },
    },
    methods: {
        async sort(direction) {
            try {
                await Nova.request().post(`/nova-vendor/kodekeep/nova-eloquent-sortable/${this.resourceName}`, {
                    direction: direction,
                    field: this.field.attribute,
                    resource: this.resourceName,
                    resourceId: this.resourceId,
                });

                this.$toasted.show('The new sorting has been applied!', { type: 'success' });

                this.$router.go(this.$router.currentRoute);
            } catch (error) {
                this.$toasted.show(error.message, { type: 'error' });
            }
        },
    },
};
</script>
