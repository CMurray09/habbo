<template>
    <jet-form-section @submitted="updateProfileInformation">
        <template #title>
            Profile Information
        </template>

        <template #description>
            Update your account's profile information and email address.
        </template>

        <template #form>
            <!-- Username -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="username" value="Username" />
                <jet-input id="username" type="text" class="mt-1 block w-full" v-model="form.username" required autocomplete="username" />
                <jet-input-error :message="form.errors.username" class="mt-2" />
            </div>

            <!-- Habbo name -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="habboname" value="Habboname" />
                <jet-input id="habboname" type="text" class="mt-1 block w-full" v-model="form.name" autocomplete="habboname" />
                <jet-input-error :message="form.errors.habboname" class="mt-2" />
                <jet-input-error :message="form.errors.motto" class="mt-2" />
            </div>

            <!-- Habbo motto -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="habbocode" value="Habbo Motto Code" />
                <div class="grid grid-cols-3 gap-4">
                    <jet-input id="habbocode" class="col-span-2" type="text" readonly value="HabboDome-Register"/>
                    <jet-button id="copycode" type="button" class="col-span-1" v-on:click="copyToClipboard()">Copy</jet-button>
                </div>
            </div>
        </template>

        <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </jet-action-message>

            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </jet-button>
        </template>
    </jet-form-section>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetFormSection from '@/Jetstream/FormSection.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetInputError from '@/Jetstream/InputError.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetActionMessage from '@/Jetstream/ActionMessage.vue'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'

    export default defineComponent({
        components: {
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
            JetSecondaryButton,
        },

        props: ['user'],

        data() {
            return {
                form: this.$inertia.form({
                    _method: 'PUT',
                    username: this.user.username,
                    habboname: this.user.habboname,
                    motto: this.user.motto,
                }),

                photoPreview: null,
            }
        },

        methods: {
            copyToClipboard() {
                const copyText = document.getElementById("habbocode");
                copyText.select();
                document.execCommand('copy');
                window.getSelection().removeAllRanges();
            },
            updateProfileInformation() {
                this.form.post(route('user-profile-information.update'), {
                    errorBag: 'updateProfileInformation',
                    preserveScroll: true,
                    onSuccess: () => (this.clearPhotoFileInput()),
                });
            },
        },
    })
</script>
